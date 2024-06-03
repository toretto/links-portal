@extends('layouts.app')

@section('content')

    <div class="innernav align-items-center border-bottom bg-light">
        <div class=" container mt-3 stify-content-center">


        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url('admin/users') }}">Users</a></li>
                <li class="breadcrumb-item">Add User</li>

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
    <div class="container">
		<div class="row justify-content-center">
        
 		<div class="col-md-9">


            <h3>Add New User</h3>
			
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
				<form method="POST" action="{{url('admin/users/store')}}">
                    @csrf

                    <div class="mb-3">
						<label for="name" class="form-label">Name</label>
						<input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{old('name')}}" required>
					</div>

					<div class="mb-3">
						<label for="email" class="form-label">Email address</label>
						<input type="email" class="form-control" id="email" name="email" placeholder="email@adres.be" value="{{old('email')}}"  required>
					</div>

					<!-- Create a dropdown for the roles Administrator, Editor and User-->
					<div class="mb-3">
						<label for="role" class="form-label">Role</label>
						<select class="form-select" id="role" name="role" required>
							<option value="user">User</option>
							<option value="editor">Editor</option>
							<option value="administrator">Administrator</option>
							<option value="guest">Guest</option>
						</select>
						</div>
					<div class="mb-3">
						<label for="password" class="form-label">Password</label>
						<input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
					</div>

                    <div class="mb-3">
						<label for="password" class="form-label">Confirm password</label>
						<input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Password" required>
					</div>
					<button type="submit" class="btn btn-primary">Create</button>
				</form>
			</div>
			</div>
			</div>
	<!-- Load Bootstrap5 JS from CDN -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
@endsection