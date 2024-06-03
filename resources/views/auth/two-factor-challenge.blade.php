@extends('layouts.app')

@section('content')
    <div class="container mt-5 border rounded-1">
        
 		<div class="row justify-content-center">

			<div class="col-md-6 mt-3 mb-3">
            <h3>Confirm MFA</h3>

			<div class="alert alert-info">
				Enter a MFA code OR a recovery code.
			</div>

				<form method="POST" action="{{url('two-factor-challenge')}}">
                    @csrf

					<div class="mb-3">
						<label for="password" class="form-label">MFA Code</label>
						<input type="password" class="form-control" id="code" name="code" placeholder="MFA Code">
					</div>

					<div class="mb-3">
						<label for="password" class="form-label">Recovery Code</label>
						<input type="password" class="form-control" id="recovery_code" name="recovery_code" placeholder="Recovery Code">
					</div>

					<button type="submit" class="btn btn-primary">Confirm</button>
				</form>
			</div>
		</div>
	<!-- Load Bootstrap5 JS from CDN -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
@endsection
