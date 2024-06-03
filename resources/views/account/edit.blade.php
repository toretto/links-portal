@extends('layouts.app')

@section('content')
    <div class="container">
	    <div class="innernav align-items-center border-bottom bg-light">
        <div class=" container mt-3 stify-content-center">


        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url('admin/users') }}">Users</a></li>
                <li class="breadcrumb-item">Edit User</li>

            </ol>
        
        </nav>
        </div>
    </div>

    <div class="actionbar border-bottom bg-light">
        <div class="actionbar container justify-content-center py-2">
            <div class="row">
                <div class="col-4 d-flex align-items-center" id="header">Users</div>
                <div class="col-8 text-end">
                </div>
            </div>
        </div>
    </div>
		<div class="row justify-content-center">
        
 		<div class="col-md-9">


            <h3>Edit User</h3>
			
			<div class="alert alert-primary">
				The password must: 
				<ul>
					<li>Must be  12 characters long</li>
					<li>Must be a mix of lower- and uppercase letters</li>
					<li>Must contain 1 number</li>
					<li>Must contain 1 symbol</li>
			</div>
			@if ($errors->any())
			<div class="alert alert-warning">
				<h3 class="alert-heading">Attention</h3>
								<ul>
				@foreach ($errors->all() as $error)
				<li> {{ $error}} </li>
				@endforeach
</li>
			</div>
			@endif
				<form method="POST" action="{{url("account/details/update")}}">
                    @csrf

                    <div class="mb-3">
						<div class="alert alert-warning">To change your username or e-mail address, please contact an administrator</div>
					</div>

					<div class="mb-3">
					<h3>Account Details</h3>
						<label for="name" class="form-label">Name</label>
						<input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" placeholder="Name" readonly>
					</div>
					<div class="mb-3">
						<label for="email" class="form-label">E-mail</label>
						<input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" placeholder="E-mail" readonly>
					</div>
					<div class="mb-3">
						<label for="role" class="form-label">Global Role</label>
						<input type="text" class="form-control" id="role" name="role" value="{{ $user->role->role }}" placeholder="Role" readonly>
					</div>
					<!-- Create a dropdown for the roles Administrator, Editor and User-->
					<h5>Reset Password</h5>

					@isset($success)
						<div class="alert alert-success">{{$success}}</div>
				
					@endisset
					<div class="alert alert-primary">Leave empty if you don't want to change the password for this user.</div>
					<div class="mb-3">
						<label for="password" class="form-label">Password</label>
						<input type="password" class="form-control" id="password" name="password" placeholder="Password">
					</div>

                    <div class="mb-3">
						<label for="password" class="form-label">Confirm password</label>
						<input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Password">
					</div>
					<button type="submit" class="btn btn-primary">Save</button>
				</form>
			</div>
			</div>
			</div>
	<!-- Load Bootstrap5 JS from CDN -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
@endsection