@extends('layouts.main')
@section('title', 'Edit')
@section('content')
    <main class="content">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-6">
                    <h2>Edit </h2>
                </div>
                <div class="col-6 text-end">
                    <a href="{{ route('employe') }}" class="btn btn-outline-primary">Back</a>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @include('partials.alerts')
                            <form action="{{ route('employe.details', $employe) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="row mb-3">
                                    <h4>Personal Info</h4>
                                    <div class="col-md-4">
                                        <label for="department_id" class="form-label">Department</label>
                                        <select name="department_id" id="department_id"
                                            class="form-select @error('department_id') is-invalid @enderror">
                                            <option value="">Select a department!</option>
                                            @if (old('department_id'))
                                                @foreach ($departments as $department)
                                                    @if (old('department_id') == $department->id)
                                                        <option value="{{ $department->id }}" selected>
                                                            {{ $department->name }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $department->id }}">{{ $department->name }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            @else
                                                @foreach ($departments as $department)
                                                    @if ($employe->department_id == $department->id)
                                                        <option value="{{ $department->id }}" selected>
                                                            {{ $department->name }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $department->id }}">{{ $department->name }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </select>
                                        @error('department_id')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-4">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            id="name" name="name" placeholder="Enter your name!"
                                            value="{{ old('name') ?? $employe->user->name }}">
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-4">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            id="email" name="email" placeholder="Enter your email!"
                                            value="{{ old('email') ?? $employe->user->email }}">
                                        @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <label for="cnic" class="form-label">Cnic</label>
                                        <input type="text" class="form-control @error('cnic') is-invalid @enderror"
                                            id="cnic" name="cnic" placeholder="Enter your cnic!"
                                            value="{{ old('cnic') ?? $employe->cnic }}">
                                        @error('cnic')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-4">
                                        <label for="contact" class="form-label">contact</label>
                                        <input type="contact" class="form-control @error('contact') is-invalid @enderror"
                                            id="contact" name="contact" placeholder="Enter your personal contact no!"
                                            value="{{ old('contact') ?? $employe->contact }}">
                                        @error('contact')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        @if (old('gender'))
                                            @php
                                                $gender = old('gender');
                                            @endphp
                                        @else
                                            @php
                                                $gender = $employe->gender;
                                            @endphp
                                        @endif

                                        <label for="gender" class="form-lable @error('gender') is-invalid @enderror">
                                            <h6 class="mb-3">Gender</h6>
                                        </label>

                                        <br>

                                        <input type="radio" id="male" name="gender" value="male"
                                            {{ $gender == 'male' ? 'checked' : '' }}>
                                        <label for="male">Male</label>

                                        <input type="radio" id="female" name="gender" value="female"
                                            {{ $gender == 'female' ? 'checked' : '' }}>
                                        <label for="female">Female</label><br>
                                    </div>


                                    <div class="col-md-4">
                                        <label for="dob" class="form-label">DOB</label>
                                        <input type="date" class="form-control @error('dob') is-invalid @enderror"
                                            id="dob" name="dob" placeholder="Enter your dob!"
                                            value="{{ old('dob') ?? $employe->dob }}">
                                        @error('dob')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-4">
                                        <label for="religion" class="form-label">Religion</label>
                                        <input type="text" class="form-control @error('religion') is-invalid @enderror"
                                            id="religion" name="religion" placeholder="Enter your religion!"
                                            value="{{ old('religion') ?? $employe->religion }}">
                                        @error('religion')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <label for="address" class="form-label">Address</label>
                                        <textarea name="address" id="address" cols="30" rows="2"
                                            class="form-control @error('address') is-invalid @enderror" placeholder="Enter your Permanent address">{{ old('address') ?? $employe->address }}</textarea>
                                        @error('address')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <label for="joining_date" class="form-label">Joining Date</label>
                                        <input type="date"
                                            class="form-control @error('joining_date') is-invalid @enderror"
                                            name="joining_date" placeholder="Enter your joining date!"
                                            value="{{ old('joining_date') ?? $employe->joining_date }}">
                                        @error('joining_date')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div>
                                    <input type="submit" class="btn btn-primary" value="Save">
                                </div>
                            </form>

                            <form action="{{ route('employe.picture', $employe) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="row mb-3">
                                    <label for="picture" class="form-label">Profile Picture</label>
                                    <input type="file" class="form-control @error('picture') is-invalid @enderror"
                                        id="picture" name="picture">
                                    @error('picture')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <input type="submit" class="btn btn-primary" value="Save">
                                </div>
                            </form>

                            <form action="{{ route('employe.password', $employe) }}" method="post">
                                @csrf
                                @method('PATCH')
                                <div class="row mb-3">
                                    <h4>Personal Info</h4>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password"
                                            class="form-control @error('password') is-invalid @enderror" id="password"
                                            name="password" placeholder="Enter your password!"
                                            value="{{ old('password') }}">
                                        @error('password')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="password_confirmation" class="form-label">Password
                                            Confirmation</label>
                                        <input type="password" class="form-control" name="password_confirmation"
                                            id="password_confirmation" placeholder="Confirm your password!">
                                    </div>

                                </div>

                                <div class="mb-3">
                                    <input type="submit" class="btn btn-primary" value="Save">
                                </div>
                            </form>



                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection
