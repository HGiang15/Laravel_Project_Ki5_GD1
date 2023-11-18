<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flower;
use App\Models\Region;
class RegionController extends Controller
{

    public function index()
    {
        $regions = Region::orderBy('id', 'desc')->paginate(5);
        return view('admin.region.index', compact('regions'))->with('i', (request()->input('page', 1) - 1) *5);
    }


    public function create()
    {
        $flowers = Flower::all();

        return view('admin.flowers.create', compact('flowers'));
    }


    public function store(Request $request)
    {
        //
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        //
    }

 
    public function update(Request $request, string $id)
    {
        //
    }

  
    public function destroy(string $id)
    {
        //
    }
}
