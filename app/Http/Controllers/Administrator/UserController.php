<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();

        return view('dashboard.management.user.index')->with([
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.management.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation Rules
        $rules = [
            'name' => 'required',
            'email' => 'required|email:dns|unique:users,email',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
            'role' => 'required|in:administrator,cashier',
        ];

        // Validation
        $validated = $request->validate($rules);

        $user = new User;
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->password = Hash::make($validated['password']);
        $user->role = $validated['role'];
        $user->save();

        return redirect()->route('user.index')->with('message', 'User has been added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);

        return view('dashboard.management.user.show')->with([
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);

        return view('dashboard.management.user.edit')->with([
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Retrieve data
        $user = User::find($id);

        $request['password'] = Hash::make($request['password']);

        // Validation Rules
        $rules = [
            'name' => 'required',
            'role' => 'required|in:administrator,cashier',
        ];

        // If user change email give a validation rule of email
        if($request->email != $user->email) {
            $rules['email'] = 'required|email:dns|unique:users,email';
        }

        // Validation
        $validated = $request->validate($rules);

        $user->name = $validated['name'];

        // If user change email, bind data to update field email
        if($request->email != $user->email) {
            $user->email = $validated['email'];
        }

        $user->role = $validated['role'];
        $user->save();

        return redirect()->route('user.index')->with('message', 'User has been update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);

        if($user){
            $user->delete();

            return redirect()->route('user.index')->with('message', 'User has been delete');
        } else {
            return redirect()->route('user.index')->with('error', 'User not found !');
        }

    }
}
