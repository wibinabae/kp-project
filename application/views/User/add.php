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
                            <h5 class="card-title">Tambah User</h5>
                            <form action="<?= base_url('user/add'); ?>" method="POST">
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Tambah User</button>
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
