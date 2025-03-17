<!DOCTYPE html>
<html lang="en">

<head>
    <title>Room Detail</title>
    <?php $this->load->view('template/head'); ?>
    <!-- Link ke CSS Flatpickr -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <!-- Link ke CSS Flatpickr Theme (Opsional) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/material_blue.css">

</head>

<body>
    <main id="main" class="main">
        <div class="container mt-5">
            <h1>Pengajuan Cancel</h1>
            <?php if (!empty($error)): ?>
                <div class="alert alert-danger"><?= $error; ?></div>
            <?php endif; ?>
            <form action="<?= site_url('cancel/submitCancel'); ?>" method="POST">
                <div class="mb-3">
                    <label for="bookingID" class="form-label">Booking ID</label>
                    <input type="text" class="form-control" id="bookingID" name="bookingID" required>
                </div>
                <button type="submit" class="btn btn-primary">Cari Booking</button>
            </form>
        </div>

    </main>

    <?php $this->load->view('template/footer'); ?>
    <!-- Link ke JS Flatpickr -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

</body>

</html>
