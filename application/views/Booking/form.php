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
        <h2>Booking Room: <?= $room['roomName']; ?></h2>
        <form method="post" class="row" action="<?= site_url('booking/save'); ?>" enctype="multipart/form-data">
            <input type="hidden" name="roomID" value="<?= $room['roomID']; ?>">
            <div class="col-md-6 mb-3">
                <label for="name" class="form-label">Nama Pemesan</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nama Pemesan" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="wa" class="form-label">No Whatsapp</label>
                <input type="text" class="form-control" id="nowa" name="nowa" placeholder="No Whatsapp" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="check_in" class="form-label">Check-In Date</label>
                <input type="text" class="form-control" id="check_in" name="check_in" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="check_out" class="form-label">Check-Out Date</label>
                <input type="text" class="form-control" id="check_out" name="check_out" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="price" class="form-label">Harga Kamar (Per Hari)</label>
                <input type="text" class="form-control" id="price" name="price" value="<?= $room['price']; ?>" readonly>
            </div>
            <div class="col-md-6 mb-3">
                <label for="price_total" class="form-label">Total Harga</label>
                <input type="text" class="form-control" id="price_total" name="price_total" readonly>
            </div>
            <div class="mb-3">
                <label for="payment_method" class="form-label">Metode Pembayaran</label>
                <select class="form-select" id="payment_method" name="payment_method" required>
                    <option value="">Select Payment Method</option>
                    <option value="Transfer">Transfer</option>
                    <option value="Tunai">Tunai</option>
                </select>
            </div>
            <div class="mb-3 d-none" id="payment_proof_container">
                <label for="payment_proof" class="form-label">Upload Bukti Pembayaran</label>
                <input type="file" class="form-control" id="payment_proof" name="payment_proof" accept="image/*">
            </div>
            <button type="submit" class="btn btn-success">Submit Booking</button>
        </form>

    </div>



    </main>

    <?php $this->load->view('template/footer'); ?>
    <!-- Link ke JS Flatpickr -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script>
        document.getElementById('payment_method').addEventListener('change', function () {
            const proofContainer = document.getElementById('payment_proof_container');
            proofContainer.classList.toggle('d-none', this.value !== 'Transfer');
        });
    </script>

    <script>
        document.getElementById('check_in').addEventListener('change', calculateTotalPrice);
        document.getElementById('check_out').addEventListener('change', calculateTotalPrice);

        function calculateTotalPrice() {
            const checkIn = new Date(document.getElementById('check_in').value);
            const checkOut = new Date(document.getElementById('check_out').value);
            const pricePerDay = parseFloat(document.getElementById('price').value) || 0;

            if (checkIn && checkOut && checkOut > checkIn) {
                const duration = Math.ceil((checkOut - checkIn) / (1000 * 60 * 60 * 24)); 
                const totalPrice = duration * pricePerDay;

                document.getElementById('price_total').value = Math.round(totalPrice); 
            } else {
                document.getElementById('price_total').value = '';
            }
        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const today = new Date().toISOString().split('T')[0];

            // Inisialisasi Flatpickr untuk check-in
            flatpickr("#check_in", {
                minDate: today, // Menonaktifkan tanggal sebelum hari ini
                dateFormat: "Y-m-d", // Format tanggal
                locale: "id" // Menggunakan bahasa Indonesia (opsional)
            });

            // Inisialisasi Flatpickr untuk check-out
            flatpickr("#check_out", {
                minDate: today, // Menonaktifkan tanggal sebelum hari ini
                dateFormat: "Y-m-d", // Format tanggal
                locale: "id", // Menggunakan bahasa Indonesia (opsional)
                onChange: function(selectedDates, dateStr, instance) {
                    // Menyesuaikan tanggal check-out agar tidak lebih awal dari check-in
                    const checkInDate = document.getElementById('check_in').value;
                    if (checkInDate) {
                        instance.set('minDate', checkInDate);
                    }
                }
            });
        });
    </script>

</body>

</html>
