<!DOCTYPE html>
<html>
<head>
	<title>Prison Transfer</title>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>

    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <style>
    	.card{
    		width: 100% !important;
    		margin: auto;
    		text-align: center;
    		margin-top: 30vh;
    		margin-bottom: 30vh;
    		padding: 10vh 0;
    		color: #000;
    	}
    	.row a{
    		text-decoration: none;
    	}

    </style>
</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-sm-12">
				<a href="{{ route('login') }}">
					<div class="card bg-white">
						<div class="card-body">
							<h1>
								ADMIN
							</h1>
						</div>
					</div>
				</a>
			</div>
			<div class="col-lg-6 col-sm-12">
				<a href="{{ route('relative_login') }}">
					<div class="card bg-white">
						<div class="card-body">
							<h1>RELATIVE</h1>
						</div>
					</div>
				</a>
			</div>
		</div>
	</div>





    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/perfect-scrollbar.jquery.min.js') }}"></script>


</body>
</html>