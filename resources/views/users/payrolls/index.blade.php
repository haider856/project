@extends('users.layouts.main')
@section('title', 'Employes')
@section('content')
    <main class="content">
        <div class="container-fluid p-0">

            <div class="row">
                <div class="col-6">
                    <h2>Payroll</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body table-responsive">
                            @include('partials.alerts')
                            <form action="{{ route('payrolls.index') }}" method="post">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-6">
                                        <label for="months" class="form-label">Select Month:</label>
                                        <select name="months" class="form-select @error('months') is-invalid @enderror">
                                            @for ($monthName = 1; $monthName <= 12; $monthName++)
                                                <option value="{{ date('F', strtotime("2023-$monthName-01")) }}">
                                                    {{ date('F', strtotime("2023-$monthName-01")) }}
                                                </option>
                                            @endfor
                                        </select>
                                    </div>

                                    <div class="mt-2">
                                        <input type="submit" value="Submit" class="btn btn-primary">
                                    </div>
                            </form>

                            @isset($payrolls)
                                @if (count($payrolls) > 0)
                                    <table class="table table-bordered mt-3">
                                        <thead>
                                            <tr>
                                                <th>Sr.No.</th>
                                                <th>Name</th>
                                                <th>Cnic No</th>
                                                <th>Department</th>
                                                <th>Salery</th>
                                                <th>Month</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($payrolls as $payroll)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $payroll->employe->user->name }}</td>
                                                    <td>{{ $payroll->employe->cnic }}</td>
                                                    <td>{{ $payroll->employe->department->name }}</td>
                                                    <td>{{ $payroll->total_amount }}</td>
                                                    <td>{{ $payroll->months }}</td>
                                                    <td>
                                                        <a href="{{ route('payrolls.show', $payroll) }}"
                                                            class="btn btn-primary">Show</a>
                                                        <form action="" method="post" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>

                                    {{-- <div class="row justify-content-end">
                                        <div class="col-auto">
                                            {{ $contacts->links('vendor.pagination.bootstrap-5') }}
                                        </div>
                                    </div> --}}
                                @else
                                    <div class="alert alert-info mt-3">No Record Found</div>
                                @endif
                            @endisset
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection
