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
    <!-- End Sidebar -->

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Add Room</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Home</a></li>
                    <li class="breadcrumb-item active">Add Room</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <?php if ($this->session->flashdata('message')): ?>
                <div class="alert alert-primary bg-primary text-light border-0 alert-dismissible fade show" role="alert">
                    <?= $this->session->flashdata('message'); ?>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Add New Room</h5>
                            <form class="row" method="post" action="<?= site_url('room/save'); ?>" enctype="multipart/form-data">
                                <div class="col-md-6 mb-3">
                                    <label for="room_number" class="form-label">Room Number</label>
                                    <input type="text" class="form-control" id="room_number" name="room_number" placeholder="Room Number" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="room_name" class="form-label">Room Name</label>
                                    <input type="text" class="form-control" id="room_name" name="room_name" placeholder="Room Number" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="type" class="form-label">Room Type</label>
                                    <input type="text" class="form-control" id="type" name="type" placeholder="Room Type (e.g., Single, Double)" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="price" class="form-label">Price</label>
                                    <input type="number" step="0.01" class="form-control" id="price" name="price" placeholder="Price per Night" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="detail" class="form-label">Detail</label>
                                    <textarea class="form-control" id="room_detail" name="room_detail" rows="4" required></textarea>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="room_image" class="form-label">Room Image</label>
                                    <input type="file" class="form-control" id="room_image" name="room_image" accept="image/*" required>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary w-100">Add Room</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
            </div>
        </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <?php $this->load->view('template/footer') ?>
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <?php $this->load->view('template/scripts') ?>
    <script>
        $(document).ready(function() {
            $('.datatable').DataTable();
        });
    </script>
</body>

</html>
