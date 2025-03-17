<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">
    <li class="nav-heading">Pages</li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="<?= base_url() . 'dashboard' ?>">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="<?= base_url() . 'user' ?>">
        <i class="bi bi-people"></i>
        <span>User</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="<?= base_url() . 'room' ?>">
        <i class="bi bi-houses"></i>
        <span>Room</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="<?= base_url() . 'booking/manage' ?>">
        <i class="bi bi-journals"></i>
        <span>Booking</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="<?= base_url() . 'cancel/list' ?>">
        <i class="bi bi-x-octagon"></i>
        <span>Cancel</span>
      </a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="javascript:void(0);" id="logoutBtn">
            <i class="bi bi-box-arrow-right"></i>
            <span>Logout</span>
        </a>
    </li>
  </ul>

</aside>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Event listener untuk tombol logout
    document.getElementById('logoutBtn').addEventListener('click', function () {
        Swal.fire({
            title: 'Konfirmasi Logout',
            text: "Apakah Anda yakin ingin keluar?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Logout!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Jika konfirmasi berhasil, redirect ke halaman logout
                window.location.href = "<?= base_url('auth/logout'); ?>"; // Ubah sesuai dengan route logout yang ada
            }
        });
    });
</script>
