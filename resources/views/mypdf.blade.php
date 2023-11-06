<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5 mb-5">
        <main class="content">
            <div class="container-fluid p-0">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="container mt-5 mb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="text-center lh-1 mb-2">
                                                <h6 class="fw-bold">Payslip</h6>
                                                <span class="fw-normal">Payment slip for the month of
                                                    {{ $payroll['months'] }}</span>
                                            </div>
                                            <div class="d-flex justify-content text-end">
                                                    <span>Working Department:
                                                        {{ $payroll['employe']['department']['name'] }}
                                                    </span>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-10">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div>
                                                                <span class="fw-bolder">EMP CNIC</span>
                                                                <small class="ms-3"></small>
                                                                {{ $payroll['employe']['cnic'] }}
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div>
                                                                <span class="fw-bolder">EMP Name</span>
                                                                <small class="ms-3"></small>
                                                                {{ $payroll ['employe']['user']['name'] }}
                                                            </div>
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
                                                            <td>{{ $payroll['basic_salary'] }}</td>
                                                            <td>Income Tax</td>
                                                            <td>{{ $payroll['income_tax'] }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">House Rent Allowance</th>
                                                            <td>{{ $payroll['house_rent_allowance'] }}</td>
                                                            <td>Pension tax</td>
                                                            <td>{{ $payroll['pencion_tax'] }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Conveyance Allowance</th>
                                                            <td>{{ $payroll['convey_allowance'] }}</td>
                                                            <td>Insurance</td>
                                                            <td>{{ $payroll['insurance'] }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Medical Allowance</th>
                                                            <td>{{ $payroll['medical_allowance'] }}</td>
                                                            <td colspan="2"></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Special Allowance</th>
                                                            <td>{{ $payroll['spacial_allowance'] }}</td>
                                                            <td colspan="2"></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Total Allowance</th>
                                                            <td>{{ $payroll['total_allowance'] }}</td>
                                                            <td>Total Deduction</td>
                                                            <td>{{ $payroll['total_deduction'] }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <br>
                                                        <span class="fw-bold">Net Pay : {{ $payroll['total_amount'] }}</span>
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
            </div>
        </main>
    </div>
</body>
</html>
