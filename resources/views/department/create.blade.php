@extends('layouts.main')
@section('title', 'Department')
@section('content')
    <main class="content">
        <div class="container-fluid p-0">

            <div class="row">
                <div class="col-6">
                    <h2>Departmetnts</h2>
                </div>
                <div class="col-6 text-end">
                    <a href="{{ route('departments') }}" class="btn btn-outline-primary">Back</a>
           </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @include('partials.alerts')
                            <form action="{{ route('department.create') }}" method="post">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <label for="name" class="form-label">Department Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            id="name" name="name" placeholder="Enter department name!"
                                            value="{{ old('name') }}">
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mt-2">
                                        <input type="submit" class="btn btn-primary" value="Add">
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection
