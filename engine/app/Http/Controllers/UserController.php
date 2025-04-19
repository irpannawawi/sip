<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('users.index',compact('users'));
    }

    public function create(){
        return view('users.create');
    }

    public function store(Request $request){
        $request->validate([
            'password' => 'required|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password)
        ]);
        return redirect()->route('users.index')->with('success','User created successfully');
    }

    public function show($id){
        $user = User::find($id);
        return view('users.show',compact('user'));
    }

    public function edit($id){
        $user = User::find($id);
        return view('users.edit',compact('user'));
    }

    public function update(Request $request, $id){

        if($request->password == null){
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'role' => 'required',
            ]);
        }else{
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'role' => 'required',
                'password' => 'required|confirmed',
            ]);
        }

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        if($request->password != null){
            $user->password = Hash::make($request->password);
        }
        $user->save();
        return redirect()->route('users.index')->with('info','User updated successfully');
    }

    public function destroy($id){
        $user = User::find($id);
        $user->delete();
        return redirect()->route('users.index')->with('info','User deleted successfully');

    }
}
