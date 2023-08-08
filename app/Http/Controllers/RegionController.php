<?php

namespace App\Http\Controllers;

use App\Models\Region;
use App\Http\Requests\StoreRegionRequest;
use App\Http\Requests\UpdateRegionRequest;

class RegionController extends Controller
{

    public function index()
    {
        $regions = Region::all();
        return view('regions.index', compact('regions'));
    }


    public function create()
    {
        return view('regions.create');
    }


    public function store(StoreRegionRequest $request)
    {
        Region::create($request->validated());
        return redirect()->route('regions.index')->withSuccess('Region berhasil ditambahkan.');
    }



    public function edit(Region $regions)
    {
        return view('regions.edit', compact('regions'));
    }


    public function update(UpdateRegionRequest $request, Region $region)
    {
        $region->update($request->validated());
        return redirect()->route('regions.index')->withSuccess('Region berhasil diupdate.');
    }


    public function destroy(Region $region)
    {
        $region->delete();
        return redirect()->route('regions.index')->withSuccess('Region berhasil dihapus.');
    }
}
