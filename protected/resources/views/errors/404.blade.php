<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Page No Found</title>
	@include('tema-admin.head')
</head>
<body>
	<div class="main-wrapper">
		<div class="page-wrapper full-page">
			<div class="page-content d-flex align-items-center justify-content-center">

				<div class="row w-100 mx-0 auth-page">
					<div class="col-md-8 col-xl-6 mx-auto d-flex flex-column align-items-center">
						<img src="{{ asset('admin/assets/images/404.svg') }}" class="img-fluid mb-2" alt="404">
						<h1 class="font-weight-bold mb-22 mt-2 tx-80 text-muted">404</h1>
						<h4 class="mb-2">Page Not Found</h4>
						<h6 class="text-muted mb-3 text-center">Oopps!! The page you were looking for doesn't exist.</h6>
						<a href="{{ url('home') }}" class="btn btn-primary">Back to home</a>
					</div>
				</div>

			</div>
		</div>
	</div>
</body>
</html>