@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header bg-gradient-primary text-white">
        Add User
    </div>
    <form action="{{ route('user.store') }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-row">
                <div class="form-group col-md-8">
                    <label for="input">Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Name" name="name" required value="{{ old('name') }}">
                </div>
                <div class="form-group col-md-4">
                    <label for="input">Role</label>
                    <select name="role" id="role" class="form-control">
                        <option value="" selected disabled>Select a Role</option>
                        <option value="1">Administrator</option>
                        <option value="2">Supervisor</option>
                        <option value="3">Trainee</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="input">Email</label>
                    <input type="text" class="form-control" id="email" placeholder="Email" name="email" required value="{{ old('email') }}">
                </div>
                <div class="form-group col-md-6"><label for="input">Password</label>
                    <input type="text" class="form-control" id="password" placeholder="Temporary Password" name="password" required value="{{ old('temp-password') }}">
                </div>
            </div>
             @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="p-0 m-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-success btn-sm">Save</button>
            <a href="{{ route('user.index') }}" class="btn btn-secondary btn-sm">Cancel</a>
        </div>
    </form>
</div>
@endsection