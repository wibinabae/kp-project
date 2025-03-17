<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('template/head') ?>
</head>

<body>

    <!-- ======= Header ======= -->
    <?php $this->load->view('template/header') ?>
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <?php $this->load->view('template/sidebar') ?>
    <!-- End Sidebar-->

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
            <div class="row">
            <div class="col-md-3">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body">
                        <h5 class="card-title text-white">Total Room</h5>
                        <p class="card-text"><?= $total_rooms; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body">
                        <h5 class="card-title text-white">Available Rooms</h5>
                        <p class="card-text"><?= $available_rooms; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-info mb-3">
                    <div class="card-body">
                        <h5 class="card-title text-white">Booked Rooms</h5>
                        <p class="card-text"><?= $booked_rooms; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-danger mb-3">
                    <div class="card-body">
                        <h5 class="card-title text-white">Bookings This Month</h5>
                        <p class="card-text"><?= $total_bookings_month; ?></p>
                    </div>
                </div>
            </div>
        </div>
            </div>
        </section>

    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="<?= base_url() . 'assets/vendor/apexcharts/apexcharts.min.js'; ?>"></script>
    <script src="<?= base_url() . 'assets/vendor/bootstrap/js/bootstrap.bundle.min.js'; ?>"></script>
    <script src="<?= base_url() . 'assets/vendor/chart.js/chart.umd.js'; ?>"></script>
    <script src="<?= base_url() . 'assets/vendor/echarts/echarts.min.js'; ?>"></script>
    <script src="<?= base_url() . 'assets/vendor/quill/quill.js'; ?>"></script>
    <script src="<?= base_url() . 'assets/vendor/simple-datatables/simple-datatables.js'; ?>"></script>
    <script src="<?= base_url() . 'assets/vendor/tinymce/tinymce.min.js'; ?>"></script>
    <script src="<?= base_url() . 'assets/vendor/php-email-form/validate.js'; ?>"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>