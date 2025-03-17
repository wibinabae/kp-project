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

	<body>
        <div class="container mt-5 text-center">
			<h1>Booking Berhasil!</h1>
			<p>Kamar Anda telah dipesan. Terima kasih telah menggunakan layanan kami.</p>
			<h3>ID Booking kamu <b><?= htmlspecialchars($bookingID); ?></b></h3>
			<a href="<?= site_url('customer'); ?>" class="btn btn-primary">Kembali ke Halaman Utama</a>
		</div>

        <script src="<?= base_url() .'customer_assets/js/bootstrap.bundle.min.js'?>"></script>
		<script src="<?= base_url() .'customer_assets/js/tiny-slider.js'?>"></script>
		<script src="<?= base_url() .'customer_assets/js/custom.js'?>"></script>
	</body>

</html>
