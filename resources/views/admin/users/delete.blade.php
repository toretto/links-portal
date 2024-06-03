@extends('layouts.app')

@section('content')
    <div class="innernav align-items-center border-bottom bg-light">
        <div class=" container mt-3 stify-content-center">


        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url('admin/users') }}">Users</a></li>
                <li class="breadcrumb-item">Delete User</li>

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

    <div class="container">
		<div class="row justify-content-center">

 		<div class="col-md-9">

            <div class="alert alert-danger mt-4">
                <p>You are about to delete the user <strong>{{$user->name}}</strong>. Click "Delete" to confirm. </p>
            
                <form method="post" action="{{url("admin/users/$user->id")}}">
                    @method('delete')
                    @csrf
                <button class="btn btn-danger" type="submit">Delete User</button>
                </form>
            </div>
			</div>
			</div>
			</div>
	<!-- Load Bootstrap5 JS from CDN -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
@endsection