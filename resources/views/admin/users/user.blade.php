@extends('layouts.app')

@section('content')
    <div class="innernav align-items-center border-bottom bg-light">
        <div class=" container mt-3 stify-content-center">


        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url('admin/users') }}">Users</a></li>
                <li class="breadcrumb-item">{{$user->name}}</li>

            </ol>
        
        </nav>
        </div>
    </div>

    <div class="actionbar border-bottom bg-light">
        <div class="actionbar container justify-content-center py-2">
            <div class="row">
                <div class="col-4 d-flex align-items-center" id="header">Users</div>
                <div class="col-8 text-end">
					<a href="{{url("admin/users/delete/$user->id")}}" class="btn btn-danger">Delete User</a>
                    <a href="{{url("admin/users/$user->id/edit")}}" class="btn btn-primary">Edit User</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
		<div class="row justify-content-center">

 		<div class="col-md-9">
			<h3>{{$user->name}}</h3>

		<div class="shadow rounded p-3">
		<h5>Details</h5>
		<table class="table table-borderless">
			<tr>
				<th>
					Name:
				</th>
				<td>
					{{ $user->name }}
				</td>
			</tr>
				<tr>
					<th>E-mail:</th>
					<td>{{ $user->email }}</td>
				</tr>
				<tr>
					<th>
						Global Role:
					</th>
					<td>
						{{ $user->role->role }}
				</tr>

		</table>
		</div>


           
			</div>
			</div>
			</div>
	<!-- Load Bootstrap5 JS from CDN -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
@endsection