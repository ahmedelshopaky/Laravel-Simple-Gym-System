<?php

namespace App\Http\Controllers;

use App\Models\GymManager;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Requests\StoreManagerRequest;

class UserController extends Controller
{
    public function index(Request $request)
    {
        //
    }

    public function create() {
        return view('menu.user.create');
    }

    public function store(StoreManagerRequest $request) {
        $req = request();
        if ($req->hasFile('profile_image'))
        {
            $img = $req->file('profile_image');
            $name = 'img-' . uniqid() . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('images/users'),$name);

            // TODO
            // if $name == null
            // unlink((public_path('uploads/users')).$name);

            // image is already exists (in edit)
        }
        
        // validate the request data
        $validated = $request->validated();
        // store in db
        User::create($validated);
        // redirect to index
        return redirect()->route('home');
    }

    public function edit($id) {
        $user = User::find($id);
        return view('menu.user.edit', compact('user'));
    }

    public function update() {
        //
    }

    public function show($id) {
        $user = User::find($id);
        return view('menu.user.show', compact('user'));
        // return redirect()->route('users.show');
    }

    public function destroy() {
        //
    }

    // $gymManager=GymManager::with('user')->where('user_id',$user_id)->get();
    // return response()->json(['success'=>'the row deleted Successfully']);
}
