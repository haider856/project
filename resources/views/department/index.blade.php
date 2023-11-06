@extends('layouts.main')
@section('title', 'Department')
@section('content')
    <main class="content">
        <div class="container-fluid p-0">

            <div class="row">
                <div class="col-6">
                    <h2>Add Deparment</h2>
                </div>
                <div class="col-6 text-end">
                    <a href="{{ route('department.create') }}" class="btn btn-outline-primary">Add Departmennt</a>
                </div>
            </div>
            @if (count($departments) > 0)
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Sr</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($departments as $department)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $department->name }}</td>
                            <td>
                                <a href="{{ route('department.edit', $department) }}" class="btn btn-primary">Edit</a>
                                {{-- <a href="" class="btn btn-dark">Delete</a> --}}
                                <form action="{{ route('department.destroy', $department) }}" method="post"
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
    </main>
@endsection
