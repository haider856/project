<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use App\Models\Payroll;
// use App\Models\payrolls;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use PDF;

class PayrollsController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        return view('users.payrolls.index');
    }



    public function filter(Request $request)
{
    $user = Auth::user();
    $employe = Employe::where('user_id', $user->id)->first();

    if (!empty($request->months)) {
        $payrolls = Payroll::where('employe_id', $employe->id)
            ->where('months', '=', $request->months)
            ->get();
    } else {
        $payrolls = Payroll::where('employe_id', $employe->id)
            ->get();
    }

    $month = '';
    return view('users.payrolls.index', [
        'payrolls' => $payrolls,
        'month' => $request->months,
    ]);
}


    public function show()
    {
        $user = Auth::user();

        $employe = Employe::where('user_id', $user->id)->first();

        if ($employe) {
            $payroll = Payroll::where('employe_id', $employe->id)->first();

            $departments = Department::all();

            return view('users.payrolls.show', [
                'employe' => $employe,
                'payroll' => $payroll,
                'departments' => $departments,
            ]);
        }
    }

    public function generatPDF(Request $request, Payroll $payroll)
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

        $pdf = PDF::loadView('users.payrolls.pdf', ['payroll' => $data]);

        return $pdf->download('haider.pdf');
    }

}
