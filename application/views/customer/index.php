<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="favicon.png">

  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap4" />

		<!-- Bootstrap CSS -->
		<link href="<?= base_url() .'customer_assets/css/bootstrap.min.css'?>" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
		<link href="<?= base_url() .'customer_assets/css/tiny-slider.css'?>" rel="stylesheet">
		<link href="<?= base_url() .'customer_assets/css/style.css'?>" rel="stylesheet">
		<title>Room Booking </title>
	</head>

		<!-- Start Header/Navigation -->
		<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

			<div class="container">
				<a class="navbar-brand" href="index.html">Booking Room<span>.</span></a>

				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarsFurni">
					<ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
						<li class="nav-item ">
							<a class="nav-link" href="<?= base_url().'cancel/index'?>">Pengajuan Cancel</a>
						</li>
						<li class="nav-item ">
							<a class="nav-link" href="<?= base_url().'auth/login'?>">Login</a>
						</li>
						
					</ul>
				</div>
			</div>
				
		</nav>
		<!-- End Header/Navigation -->
		
		<!-- Start Hero Section -->
			<div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>Modern Interior <span clsas="d-block">Design Studio</span></h1>
								<p class="mb-4">Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique.</p>
								<p><a href="" class="btn btn-secondary me-2">Booking Now</a><a href="#" class="btn btn-white-outline">Explore</a></p>
							</div>
						</div>
						<div class="col-lg-7">
							<div class="hero-img-wrap">
								<img src="customer_assets/images/couch.png" class="img-fluid">
							</div>
						</div>
					</div>
				</div>
			</div>
		<!-- End Hero Section -->

		<!-- Start Blog Section -->
		<div class="blog-section">
			<div class="container">
				<div class="row mb-5">
					<div class="col-md-6">
						<h2 class="section-title">Kamar Tersedia</h2>
					</div>
					
				</div>

				<div class="row">
					<?php foreach ($rooms as $room): ?>
					<div class="col-12 col-sm-6 col-md-4 mb-4 mb-md-0">
						<div class="post-entry">
							<!-- Gambar Room -->
							<a href="#" class="post-thumbnail">
								<img src="data:image/jpeg;base64,<?= base64_encode($room['roomImage']); ?>" alt="Room Image" class="img-fluid" style="max-width: 300px; height: auto;">
							</a>
							<div class="post-content-entry">
								<!-- Nama Room -->
								<h3><a href="#"><?= htmlspecialchars($room['roomName']); ?></a></h3>
								<!-- Informasi Tambahan -->
								<div class="meta">
									<span>Type: <?= htmlspecialchars($room['roomType']); ?></span> <br>
									<span>Price: Rp <?= number_format($room['price'], 2); ?></span>
								</div>
							</div>
							<a href="<?= site_url('customer/detail/' . $room['roomID']); ?>" class="btn btn-secondary mt-3">Detail</a>

						</div>
					</div>
					<?php endforeach; ?>
				</div>

			</div>
		</div>
		<!-- End Blog Section -->	

		<!-- Start Footer Section -->
		<footer class="footer-section">
			<div class="container relative">

				<div class="sofa-img">
					<img src="customer_assets/images/sofa.png" alt="Image" class="img-fluid">
				</div>

				<div class="border-top copyright">
					<div class="row pt-4">
						<div class="col-lg-6">
							<p class="mb-2 text-center text-lg-start">Copyright &copy;<script>document.write(new Date().getFullYear());</script>. All Rights Reserved. &mdash; Designed with love Distributed By <a href="">Team KP UNIKU</a>  <!-- License information: https://untree.co/license/ -->
            </p>
						</div>

						
					</div>
				</div>

			</div>
		</footer>
		<!-- End Footer Section -->	

        <script src="<?= base_url() .'customer_assets/js/bootstrap.bundle.min.js'?>"></script>
		<script src="<?= base_url() .'customer_assets/js/tiny-slider.js'?>"></script>
		<script src="<?= base_url() .'customer_assets/js/custom.js'?>"></script>
	</body>

</html>

