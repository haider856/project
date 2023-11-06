<?php

namespace App\Http\Controllers;

use id;
use App\Models\User;
use App\Models\Employe;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Expr\Empty_;
use Symfony\Contracts\Service\Attribute\Required;

use function Laravel\Prompts\error;
use function PHPSTORM_META\type;

class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('employe.index', [
            'employes' => Employe::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employe.create', [
            'departments' => Department::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'department_id' => ['required'],
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed'],
            'cnic' => ['required', 'unique:employes,cnic'],
            'gender' => ['required'],
            'religion' => ['required'],
            'dob' => ['required'],
            'contact' => ['required'],
            'address' => ['required'],
            'joining_date' => ['required'],
            'picture' => ['image', 'mimes:png,jpg,jpeg', 'required'],
        ]);

        $picture = null;

        if ($request->picture->getError() === 0) {
            $picture = "ACI-" . microtime(true) . "." . $request->picture->extension();

            $request->picture->move(public_path('template/img/employes'), $picture);
        }

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'type' => 'employe',
            'password' => Hash::make($request->password),
            'type' => 'employe'
        ];

        $is_created = User::create($data);
        if ($is_created) {
            $id = $is_created->id;
            $data = [
                'user_id' => $id,
                'cnic' => $request->cnic,
                'department_id' => $request->department_id,
                'gender' => $request->gender,
                'religion' => $request->religion,
                'dob' => $request->dob,
                'address' => $request->address,
                'contact' => $request->contact,
                'joining_date' => $request->joining_date,
                'picture' => $picture,
            ];

            $is_created = Employe::create($data);
            if ($is_created) {
                return back()->with(['success' => 'Magic has been spelled!']);
            } else {
                return back()->with(['failure' => 'Magic has failed to spell!']);
            }
        } else {
            return back()->with(['failure' => 'Failed to create!']);
        }
    }

    // }

    /**
     * Display the specified resource.
     */
    public function show(Employe $employe)
    {
        return view('employe.show', [
            'employe' => $employe,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employe $employe)
    {
        return view('employe.edit', [
            'employe' => $employe,
            'departments' => Department::all(),
        ]);
    }

    public function update_details(Request $request, Employe $employe)
    {
        $request->validate([
            'department_id' => ['required'],
            'name' => ['required'],
            'email' => ['required'],
            'cnic' => ['required'],
            'dob' => ['required'],
            'gender' => ['required'],
            'religion' => ['required'],
            'contact' => ['required'],
            'address' => ['required'],
            'joining_date' => ['required'],
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        $is_updated = $employe->user->update($data);

        if ($is_updated) {
            $data = [
                'cnic' => $request->cnic,
                'department_id' => $request->department_id,
                'gender' => $request->gender,
                'religion' => $request->religion,
                'dob' => $request->dob,
                'address' => $request->address,
                'date' => $request->date,
                'contact' => $request->contact,
            ];
            // dd($data);

            $is_updated = $employe->update($data);
            if ($is_updated) {
                return back()->with(['success' => 'Magic has been spelled!']);
            } else {
                return back()->with(['failure' => 'Magic has failed to spell!']);
            }
        } else {
            return back()->with(['failure' => 'Magic has failed to spell!']);
        }
    }

    public function update_picture(Request $request, Employe $employe)
    {
        $request->validate([
            'picture' => ['required', 'image', 'mimes:png,jpg,jpeg'],
        ]);

        if (!empty($employe->picture)) {
            unlink('template/img/employes/' . $employe->picture);
        }

        $picture = "ACI-" . microtime(true) . "." . $request->picture->extension();

        if ($request->picture->move(public_path('template/img/employes'), $picture)) {
            $data = [
                'picture' => $picture,
            ];

            $is_updated = $employe->update($data); // Use $employe->update instead of employe::find(Employe::id())->update

            if ($is_updated) {
                return back()->with(['success' => 'Profile picture has been successfully updated!']);
            } else {
                return back()->with(['failure' => 'Profile picture has failed to update!']);
            }
        } else {
            return back()->with(['failure' => 'Profile picture has failed to upload!']);
        }
    }
    // {

    public function update_password(Request $request)
    {
        $request->validate([
            'password' => ['required', 'confirmed'],
        ]);

        $data = [
            'password' => $request->password,
        ];

        $is_updated = User::find(Auth::id())->update($data);
        // dd($data);
        if ($is_updated) {
            return back()->with(['success' => 'User details has been successfully updated!']);
        } else {
            return back()->with(['failure' => 'User details has failed to update!']);
        }
    }

    /**
     * Update the specified resource in storage.
     */

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employe $employe)
    {
        $is_deleted = $employe->user->delete();

        if ($is_deleted) {
            return redirect()->route('employe')->with(['success' => 'Magic has been spelled!']);
        } else {
            return redirect()->route('employe')->with(['failure' => 'Magic has failed to spell!']);
        }
    }
}
