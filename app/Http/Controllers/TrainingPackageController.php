<?php

namespace App\Http\Controllers;

use App\Http\Resources\TrainingPackageResource;
use App\Models\TrainingPackage;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class TrainingPackageController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = TrainingPackageResource::collection(TrainingPackage::all());
            return Datatables::of($data)->addIndexColumn()
                ->addColumn('action', function ($row) {
                    
                    
                    $Btn =  '<a href="javascript:void(0)" class="view btn btn-primary btn-sm mr-3"><i class="fas fa-folder mr-2"> </i>View</a>';
                    $Btn .='<a href="javascript:void(0)" class="edit btn btn-info btn-sm mr-3 text-white"><i class="fas fa-pencil-alt mr-2"> </i>Edit</a>';
                    $Btn .= '<a href="javascript:void(0)" class="delete btn btn-danger btn-sm mr-3"><i class="fas fa-trash mr-2"> </i>Delete</a>';
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

    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|unique:training_packages|min:5|max:255',
            'sessions_number' => 'required',
            'price' => 'required',
        ]);
        $package = TrainingPackage::create($validated);
        $package->update([
            'price' => $package->price * 100,
        ]);
        return view('menu.training_packages.index');
    }
}
