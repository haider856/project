@extends('users.layouts.main')
@section('title', 'payrolls')
@section('content')
    <div class="container mt-5 mb-5">
        <main class="content">
            <div class="container-fluid p-0">
                <div class="row">
                    <div class="col-6">
                        <h2>Payroll</h2>
                    </div>
                    <div class="col-6 text-end">
                        <a href="{{ route('payrolls.index') }}" class="btn btn-primary">Back</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                @include('users.partials.alerts')
                                <div class="container mt-5 mb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="text-center lh-1 mb-2">
                                                <h6 class="fw-bold">Payslip</h6> <span class="fw-normal">Payment slip
                                                    for
                                                    the month of {{ $payroll->months }}</span>
                                            </div>
                                            <div class="d-flex justify-content-end"> <span>Working Department:
                                                    {{ $payroll->employe->department->name }}</span> </div>
                                            <div class="row">
                                                <div class="col-md-10">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div> <span class="fw-bolder">EMP CNIC</span> <small
                                                                    class="ms-3"></small>
                                                                {{ $payroll->employe->cnic }}
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div> <span class="fw-bolder">EMP Name</span> <small
                                                                    class="ms-3"></small>
                                                                {{ $payroll->employe->user->name }} </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <table class="mt-4 table table-bordered">
                                                    <thead class="bg-secondary">
                                                        <tr>
                                                            <th scope="col">Earnings</th>
                                                            <th scope="col">Amount</th>
                                                            <th scope="col">Deductions</th>
                                                            <th scope="col">Amount</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">Basic Salary</th>
                                                            <td>{{ $payroll->basic_salary }}</td>
                                                            <td>Income Tax</td>
                                                            <td> {{ $payroll->income_tax }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">House Rent Allowance</th>
                                                            <td>{{ $payroll->house_rent_allowance }}</td>
                                                            <td>Pension tax</td>
                                                            <td>{{ $payroll->pencion_tax }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Conveyance Allowance</th>
                                                            <td> {{ $payroll->convey_allowance }} </td>
                                                            <td>Insurance</td>
                                                            <td>{{ $payroll->insurance }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Medical Allowance</th>
                                                            <td>{{ $payroll->medical_allowance }} </td>
                                                            <td colspan="2"></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Special Allowance</th>
                                                            <td>{{ $payroll->spacial_allowance }} </td>
                                                            <td colspan="2"></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Total Allowance</th>
                                                            <td> {{ $payroll->total_allowance }}</td>
                                                            <td>Total Deduction</td>
                                                            <td>{{ $payroll->total_deduction }} </td>
                                                    </tbody>
                                                </table>
                                                <div class="row">
                                                    <div class="col-md-4"> <br> <span class="fw-bold">Net Pay :
                                                            {{ $payroll->total_amount }} </span>
                                                    </div>
                                                    <form action="{{ route('payrolls.slip', $payroll) }}" method="get">
                                                        {{-- <div class="mt-2">
                                                            <input type="submit" value="Print PDF" class="btn btn-success">
                                                        </div> --}}
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
