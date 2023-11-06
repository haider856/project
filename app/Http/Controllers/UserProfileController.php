<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserProfileController extends Controller
{
    public function edit()
    {
        return view('users.profile.edit', [
            'user' => Auth::user(),
        ]);
    }
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
}
