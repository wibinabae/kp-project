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
            <h1>Edit User</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('user'); ?>">User</a></li>
                    <li class="breadcrumb-item active">Edit User</li>
                </ol>
            </nav>
        </div>
        <section class="section">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Edit User</h5>
                            <form action="<?= base_url('user/edit/' . $user['username']); ?>" method="POST">
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" value="<?= $user['username']; ?>" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="name" name="name" value="<?= $user['name']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password (Kosongkan jika tidak ingin mengubah)</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="<?= base_url('user/index'); ?>" class="btn btn-secondary">Kembali</a>
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
