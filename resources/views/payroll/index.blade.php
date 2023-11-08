@extends('layouts.main')
@section('title', 'Employes')
@section('content')
    <main class="content">
        <div class="container-fluid p-0">


            <div class="row">
                <div class="col-6">
                    <h2>Payroll</h2>
                </div>
                <div class="col-6 text-end">
                    <a href="{{ route('payroll.create') }}" class="btn btn-primary">Add Salery</a>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body table-responsive">
                            @include('partials.alerts')
                            <form action="{{ route('payroll.index') }}" method="post">
                                @csrf
                                <div class="row mb-3">

                                    <div class="col-6">
                                        <label for="months" class="form-label">Select Month:</label>
                                        <select name="months" class="form-select @error('months') is-invalid @enderror">
                                            <option value="" selected>Select a Month</option>
                                            @for ($monthNumber = 1; $monthNumber <= 12; $monthNumber++)
                                                @if (isset($month))
                                                    @php
                                                        $monthValue = date('F', strtotime("2023-$monthNumber-01"));
                                                    @endphp
                                                    <option value="{{ $monthValue }}"
                                                        {{ $month == $monthValue ? 'selected' : '' }}>
                                                        {{ $monthValue }}
                                                    </option>
                                                @else
                                                    @php
                                                        $monthValue = date('F', strtotime("2023-$monthNumber-01"));
                                                    @endphp
                                                    <option value="{{ $monthValue }}"
                                                        {{ old('months') == $monthValue ? 'selected' : '' }}>
                                                        {{ $monthValue }}
                                                    </option>
                                                @endif
                                            @endfor
                                        </select>
                                    </div>

                                    <div class="col-6">
                                        <label for="employe_id" class="form-label">Employes: </label>
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
                                                        <a href="{{ route('payroll.show', $payroll) }}"
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
