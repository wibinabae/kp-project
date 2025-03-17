<!DOCTYPE html>
<html lang="en">

<head>
    <title>Room Detail</title>
    <?php $this->load->view('template/head'); ?>
</head>

<body>

    <main id="main" class="main">
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-6">
                    <img src="data:image/jpeg;base64,<?= base64_encode($room['roomImage']); ?>" alt="Room Image" class="img-fluid rounded">
                </div>
                <div class="col-md-6">
                    <h1><?= htmlspecialchars($room['roomName']); ?></h1>
                    <p><strong>Type:</strong> <?= htmlspecialchars($room['roomType']); ?></p>
                    <p><strong>Price:</strong> Rp <?= number_format($room['price'], 2); ?></p>
                    <p><strong>Status:</strong> <?= htmlspecialchars($room['status']); ?></p>
                    <p><strong>Fasilitas:</strong> <?= htmlspecialchars($room['roomDetail']); ?></p>
                    <a href="<?= site_url('customer'); ?>" class="btn btn-secondary">Back to Rooms</a>
                    <?php if ($room['status'] === 'Booked') : ?>
                        <button class="btn btn-primary" disabled>Booked</button>
                    <?php else : ?>
                        <button class="btn btn-primary" onclick="location.href='<?= site_url('booking/form/' . $room['roomID']); ?>'">Booking Now</button>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </main>

    <?php $this->load->view('template/footer'); ?>
</body>

</html>
