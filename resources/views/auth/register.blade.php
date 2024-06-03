@extends('layouts.app')

@section('content')
    <div class="container mt-5 border rounded-1">
        
 		<div class="row justify-content-center">

			<div class="col-md-6 mt-3 mb-3">
            <h3>Register User</h3>
</div><div class="alert alert-primary">
				Opgelet: het paswoord moet: 
				<ul>
					<li>Must be  12 characters long</li>
					<li>Must be a mix of lower- and uppercase letters</li>
					<li>Must contain 1 number</li>
					<li>Must contain 1 symbol</li>
			</div>
			@if ($errors->any())
			<div class="alert alert-warning">
				<h3 class="alert-heading">Opgelet!</h3>
								<ul>
				@foreach ($errors->all() as $error)
				<li> {{ $error}} </li>
				@endforeach
</li>
			</div>
			@endif
				<form method="POST" action="{{url('register')}}">
                    @csrf

                    <div class="mb-3">
						<label for="name" class="form-label">Name</label>
						<input type="text" class="form-control" id="name" name="name" placeholder="Naam" value="{{old('name')}}" required>
					</div>

					<div class="mb-3">
						<label for="email" class="form-label">Email address</label>
						<input type="email" class="form-control" id="email" name="email" placeholder="email@adres.be" value="{{old('email')}}"  required>
					</div>
					<div class="mb-3">
						<label for="password" class="form-label">Password</label>
						<input type="password" class="form-control" id="password" name="password" placeholder="Paswoord" required>
					</div>

                    <div class="mb-3">
						<label for="password" class="form-label">Confirm password</label>
						<input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Paswoord" required>
					</div>
					<button type="submit" class="btn btn-primary">Register</button>
				</form>
			</div>
		</div>
	<!-- Load Bootstrap5 JS from CDN -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
@endsection