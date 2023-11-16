<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('panels.admin', compact('users'));
    }

    // UserController.php

    public function update(Request $request, User $user)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255'
        ]);




        $user->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'is_admin' => $request->input('is_admin') ? true : false,

        ]);


        return redirect()->route('admin');
    }

    public function delete(Request $request)
    {
        $userIds = explode(',', $request->input('user_ids'));
        User::whereIn('id', $userIds)->delete();
        return redirect()->route('admin');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:laravel_users|max:255',
            'password' => 'required|min:8|confirmed',
        ]);
    


        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->is_admin = $request->input('is_admin') ? true : false;
        $user->save();
    

        return redirect()->route('admin')->with('success', 'User created successfully');
        
        
    }
}
