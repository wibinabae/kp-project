<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('template/head') ?>
</head>

<body>
    <?php $this->load->view('template/header') ?>
    <?php $this->load->view('template/sidebar') ?>

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Edit Room</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('room'); ?>">Rooms</a></li>
                    <li class="breadcrumb-item active">Edit Room</li>
                </ol>
            </nav>
        </div>
        <section class="section">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Edit Room</h5>
                            <form class="row" method="post" action="<?= site_url('room/update'); ?>" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?= $room['roomID']; ?>">
                                <div class="col-md-6 mb-3">
                                    <label for="room_name" class="form-label">Room Name</label>
                                    <input type="text" class="form-control" id="room_name" name="room_name" value="<?= $room['roomName']; ?>" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="type" class="form-label">Room Type</label>
                                    <input type="text" class="form-control" id="type" name="type" value="<?= $room['roomType']; ?>" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="price" class="form-label">Price</label>
                                    <input type="number" step="0.01" class="form-control" id="price" name="price" value="<?= $room['price']; ?>" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-select" id="status" name="status" required>
                                        <option value="available" <?= $room['status'] == 'available' ? 'selected' : ''; ?>>Available</option>
                                        <option value="Booked" <?= $room['status'] == 'Booked' ? 'selected' : ''; ?>>Booked</option>
                                    </select>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="status" class="form-label">Detail</label>
                                    <textarea class="form-control" id="room_detail" name="room_detail" rows="4" required><?= $room['roomDetail']; ?></textarea>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="room_image" class="form-label">Room Image (Optional)</label>
                                    <input type="file" class="form-control" id="room_image" name="room_image" accept="image/*">
                                </div>
                                <button type="submit" class="btn btn-primary">Update Room</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php $this->load->view('template/footer') ?>
</body>

</html>
