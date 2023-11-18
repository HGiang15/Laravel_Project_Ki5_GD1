<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $config = $this->config();

        $template = 'backend.dashboard.home.index';
        return view('backend.dashboard.layout', compact('template', 'config'));
    }

    public function config()
    {
        return [
            'js' => [
                '/backend/js/plugins/flot/jquery.flot.js',
                '/backend/js/plugins/flot/jquery.flot.tooltip.min.js',
                '/backend/js/plugins/flot/jquery.flot.spline.js',
                '/backend/js/plugins/flot/jquery.flot.resize.js',
                '/backend/js/plugins/flot/jquery.flot.pie.js',
                '/backend/js/plugins/flot/jquery.flot.symbol.js',
                '/backend/js/plugins/flot/jquery.flot.time.js',
                '/backend/js/plugins/peity/jquery.peity.min.js',
                '/backend/js/demo/peity-demo.js',
                '/backend/js/inspinia.js',
                '/backend/js/plugins/pace/pace.min.js',
                '/backend/js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js',
                '/backend/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
                '/backend/js/plugins/easypiechart/jquery.easypiechart.js',
                '/backend/js/plugins/sparkline/jquery.sparkline.min.js',
                '/backend/js/demo/sparkline-demo.js'
            ]
        ];
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
