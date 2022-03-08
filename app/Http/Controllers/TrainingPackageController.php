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
            $packages = TrainingPackage::all();
            return Datatables::of($packages)->addIndexColumn()
                ->addColumn('action', function ($package) {
                    $Btn =  '<a href="' . route('training-packages.show', $package->id) . '" class="view btn btn-primary btn-sm mr-3"><i class="fas fa-folder mr-2"> </i>View</a>';
                    $Btn .='<a href="' . route('training-packages.edit', $package->id) . '" class="edit btn btn-info btn-sm mr-3 text-white"><i class="fas fa-pencil-alt mr-2"> </i>Edit</a>';
                    $Btn .= '<a href="javascript:void(0)" data-id="' . $package->id . '" data-bs-toggle="modal" data-bs-target="#deleteAlert" class="delete btn btn-danger btn-sm mr-3"><i class="fas fa-trash mr-2"> </i>Delete</a>';
                    return $Btn;
                })
                ->rawColumns(['action'])
                ->make(true);
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
        if ($package) {
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
        return response()->json(['success'=>'This package has been deleted successfully']);
    }
}
