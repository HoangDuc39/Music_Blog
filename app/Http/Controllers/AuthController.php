<?php

namespace App\Http\Controllers;
use App\Models\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $auths = Auth::all();

        return view('auths_index', compact('auths'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth_add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $auth = new Auth();
    $auth->ten_tgia = $request->input('auth');
    $auth->save();
    return redirect()->route('auths.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $auth = auth::findOrFail($id);
        return view('auth_edit', compact('auth'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $auth = Auth::findOrFail($id);
        $auth->ten_tgia= $request->auth;
        $auth->save();
        return redirect()->route('auths.index')->with('success', 'auth Data has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $auth = Auth::findOrFail($id);
        $auth->delete();
        return redirect()->route('auths.index');
    }
}
