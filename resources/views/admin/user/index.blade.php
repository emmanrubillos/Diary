@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header bg-info">
            <div class="row">
                <div class="col-md-6 col-12">
                    <i class="fas fa-solid fa-user-secret"></i>
                    Users
                </div>
                <div class="col-md-6 col-12 text-right">
                    <a href="{{ route('user.create') }}" class="btn btn-primary btn-sm">Add User</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Action</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                  </tr>
                </thead>
                <tbody>
                @if(isset($users) && $users->count() > 0)
                    @foreach($users as $index => $user)
                  <tr>
                    <th scope="row">{{ $index + 1 }}</th>
                    <td>
                      <a href="{{ route('user.edit', $user->id ) }}" class="btn btn-sm btn-warning">Edit</a>
                      <button onclick="confirmDelete({{ $user->id }})" class="btn btn-sm btn-danger">Delete</button>
                    </td> 
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                      @if($user->role == 1)
                        <span class="badge badge-danger">Administrator</span>
                      @elseif($user->role == 2)
                        <span class="badge badge-warning">Supervisor</span>
                      @else
                      <span class="badge badge-secondary">Trainee</span>
                      @endif
                    </td>
                  </tr>
                  @endforeach
                @else
                  <div class="alert alert-danger">No Users Found</div>
                @endif()
                </tbody>
              </table>
              @if(isset($user_name))
              <div class="alert alert-success mb-0">
                <strong>Success!</strong> {{ $user_name }}'s information has been successfully updated.
              </div>
            @endif
        </div>
        <div class="card-footer"></div>
    </div>
@endsection