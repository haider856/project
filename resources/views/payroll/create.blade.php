@extends('layouts.main')
@section('title', 'payroll')
@section('content')
    <div class="container mt-5 mb-5">
        <main class="content">
            <div class="container-fluid p-0">
                <div class="row">
                    <div class="col-6">
                        <h2>Payroll</h2>
                    </div>
                    <div class="col-6 text-end">
                        <a href="{{ route('payroll.index') }}" class="btn btn-primary">Back</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                @include('partials.alerts')
                                <form action="{{ route('payroll.create') }}" method="post">
                                    @csrf
                                    <div class="row mb-3">
                                        <div class="col-4">
                                            <label for="employe_id" class="form-label">
                                                Employe
                                            </label>
                                            <select name="employe_id" id="employe_id"
                                                class="form-select @error('employe_id') is-invalid @enderror">
                                                <option value="">Select an employe!</option>
                                                @foreach ($employes as $employe)
                                                    @if (old('employe_id') == $employe->id)
                                                        <option value="{{ $employe->id }}" selected>
                                                            {{ $employe->user->name }}
                                                            ({{ $employe->cnic }})
                                                        </option>
                                                    @else
                                                        <option value="{{ $employe->id }}">{{ $employe->user->name }}
                                                            ({{ $employe->cnic }})
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            @error('employe_id')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-4">
                                            <label for="months" class="form-label">Select Month:</label>
                                            <select name="months" class="form-select @error('months') is-invalid @enderror">
                                                <option value="">Select a Month</option>
                                                @for ($monthNumber = 1; $monthNumber <= 12; $monthNumber++)
                                                    @php
                                                        $monthValue = date('F', strtotime("2023-$monthNumber-01"));
                                                    @endphp
                                                    @if (old('months') == $monthValue)
                                                    <option value="{{ $monthValue }}" selected >
                                                        {{ $monthValue }}
                                                    </option>
                                                    @else
                                                    <option value="{{ $monthValue }}"> {{ $monthValue }}
                                                    </option>
                                                    @endif
                                                @endfor
                                            </select>
                                        </div>


                                        <div class="col-4">
                                            <label for="basic_salary" class="form-label">Basic Salary</label>
                                            <input type="text"
                                                class="form-control @error('basic_salary') is-invalid @enderror"
                                                id="basic-salary" name="basic_salary" value="{{ old('basic_salary') }}">
                                            @error('basic_salary')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="mt-2">
                                        <input type="submit" value="Submit" class="btn btn-primary">
                                    </div>
                                </form>

                                <table class="table table-bordered mt-3">
                                    <tbody>
                                        <tr>
                                            <td>Basic Salary</td>
                                            <td id="basic-salary-cell"></td>
                                        </tr>
                                        <tr>
                                            <td>House Rent Allowance</td>
                                            <td id="House-rent-allowance"></td>
                                        </tr>
                                        <tr>
                                            <td>Conveyance Allowance</td>
                                            <td id="Convey-allowance"></td>
                                        </tr>
                                        <tr>
                                            <td>Medical Allowance</td>
                                            <td id="Medical-allowance"></td>
                                        </tr>
                                        <tr>
                                            <td>Special Allowance</td>
                                            <td id="Special-allowance"></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Total Amount</strong></td>
                                            <td id="total-allowance"></td>
                                        </tr>
                                        <tr>
                                            <td>Income Tax</td>
                                            <td id="Income-tax"></td>
                                        </tr>
                                        <tr>
                                            <td>Pension tax</td>
                                            <td id="Pension-tax"></td>
                                        </tr>
                                        <tr>
                                            <td>Insurance</td>
                                            <td id="Insurance"></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Total Deduction</strong></td>
                                            <td id="total-deduction"></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Total Amount</strong></td>
                                            <td id="total-amount"></td>
                                        </tr>
                                    </tbody>
                                </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                const basicSalaryElement = document.querySelector("#basic-salary");
                const basicSalaryCellElement = document.querySelector("#basic-salary-cell");
                const houseRentElement = document.querySelector("#House-rent-allowance");
                const conveyAllowanceElement = document.querySelector("#Convey-allowance");
                const medicalAllowanceElement = document.querySelector("#Medical-allowance");
                const specialAllowanceElement = document.querySelector("#Special-allowance");
                const totalAllowanceElement = document.querySelector("#total-allowance");
                const incomeTaxElement = document.querySelector("#Income-tax");
                const pensionTaxElement = document.querySelector("#Pension-tax");
                const insuranceElement = document.querySelector("#Insurance");
                const totalDeductionElement = document.querySelector("#total-deduction");
                const totalAmountElement = document.querySelector("#total-amount");

                basicSalaryElement.addEventListener("input", function() {
                    const basicSalaryValue = parseFloat(basicSalaryElement.value);
                    const houseRentValue = basicSalaryValue * 0.2;
                    const conveyAllowanceValue = basicSalaryValue * 0.02;
                    const medicalAllowanceValue = basicSalaryValue * 0.05;
                    const specialAllowanceValue = basicSalaryValue * 0.05;
                    const totalAllowanceValue = houseRentValue + conveyAllowanceValue + medicalAllowanceValue +
                        specialAllowanceValue;
                    const incomeTaxValue = basicSalaryValue * 0.05;
                    const pensionTaxValue = basicSalaryValue * 0.02;
                    const insuranceValue = basicSalaryValue * 0.02;
                    const totalDeductionValue = incomeTaxValue + pensionTaxValue + insuranceValue;
                    const totalAmountValue = basicSalaryValue + totalAllowanceValue - totalDeductionValue;

                    basicSalaryCellElement.textContent = basicSalaryValue;
                    houseRentElement.textContent = houseRentValue;
                    conveyAllowanceElement.textContent = conveyAllowanceValue;
                    medicalAllowanceElement.textContent = medicalAllowanceValue;
                    specialAllowanceElement.textContent = specialAllowanceValue;
                    totalAllowanceElement.textContent = totalAllowanceValue;
                    incomeTaxElement.textContent = incomeTaxValue;
                    pensionTaxElement.textContent = pensionTaxValue;
                    insuranceElement.textContent = insuranceValue;
                    totalDeductionElement.textContent = totalDeductionValue;
                    totalAmountElement.textContent = totalAmountValue;
                });
            </script>
        </main>
    </div>
@endsection
