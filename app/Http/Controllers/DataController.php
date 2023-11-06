<?php

namespace App\Http\Controllers;

use App\Models\data;
use App\Models\Employe;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class DataController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    // public function index(Employe $employe)
    // {
    //     // $worker = Employe::where('user', '=', Auth::user()->doctor->id)->get();
    //     return view('users.data.index', [
    //         'employe' => $employe,
    //         'departments' => Department::all(),
    //     ]);
    // }

    public function index()
{
    $user = Auth::user();
    $employe = Employe::where('user_id', $user->id)->first();
    $departments = Department::all();

    return view('users.data.index', [
        'employe' => $employe,
        'departments' => $departments,
    ]);
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
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(data $data)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, data $data)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(data $data)
    {
        //
    }
}
