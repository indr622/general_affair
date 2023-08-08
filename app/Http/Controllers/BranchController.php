<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Region;
use App\Http\Requests\StoreBranchRequest;
use App\Http\Requests\UpdateBranchRequest;

class BranchController extends Controller
{
    public function index()
    {
        $branch = Branch::with('region')->get();
        return view('branch.index', compact('branch'));
    }


    public function create()
    {
        $regions = Region::all();
        return view('branch.create', compact('regions'));
    }


    public function store(StoreBranchRequest $request)
    {
        Branch::create($request->validated());
        return redirect()->route('branch.index')->withSuccess('Branch Berhasil Disimpan.');
    }

    public function edit(Branch $branch)
    {
        $regions = Region::all();
        return view('branch.edit', compact('branch', 'regions'));
    }


    public function update(UpdateBranchRequest $request, Branch $branch)
    {
        $branch->update($request->validated());
        return redirect()->route('branch.index')->withSuccess('Branch Berhasil Diupdate.');
    }


    public function destroy(Branch $branch)
    {
        $branch->delete();
        return redirect()->route('branch.index')->withSuccess('Branch Berhasil Dihapus.');
    }
}
