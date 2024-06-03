@extends('layouts.app')

@section('content')
    <div class="innernav align-items-center border-bottom bg-light">
        <div class=" container mt-3 stify-content-center">


        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url('admin/users') }}">Users</a></li>
                <li class="breadcrumb-item">Overview</li>

            </ol>
        
        </nav>
        </div>
    </div>

    <div class="actionbar border-bottom bg-light">
        <div class="actionbar container justify-content-center py-2">
            <div class="row">
                <div class="col-4 d-flex align-items-center" id="header">Users</div>
                <div class="col-8 text-end">
                    <a href="{{url('admin/users/create')}}" class="btn btn-success">Add User</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container justify-content-center">
    @if (!empty($success))
        <div class="alert alert-success mt-3">
            {{$success}}
        </div>
    @endif
    <h3>Users Overview</h3>
    <div class="alert alert-primary">
        This page shows an overview of all users that have been created. Note: Users currently have access to all projects. This will change in a future version.
    </div>

    <table class="table table-responsive table-striped table-light">
        <thead>
            <tr>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>E-mail</th>
                    <th>Role</th>
                    <th>Action</th>           
                </tr>
            </tr>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td class="align-middle">{{$user->id}}</td>
                    <td class="align-middle"><a href="{{url("admin/users/$user->id")}}">{{$user->name}}</a></td>
                    <td class="align-middle"><a href="{{url("admin/users/$user->id")}}">{{$user->email}}</a></td>
                    <td class="align-middle">{{$user->role->role}}</td>
                    <td class="align-middle"><a class="btn btn-primary btn-sm" href="{{url("admin/users/$user->id")}}">Open</a></td>
                </tr>
                @endforeach
            </tbody>
        </thead>
    </table>


    
@endsection