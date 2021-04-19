<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

	<title>Hello, world!</title>
</head>

<body>
	<ul class="nav justify-content-end">
		<li class="nav-item">
			<a class="nav-link active" href="#">Home</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="#">Equipment</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="#">Info</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="#">Contact</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="<?php echo base_url('auth'); ?>">Login</a>
		</li>
	</ul>
	<div id="carouselFull" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
			<li data-target="#carouselIndicators" data-slide-to="1"></li>
			<li data-target="#carouselIndicators" data-slide-to="2"></li>
		</ol>

		<div class="carousel-inner">
			<div class="carousel-item active">
				<img class="d-block" src="<?php echo base_url('assets/img/bannerzhiyun.png'); ?>" div class="d-flex justify-content-center">
				<div class="carousel-caption d-md-block">
					<h3>Welcome To Styles Bar and Grill</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer felis neque, suscipit eget dolor quis, accumsan imperdiet elit. Praesent quis mauris</p>
				</div>
			</div>
			<div class="carousel-item">
				<img class="d-block" src="<?php echo base_url('assets/img/craneplus.png'); ?>" alt="Second slide">
				<div class="carousel-caption d-md-block">
					<h3>Best Food and Wine Around</h3>
					<p>Nullam at elementum felis, at sodales diam. In a lectus nisl. Maecenas sodales commodo sollicitudin. Sed nisi nisl, laoreet eu erat vel, porttitor scelerisque</p>
				</div>
			</div>
			<div class="carousel-item">
				<img class="d-block" src="<?php echo base_url('assets/img/sonya7ii.png'); ?>">
				<div class="carousel-caption d-md-block">
					<h3>Award Winning and Friendly Service</h3>
					<p>Nam scelerisque molestie cursus. Ut scelerisque turpis iaculis erat feugiat, eget tristique risus luctus. Quisque non est dignissim, rhoncus nisi a, fermentum</p>
				</div>
			</div>
		</div>
		<a class="carousel-control-prev" href="#carouselFull" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselFull" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>


	<section class="features-icons bg-light text-center">
		<div class="container">
			<div class="row">
				<div class="col-lg-4">
					<div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
						<div class="features-icons-icon d-flex"><i class="icon-screen-desktop m-auto text-primary"></i></div>
						<h3>Fully Responsive</h3>
						<p class="lead mb-0">This theme will look great on any device, no matter the size!</p>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
						<div src="<?php echo base_url('assets/img/sonya7ii.png'); ?>"></div>
						<h3>Bootstrap 4 Ready</h3>
						<p class=" lead mb-0">Featuring the latest build of the new Bootstrap 4 framework!</p>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="features-icons-item mx-auto mb-0 mb-lg-3">
						<div class="features-icons-icon d-flex"><i class="icon-check m-auto text-primary"></i></div>
						<h3>Easy to Use</h3>
						<p class="lead mb-0">Ready to use with your own content, or customize the source files!</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

	<!-- Option 2: Separate Popper and Bootstrap JS -->
	<!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->
</body>

</html>