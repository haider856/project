<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit()
    {
        return view('profile.edit', [
            'user' => Auth::user(),
           ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update_password(Request $request)
    {
        $request->validate([
            'password' => ['required', 'confirmed'],
            'old_password' => ['required'],
        ]);

        if (Hash::check($request->old_password, Auth::user()->password)) {
            $data = [
                'password' => Hash::make($request->password),
            ];

            $is_updated = User::find(Auth::id())->update($data);

            if ($is_updated) {
                return back()->with(['success' => 'User password has been successfully updated!']);
            } else {
                return back()->with(['failure' => 'User password has failed to update!']);
            }
        } else {
            return back()->withErrors(['old_password' => 'Old password does not match with records']);
        }
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
