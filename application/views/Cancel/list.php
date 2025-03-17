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
            <h1>List Cancel</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Home</a></li>
                    <li class="breadcrumb-item active">List Cancel</li>
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
                                <h5 class="card-title">Cancel List</h5>
                            </div>
                            <table class="table table-bordered datatable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Cancel ID</th>
                                        <th>Booking ID</th>
                                        <th>Customer Name</th>
                                        <th>Check-In Date</th>
                                        <th>Check-Out Date</th>
                                        <th>Cancel Date</th>
                                        <th>Reason</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($cancelData)): ?>
                                        <?php foreach ($cancelData as $index => $cancel): ?>
                                            <tr>
                                                <td><?= $index + 1; ?></td>
                                                <td><?= htmlspecialchars($cancel['cancelID']); ?></td>
                                                <td><?= htmlspecialchars($cancel['bookingID']); ?></td>
                                                <td><?= htmlspecialchars($cancel['orderBy']); ?></td>
                                                <td><?= htmlspecialchars($cancel['checkIn']); ?></td>
                                                <td><?= htmlspecialchars($cancel['checkOut']); ?></td>
                                                <td><?= htmlspecialchars($cancel['cancelDate']); ?></td>
                                                <td><?= htmlspecialchars($cancel['reason']); ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="7" class="text-center">Tidak ada data pengajuan cancel</td>
                                        </tr>
                                    <?php endif; ?>
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
