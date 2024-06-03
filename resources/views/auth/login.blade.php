@extends('layouts.app')

@section('content')
    <div class="container mt-5 border rounded-1">
        
 		<div class="row justify-content-center">

			<div class="col-md-6 mt-3 mb-3">
            <h3>Aanmelden</h3>

				<form method="POST" action="{{route('login')}}">
                    @csrf
					<div class="mb-3">
						<label for="email" class="form-label">User</label>
						<input type="email" class="form-control" id="email" name="email" placeholder="email@adres.be" value="{{old('email')}}"  required>
					</div>
					<div class="mb-3">
						<label for="password" class="form-label">Paswoord</label>
						<input type="password" class="form-control" id="password" name="password" placeholder="Paswoord" required>
					</div>
					<button type="submit" class="btn btn-primary">Login</button>
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