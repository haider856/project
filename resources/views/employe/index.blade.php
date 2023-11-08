@extends('layouts.main')
@section('title', 'Employes')
@section('content')
    <main class="content">
        <div class="container-fluid p-0">

            <div class="row">
                <div class="col-6">
                    <h2>Employes</h2>
                </div>
                <div class="col-6 text-end">
                    <a href="{{ route('employe.create') }}" class="btn btn-outline-primary">Add Employe</a>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @include('partials.alerts')
                            @if (count($employes) > 0)
                                <table class="table table-bordered p-5">
                                    <thead>
                                        <tr>
                                            <th>Sr.No.</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>CNIC</th>
                                            <th>Department</th>
                                            <th>contact</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($employes as $employe)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $employe->user->name }}</td>
                                                <td>{{ $employe->user->email }}</td>
                                                <td>{{ $employe->cnic }}</td>
                                                <td>{{ $employe->department->name }}</td>
                                                <td>{{ $employe->contact }}</td>
                                                <td>
                                                    <a href="{{ route('employe.show', $employe) }}"
                                                        class="btn btn-primary">Show</a>
                                                    <a href="{{ route('employe.edit', $employe) }}"
                                                        class="btn btn-primary">Edit</a>

                                                    <form action="{{ route('employe.destroy', $employe) }}" method="post"
                                                        class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="submit" value="Delete" class="btn btn-danger">
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            @else
                                <div class="alert alert-info">No Record Found</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection
