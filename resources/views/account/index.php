@extends('layouts.app')

@section('content')
    <div class="innernav align-items-center border-bottom bg-light">
        <div class=" container mt-3 stify-content-center">


        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url('account/') }}">Account</a></li>
                <li class="breadcrumb-item">Details</li>

            </ol>
        
        </nav>
        </div>
    </div>

    <div class="actionbar border-bottom bg-light">
        <div class="actionbar container justify-content-center py-2">
            <div class="row">
                <div class="col-4 d-flex align-items-center" id="header">Account Information</div>
                <div class="col-8 text-end">
                    <a href="{{url("account/details/edit")}}" class="btn btn-primary">Edit Account</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
		<div class="row justify-content-center">

 		<div class="col-md-9">
			<h3>Your Account</h3>

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

		<div class="shadow rounded p-3 mt-3">
			<h4>MFA</h4>
		
			@isset ($success)
				<div class="alert alert-success">
					{{ $success }}
				</div>
			@endisset

			@isset($error)
				<div class="alert alert-danger">
					{{ $error }}
				</div>
				@endisset

			@if (isset($user->two_factor_secret) && !empty($user->two_factor_secret))
				<div class="alert alert-success">
					Two Factor Authentication is enabled.
				</div>
				<div class="alert alert-warning">
					To disable MFA, click the button below.
				</div>
				<form method="POST" action="{{ url('user/two-factor-authentication') }}">
					@csrf
					@method('DELETE')
					<button type="submit" class="btn btn-danger">Disable MFA</button>
				</form>

			@if (session('status') == 'two-factor-authentication-confirmed')
				<div class=" my-3 alert alert-success">
					Two factor authentication confirmed and enabled successfully.
				</div>
			@endif

				@if (empty($user->two_factor_confirmed_at))
				<div class="my-3 alert alert-primary">MFA must still be setup. Scan the QR code using your Authenticator app, enter the matching code and click "Confirm MFA"</div>
				<h4>Setup MFA</h4>
				<div class="row">
					<div class="col-6">
						<h5>Scan QR code</h5>
						{{!! 	auth()->user()->twoFactorQrCodeSvg() !!}}
					</div>
					<div class="col-6">
						<h5>Recovery Codes</h5>
										<ul>
					@foreach (auth()->user()->recoveryCodes() as $code)
						<li>{{ $code }}</li>
					@endforeach
					</ul>
				
					</div>
				</div>
				<div>
					<form method="POST" action="{{ url('user/confirmed-two-factor-authentication') }}">
						@csrf
						<div class="my-3">
						<input type="text" name="code" placeholder="Enter MFA code" class="form-control">
						</div>
						<button type="submit" class="btn btn-primary">Confirm MFA</button>
					</form>
				</div>
				@endif
			@endif 

			@if (empty($user->two_factor_secret))
				<div class="row alert alert-danger">
				<div class="col-9 align-self-center">
					Two Factor Authentication is disabled
				</div>
					<div class="col-3 text-end">
						<form method="POST" action="{{ url('user/two-factor-authentication') }}">
							@csrf
							<button type="submit" class="btn btn-danger">Enable MFA</button> 
					</div>
				</div>

			@endif 

				</div>
			

			</div>



           
			</div>
			</div>
			</div>
	<!-- Load Bootstrap5 JS from CDN -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
@endsection