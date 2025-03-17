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
            <h1>List Room</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Home</a></li>
                    <li class="breadcrumb-item active">List Room</li>
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
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="card-title">Room List</h5>
                                <a href="<?= site_url('room/add'); ?>" class="btn btn-primary">
                                    Tambah Room
                                </a>
                            </div>
                            <table class="table table-striped table-bordered datatable">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Room Number</th>
                                        <th>Room Name</th>
                                        <th>Type</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($rooms as $key => $room): ?>
                                        <tr>
                                            <td><?= $key + 1; ?></td>
                                            <td><?= htmlspecialchars($room['roomID']); ?></td>
                                            <td><?= htmlspecialchars($room['roomName']); ?></td>
                                            <td><?= htmlspecialchars($room['roomType']); ?></td>
                                            <td><?= number_format($room['price'], 2); ?></td>
                                            <td><?= htmlspecialchars($room['status']); ?></td>
                                            <td>
                                                <?php if (!empty($room['roomImage'])): ?>
                                                    <img src="data:image/jpeg;base64,<?= base64_encode($room['roomImage']); ?>" alt="Room Image" style="width: 100px; height: auto;">
                                                <?php else: ?>
                                                    <p>No image available</p>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if ($room['status'] === 'Booked'): ?>
                                                    <button class="btn btn-sm btn-info kosongkan-room-btn" data-id="<?= $room['roomID']; ?>">Kosongkan Room</button>
                                                <?php else: ?>
                                                    <a href="<?= site_url('room/edit/' . $room['roomID']); ?>" class="btn btn-sm btn-warning">Edit</a>
                                                    <a href="<?= site_url('room/delete/' . $room['roomID']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete this room?')">Delete</a>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
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
            
            $('.kosongkan-room-btn').on('click', function () {
                const roomID = $(this).data('id');

                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Status room akan diubah menjadi Available!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, kosongkan!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Redirect to controller for updating status
                        window.location.href = `<?= site_url('room/empty/'); ?>${roomID}`;
                    }
                });
            });
        });
    </script>
</body>

</html>
