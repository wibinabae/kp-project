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
        <form action="<?= site_url('cancel/process'); ?>" method="POST">
            <input type="hidden" name="bookingID" value="<?= htmlspecialchars($booking['bookingID']); ?>">
            <div class="mb-3">
                <label for="reason" class="form-label">Alasan Cancel</label>
                <textarea class="form-control" id="reason" name="reason" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Ajukan Cancel</button>
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
