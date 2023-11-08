@extends('users.layouts.main')
@section('title', 'Data')
@section('content')
    <main class="content">
        <div class="container-fluid p-0">

            <div class="row">
                <div class="col-6">
                    <h2>Show</h2>
                </div>
                <div class="col-6 text-end">
                    <a href="{{ route('data.index') }}" class="btn btn-outline-primary">Back</a>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="container mt-4">
                                <div class="text-center">
                                    <img src=" {{ asset('template/img/employes/' . $employe->picture) }} "
                                        alt="Employee Picture" class="img-thumbnail" style="width: 200px; height: 200px;">
                                </div>
                            </div>

                            <div class="mt-4">
                                <div class="card md-col-6">
                                    <div class="card-body">

                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item mr-3">
                                                <div class="row">
                                                    <div class="col-md-3"><strong>Department:</strong></div>
                                                    <div class="col-md-9">
                                                        {{ $employe->department->name }}
                                                    </div>
                                                </div>
                                            </li>

                                            <li class="list-group-item mr-3">
                                                <div class="row">
                                                    <div class="col-md-3"><strong>Name:</strong></div>
                                                    <div class="col-md-9">
                                                        {{ $employe->user->name }}
                                                    </div>
                                                </div>
                                            </li>

                                            <li class="list-group-item mr-3">
                                                <div class="row">
                                                    <div class="col-md-3"><strong>Email:</strong></div>
                                                    <div class="col-md-9">{{ $employe->user->email }}</div>
                                                </div>
                                            </li>

                                            <li class="list-group-item mr-3">
                                                <div class="row">
                                                    <div class="col-md-3"><strong>Cnic:</strong></div>
                                                    <div class="col-md-9">{{ $employe->cnic }}</div>
                                                </div>
                                            </li>

                                            <li class="list-group-item mr-3">
                                                <div class="row">
                                                    <div class="col-md-3"><strong>gender:</strong></div>
                                                    <div class="col-md-9">{{ $employe->gender }}</div>
                                                </div>
                                            </li>

                                            <li class="list-group-item mr-3">
                                                <div class="row">
                                                    <div class="col-md-3"><strong>Relegion:</strong></div>
                                                    <div class="col-md-9">{{ $employe->religion }}</div>
                                                </div>
                                            </li>

                                            <li class="list-group-item mr-3">
                                                <div class="row">
                                                    <div class="col-md-3"><strong>Date of
                                                            Birth:</strong></div>
                                                    <div class="col-md-9">{{ $employe->dob }}</div>
                                                </div>
                                            </li>

                                            <li class="list-group-item mr-3">
                                                <div class="row">
                                                    <div class="col-md-3"><strong>
                                                            Address:</strong></div>
                                                    <div class="col-md-9">{{ $employe->address }}</div>
                                                </div>
                                            </li>

                                            <li class="list-group-item mr-3">
                                                <div class="row">
                                                    <div class="col-md-3"><strong>Joining
                                                            Date:</strong></div>
                                                    <div class="col-md-9">{{ $employe->joining_date }}</div>
                                                </div>
                                            </li>

                                            <li class="list-group-item mr-3">
                                                <div class="row">
                                                    <div class="col-md-3"><strong>Contact
                                                            No:</strong></div>
                                                    <div class="col-md-9">{{ $employe->contact }}</div>
                                                </div>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
