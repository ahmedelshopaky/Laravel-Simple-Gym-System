<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTrainingPackageRequest;
use App\Http\Resources\TrainingPackageResource;
use App\Models\TrainingPackage;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class TrainingPackageController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $packages = TrainingPackageResource::collection(TrainingPackage::all());
            return Datatables::of($packages)->addIndexColumn()->make(true);
        }

        return view('menu.training_packages.index');
    }

    public function create() {
        return view('menu.training_packages.create');
    }

    public function store(StoreTrainingPackageRequest $request) {
        $validated = $request->validated();
        $package = TrainingPackage::create($validated);
        $package->update([
            'price' => $package->price * 100,
        ]);
        return view('menu.training_packages.index');
    }

    public function edit($id)
    {
        $package = TrainingPackage::find($id);
        return view('menu.training_packages.edit', compact('package'));
    }

    public function update(StoreTrainingPackageRequest $request, $id) {
        $validated = $request->validated();

        $package = TrainingPackage::find($id);
        if ($package) 
        {
            $package->update($validated);
        }
        return view('menu.training_packages.show', compact('package'));
    }

    public function show($id)
    {
        $package = TrainingPackage::find($id);
        return view('menu.training_packages.show', compact('package'));
    }

    public function destroy($id)
    {
        TrainingPackage::find($id)->delete();
        return response()->json(['message'=>true]);
    }
}