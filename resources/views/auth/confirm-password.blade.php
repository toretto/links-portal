@extends('layouts.app')

@section('content')
    <div class="container mt-5 border rounded-1">
        
 		<div class="row justify-content-center">

			<div class="col-md-6 mt-3 mb-3">
            <h3>Confirm Password</h3>

				<form method="POST" action="{{url('user/confirm-password')}}">
                    @csrf

					<div class="mb-3">
						<label for="password" class="form-label">Password</label>
						<input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
					</div>

					<button type="submit" class="btn btn-primary">Confirm</button>
				</form>
			</div>
		</div>
	<!-- Load Bootstrap5 JS from CDN -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
@endsection
