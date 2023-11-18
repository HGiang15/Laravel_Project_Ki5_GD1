<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flower;
use App\Models\Region;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
class FlowerController extends Controller
{

    public function index()
    {
        $flowers = Flower::orderBy('id', 'desc')->paginate(5);
        return view('admin.flower.index', compact('flowers'))->with('i', (request()->input('page', 1) - 1) *5);
    }

    public function search(Request $request) {
        $search = $request->search;

        $flowers = Flower::where(function($query) use ($search) {
            $query->where('name', 'like', "%$search%")
            ->orWhere('description', 'like', "%$search%");
        })->paginate(10);;

        return view('admin.flower.index', compact('flowers', 'search'));
    }
    
    public function searchRegions(Request $request)
    {
        $searchTerm = $request->search;

        $existingRegions = Region::where('region_name', 'like', "%$searchTerm%")->pluck('region_name')->toArray();

        return view('admin.flower.create', compact('existingRegions', 'searchTerm'));
    }

    public function create()
    {
        $existingRegions = Region::pluck('region_name')->toArray();

        return view('admin.flower.create' , compact('existingRegions'));
    }


    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|alpha_spaces',
            'description' => 'required',
            'image_url' => 'required|image|mimes:jpg,jpeg,png,gif,svg',
            'created_at' => 'required',
            'updated_at' => 'required|date',
        ]);
    
        $filename = '';
        if ($request->hasFile('image_url')) {
            $file = $request->file('image_url');
            $extension = $file->getClientOriginalExtension();
            // $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'svg'];
    
            // if (!in_array($extension, $allowedExtensions)) {
            //     return redirect()->route('flowers.index')->with('error', 'Only JPG, JPEG, PNG, SVG and GIF files are allowed.');
            // }
    
            $filename = $request->getSchemeAndHttpHost() . '/assets/img/flowers/' . time() . '.' . $extension;
            $file->move(public_path('/assets/img/flowers/'), $filename);
        }
    
        $flower = Flower::create([
            'name' => $request->name,
            'description' => $request->description,
            'image_url' => $filename,
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at,
        ]);
    
        if ($request->has('region_name')) {
            $regions = array_map('trim', explode(',', $request->input('region_name')));
            $existingRegions = Region::pluck('region_name')->toArray();
            
            $regionNames = [];
            foreach ($regions as $regionName) {
                $trimmedRegionName = trim($regionName);
    
                // Kiểm tra xem vùng đã tồn tại hay chưa
                if (in_array($trimmedRegionName, $existingRegions)) {
                    return redirect()->route('flowers.index')->with('error', 'The region "' . $trimmedRegionName . '" already exists for another flower.');
                }
                
                // Lưu tên vùng vào mảng
                $regionNames[] = $trimmedRegionName;
                // Tạo hoặc cập nhật vùng mới
                $region = Region::updateOrCreate(
                    ['region_name' => $trimmedRegionName],
                    ['flower_id' => $flower->id]
                );
            }
        }
    
        return redirect()->route('flowers.index')->with('information', 'Added flower successfully!');
    }


    public function show(string $id)
    {
        $flower = Flower::where('id', $id)->first();

        return view('admin.flower.show', compact('flower'));
    }

    public function edit(string $id)
    {
        $flower = Flower::where('id', $id)->first();
        // $flower = Flower::find($id);

        $existingRegions = Region::pluck('region_name')->toArray();
        return view('admin.flower.edit', compact('flower', 'existingRegions'));
    }


    public function update(Request $request, string $id)
    {
        $flower = Flower::where('id', $id)->first();
        // $flower = Flower::find($id);

        $validatedData = $request->validate([
            'name' => 'required|alpha_spaces',
            'description' => 'required',
            'image_url' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg',
            'created_at' => 'required',
            'updated_at' => 'required|date',
        ]);


        $flower->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'created_at' => $request->input('created_at'),
            'updated_at' => $request->input('updated_at'),
        ]);
        

        // Handle image update if a new image is provided
        if ($request->hasFile('image_url')) {
            $file = $request->file('image_url');
            $extension = $file->getClientOriginalExtension();

            // Remove the old image
            if (File::exists(public_path($flower->image_url))) {
                File::delete(public_path($flower->image_url));
            }

            // Save the new image
            $filename = $request->getSchemeAndHttpHost() . '/assets/img/flowers/' . time() . '.' . $extension;
            $file->move(public_path('/assets/img/flowers/'), $filename);

            // Update the book record with the new image URL
            $flower->update(['image_url' => $filename]);
        }

        if ($request->has('region_name')) {
            $regions = array_map('trim', explode(',', $request->input('region_name')));
            $existingRegions = Region::pluck('region_name')->toArray();

            foreach ($regions as $regionName) {
                $trimmedRegionName = trim($regionName);

                // Check if the region already exists
                if (in_array($trimmedRegionName, $existingRegions)) {
                    return redirect()->route('flowers.index', $id)->with('error', 'The region "' . $trimmedRegionName . '" already exists for another flower.');
                }

                // Create or update the region
                $region = Region::updateOrCreate(
                    ['region_name' => $trimmedRegionName],
                    ['flower_id' => $flower->id]
                );
            }
        }

        return redirect()->route('flowers.index')->with('information', 'Updated flower successfully!');
    }


    public function destroy(string $id)
    {
        Flower::where('id', $id)->delete();
        
        return redirect()->route('flowers.index')->with('information', 'Removed flower successfully !');
    }
}
