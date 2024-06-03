@extends('layouts.app')

@section('content')
    <div class="container mt-5 border rounded-1">
        
 		<div class="row justify-content-center">

			<div class="col-md-6 mt-3 mb-3">
            <h3>Forgot password?</h3>
			@if (session('status'))
				<div class="alert alert-success">
					{{ session('status') }}
				</div>
			@endif
            <div class="alert alert-primary">
                Provide your e-mail address to start the password reset process.
                </div>

				<form method="POST" action="{{route('password.email')}}">
                    @csrf
					<div class="mb-3">
						<label for="email" class="form-label">Email</label>
						<input type="email" class="form-control" id="email" name="email" placeholder="email@adres.be" value="{{old('email')}}"  required>
					</div>
					<button type="submit" class="btn btn-primary">Reset</button>
				</form>


        <div class="mb-3">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
			</div>
		</div>
	<!-- Load Bootstrap5 JS from CDN -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
@endsection
