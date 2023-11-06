<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use App\Models\Payroll;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Auth\User;
use App\Models\Payroll as ModelsPayroll;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use PDF;

class PayrollController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('payroll.index', [
            'employes' => Employe::all(),
        ]);
    }

    public function filter(Request $request)
    {
        if (!empty($request->months) && !empty($request->employe_id)) {
            $payrolls = Payroll::where([
                ['months', '=', $request->months],
                ['employe_id', '=', $request->employe_id],
            ])->get();
        } elseif (!empty($request->months)) {
            $payrolls = Payroll::where([
                ['months', '=', $request->months],
            ])->get();
        } elseif (!empty($request->employe_id)) {
            $payrolls = Payroll::where([
                ['employe_id', '=', $request->employe_id],
            ])->get();
        }

        return view('payroll.index', [
            'employes' => Employe::all(),
            'payrolls' => $payrolls,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('payroll.create', [
            'payrolls' => Payroll::all(),
            'employes' => Employe::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Payroll $payroll)
    {
        $request->validate([
            'months' => ['required'],
            'employe_id' => ['required'],
            'basic_salary' => ['required', 'numeric'],
        ]);

        $basic_salary = $request->basic_salary;
        $house_rent_allowance = $basic_salary * 0.2;
        $convey_allowance = $basic_salary * 0.02;
        $medical_allowance = $basic_salary * 0.05;
        $special_allowance = $basic_salary * 0.05;
        $total_allowance = $house_rent_allowance + $convey_allowance + $medical_allowance + $special_allowance;
        $incomeTax = $basic_salary * 0.05;
        $pencionTax = $basic_salary * 0.02;
        $insurance = $basic_salary * 0.02;
        $total_deduction = $incomeTax + $pencionTax + $insurance;
        $total_amount = $basic_salary + $total_allowance - $total_deduction;

        $data = [
            'months' => $request->months,
            'employe_id' => $request->employe_id,
            'basic_salary' => $request->basic_salary,
            'house_rent_allowance' => $house_rent_allowance,
            'convey_allowance' => $convey_allowance,
            'medical_allowance' => $medical_allowance,
            'spacial_allowance' => $special_allowance,
            'total_allowance' => $total_allowance,
            'income_tax' => $incomeTax,
            'pencion_tax' => $pencionTax,
            'insurance' => $insurance,
            'total_deduction' => $total_deduction,
            'total_amount' => $total_amount,
        ];

        // $is_created = User::create($data);
        $is_created = Payroll::create($data);
        if ($is_created) {
            return back()->with(['success' => 'Magic has been spelled!']);
        } else {
            return back()->with(['failure' => 'Magic has failed to spell!']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(payroll $payroll)

    {
        $employe = $payroll->employe;

        return view('payroll.show', [
            'payroll' => $payroll,
            'employe' => $employe,
        ]);
    }

    public function generatePDF(Request $request, Payroll $payroll)
    {
        $employe = $payroll->employe;
        $basic_salary = $request->basic_salary;
        $house_rent_allowance = $basic_salary * 0.2;
        $convey_allowance = $basic_salary * 0.02;
        $medical_allowance = $basic_salary * 0.05;
        $special_allowance = $basic_salary * 0.05;
        $total_allowance = $house_rent_allowance + $convey_allowance + $medical_allowance + $special_allowance;
        $incomeTax = $basic_salary * 0.05;
        $pencionTax = $basic_salary * 0.02;
        $insurance = $basic_salary * 0.02;
        $total_deduction = $incomeTax + $pencionTax + $insurance;
        $total_amount = $basic_salary + $total_allowance - $total_deduction;

        $data = [
            'date' => date('m/d/Y'),
            'employe' => $employe,
            'months' => $payroll->months,
            'basic_salary' => $payroll->basic_salary,
            'house_rent_allowance' => $payroll->house_rent_allowance,
            'convey_allowance' => $payroll->convey_allowance,
            'medical_allowance' => $payroll->medical_allowance,
            'spacial_allowance' => $payroll->special_allowance,
            'total_allowance' => $payroll->total_allowance,
            'income_tax' => $payroll->income_tax,
            'pencion_tax' => $payroll->pencion_tax,
            'insurance' => $payroll->insurance,
            'total_deduction' => $payroll->total_deduction,
            'total_amount' => $payroll->total_amount,
        ];
        // dd($data);

        $pdf = PDF::loadView('mypdf', ['payroll' => $data]);

        return $pdf->download('itsolutionstuff.pdf');
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(payroll $payroll)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, payroll $payroll)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(payroll $payroll)
    {
        //
    }
}
