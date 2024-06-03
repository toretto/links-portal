@extends('layouts.app')

@section('content')
    <div class="container mt-5 border rounded-1">
        
 		<div class="row justify-content-center">

			<div class="col-md-6 mt-3 mb-3">
            <h3>Reset Password</h3>

						@if ($errors->any())
			<div class="alert alert-warning">
				<h3 class="alert-heading">Warning!</h3>
								<ul>
				@foreach ($errors->all() as $error)
				<li> {{ $error}} </li>
				@endforeach
</li>
			</div>
			@endif

				<form method="POST" action="{{url('reset-password')}}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
					<div class="mb-3">
						<label for="email" class="form-label">User</label>
						<input type="email" class="form-control" id="email" name="email" placeholder="email@adres.be" value="{{old('email')}}"  required>
					</div>
					<div class="mb-3">
						<label for="password" class="form-label">Password</label>
						<input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
					</div>

                    <div class="mb-3">
						<label for="password" class="form-label">Confirm password</label>
						<input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" required>
					</div>

					<input type="hidden" name="token" value="{{ $request->route('token') }}">
					
					<button type="submit" class="btn btn-primary">Reset</button>
				</form>
			</div>
		</div>
	<!-- Load Bootstrap5 JS from CDN -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
@endsection
