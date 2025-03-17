<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('template/head') ?>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">

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
        <div class="container mt-5">
            <table id="bookingTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID Booking</th>
                        <th>ID Kamar</th>
                        <th>Pemesan</th>
                        <th>No Whatsapp</th>
                        <th>Check-In</th>
                        <th>Check-Out</th>
                        <th>Harga Permalam</th>
                        <th>Total Harga</th>
                        <th>Metode Pembayaran</th>
                        <th>Bukti Pembayaran</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($bookings as $booking) : ?>
                        <tr>
                            <td><?= $booking['bookingID']; ?></td>
                            <td><?= $booking['roomID']; ?></td>
                            <td><?= $booking['orderBy']; ?></td>
                            <td><?= $booking['noWhatsapp']; ?></td>
                            <td><?= $booking['checkIn']; ?></td>
                            <td><?= $booking['checkOut']; ?></td>
                            <td><?= 'Rp' . number_format($booking['price'], 0, ',', '.'); ?></td>
                            <td><?= 'Rp' . number_format($booking['totalPrice'], 0, ',', '.'); ?></td>
                            <td><?= $booking['paymentMethod']; ?></td>
                            <td>
                            <?php if ($booking['paymentProf']) : ?>
                                    <a href="<?= base_url('uploads/payment_proof/' . $booking['paymentProf']); ?>" target="_blank">Lihat Bukti Pembayaran</a>
                                <?php else : ?>
                                    Tidak ada bukti pembayaran
                                <?php endif; ?>


                            </td>
                            <td><?= $booking['status']; ?></td>
                            <td>
                                <?php if ($booking['status'] === 'Pending') : ?>
                                    <button 
                                        class="btn btn-success approve-btn" 
                                        data-id="<?= $booking['bookingID']; ?>" 
                                        data-wa="<?= $booking['noWhatsapp']; ?>" 
                                        data-name="<?= $booking['orderBy']; ?>" 
                                        data-room="<?= $booking['roomID']; ?>">
                                        Approve
                                    </button>

                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        </section>
    </main>

    <?php $this->load->view('template/footer') ?>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>


    <script>
        $(document).ready(function () {
            $('#bookingTable').DataTable({
                scrollX: true,
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'excelHtml5',
                        title: 'Data Booking',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 10] // Kolom yang ingin diekspor ke Excel
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        title: 'Data Booking',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 10] // Kolom yang ingin diekspor ke PDF
                        },
                        orientation: 'landscape', 
                        pageSize: 'A4', 
                        customize: function (doc) {
                            doc.content[1].table.widths = ['10%', '10%', '10%', '10%', '10%', '10%', '10%', '10%', '10%', '10%']; // Lebar relatif untuk kolom
                            doc.styles.tableBodyEven = { alignment: 'center' }; // Baris genap
                            doc.styles.tableBodyOdd = { alignment: 'center' }; // Baris ganjil
                            doc.styles.tableHeader = { alignment: 'center', bold: true, fillColor: '#000080', color: 'white' }; // Header tabel
                        }
                    }
                ]
            });
        });

    </script>

    <!-- Tambahkan SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).on('click', '.approve-btn', function () {
            const bookingID = $(this).data('id');
            const noWhatsapp = $(this).data('wa');
            const name = $(this).data('name'); // Ambil nama dari atribut data
            const roomID = $(this).data('room'); // Ambil ID kamar dari atribut data

            Swal.fire({
                title: 'Konfirmasi',
                text: "Apakah Anda yakin ingin meng-approve booking ini?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Approve!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "<?= site_url('booking/approve'); ?>",
                        method: "POST",
                        data: { 
                            bookingID: bookingID, 
                            noWhatsapp: noWhatsapp, 
                            name: name, 
                            roomID: roomID 
                        },
                        success: function (response) {
                            const data = JSON.parse(response);
                            Swal.fire({
                                title: 'Approved!',
                                text: 'Booking telah di-approve. Klik OK untuk mengirim pesan WhatsApp.',
                                icon: 'success'
                            }).then(() => {
                                window.open(data.whatsappLink, '_blank');
                                location.reload();
                            });
                        },
                        error: function () {
                            Swal.fire(
                                'Error!',
                                'Terjadi kesalahan. Silakan coba lagi.',
                                'error'
                            );
                        }
                    });
                }
            });
        });
    </script>
    
</body>

</html>
