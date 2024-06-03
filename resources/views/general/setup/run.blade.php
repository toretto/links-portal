@extends('layouts.app')

@section('content')

    <div class="mt-3">
        <h2>App Installer</h2>
        <p>APP has detected that you haven't run the installer yet. PLease run the installer to complete the installation before you can start using CATS.</p>
        
        @if ($errors->any())
        <div class="alert alert-danger">
            <h3 class="alert-heading">Errors</h3>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="alert alert-info">
            <h3>Password Requirements</h3>
            <p>The password must:</p>
                <ul>
                    <li>Must be 12 characters long</li>
                    <li>Must be a mix of lower- and uppercase letters</li>
                    <li>Must contain 1 number</li>
                    <li>Must contain 1 symbol</li>
                </ul>
        </div>
        <form method="post" action="{{route('install.store')}}">
        <h3>Create User</h3>
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" value="{{old('name')}}" required>

        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" value="{{old('email')}}" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>	
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm your password" required>
        </div>
        <button type="submit" class="btn btn-primary">Install</button>
    </div>
    
@endsection