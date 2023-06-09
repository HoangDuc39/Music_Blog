<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $deletedCount = User::onlyTrashed()->count();
        return view('users_index', compact('users','deletedCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user_add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = new User();
    $user->name = $request->input('name');
    $user->email = $request->input('email');
    $user->password = Hash::make($request->input('password'));
    $user->save();
    return redirect()->route('users.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $user = User::find($id);
        // return view('user_detail', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('user_edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {

        //$user = User::find($request->id);

        $user->name = $request->name;

        $user->email = $request->email;

        $user->password = Hash::make($request->password);

        $user->save();
        return redirect()->route('users.index')->with('success', 'User Data has been updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
       // $user = User::find($id);
        $user->delete();
        return redirect()->route('users.index');
    }

    public function softDeleted()
    {
        $users = User::onlyTrashed()->get();
        return view('users_deleted', compact('users'));
    }
    public function restore($id){
        $user = User::withTrashed()->findOrFail($id);
        $user->restore();
        return redirect()->route('users.deleted')->with('success', 'User has been restored.');
    }
    public function forceDelete($id){
        $user = User::withTrashed()->findOrFail($id);
        $user->forceDelete();
        return redirect()->route('users.deleted')->with('success', 'User has been permanently deleted.');
    }
}
