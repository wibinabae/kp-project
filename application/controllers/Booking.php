<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Booking extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('BookingModel'); // Buat model ini jika belum ada
    }

    public function form($roomID)
    {
        // Ambil detail room berdasarkan roomID
        $data['room'] = $this->BookingModel->getRoomById($roomID);
        $this->load->view('booking/form', $data);
    }

    public function manage()
    {
        $this->load->model('BookingModel');
        $data['bookings'] = $this->BookingModel->getAllBookings();
        $data['user_login'] = $this->session->userdata('username');
        $this->load->view('booking/manage', $data);
    }
    
    public function approve()
    {
        $bookingID = $this->input->post('bookingID');
        $noWhatsapp = $this->input->post('noWhatsapp');
        $name = $this->input->post('name'); // Nama pemesan
        $roomID = $this->input->post('roomID'); // ID kamar
    
        // Update status di database
        $this->load->model('BookingModel');
        $this->BookingModel->approveBooking($bookingID);

        // Update status room menjadi "Booked"
        $this->BookingModel->updateRoomStatus($roomID);
       
        // Buat tautan WhatsApp
        $message = "Hay $name, Pesanan Booking kamu untuk kamar $roomID sudah ter-Approve. Tunjukan pesan ini untuk melakukan Check In.";
        $whatsappLink = $this->createWhatsappLink($noWhatsapp, $message);
    
        echo json_encode(['status' => 'success', 'whatsappLink' => $whatsappLink]);
    }
    
    private function createWhatsappLink($noWhatsapp, $message)
    {
        if (substr($noWhatsapp, 0, 1) === '0') {
            $noWhatsapp = '62' . substr($noWhatsapp, 1);
        }
    
        $encodedMessage = urlencode($message);
        return "https://wa.me/" . $noWhatsapp . "?text=" . $encodedMessage;
    }
   
    public function save()
    {
        // Ambil data dari form
        $data = [
            'roomID' => $this->input->post('roomID'),
            'orderBy' => $this->input->post('name'),
            'noWhatsapp' => $this->input->post('nowa'),
            'checkIn' => $this->input->post('check_in'),
            'checkOut' => $this->input->post('check_out'),
            'paymentMethod' => $this->input->post('payment_method'),
            'paymentProf' => null,
            'status' => 'Pending',
            'price' => (int) $this->input->post('price'), // Konversi ke integer
            'totalPrice' => (int) $this->input->post('price_total'),
        ];

        // Jika metode pembayaran adalah Transfer dan file bukti pembayaran di-upload
        if ($this->input->post('payment_method') == 'Transfer' && !empty($_FILES['payment_proof']['tmp_name'])) {
            // Tentukan direktori penyimpanan gambar
            $uploadPath = './uploads/payment_proof/';
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);  // Buat folder jika belum ada
            }

            // Konfigurasi upload file
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = 5000; // Maksimum ukuran file 5MB

            // Load library upload
            $this->load->library('upload', $config);

            // Jika file berhasil di-upload
            if ($this->upload->do_upload('payment_proof')) {
                // Ambil nama file yang di-upload
                $data['paymentProf'] = $this->upload->data('file_name');
            } else {
                // Jika gagal, tampilkan error
                $this->session->set_flashdata('message', $this->upload->display_errors());
                redirect('booking/form/' . $data['roomID']);
                return;
            }
        }

        // Simpan data booking ke tabel `bookings`
        $bookingID = $this->BookingModel->saveBooking($data);
        $this->session->set_flashdata('message', 'Booking berhasil disimpan! Booking ID: ' . $bookingID);
        redirect('booking/success/' . $bookingID);
    }
              
    public function success($bookingID)
    {
        // Kirimkan bookingID ke view success
        $data['bookingID'] = $bookingID;

        // Tampilkan halaman success dengan membawa bookingID
        $this->load->view('booking/success', $data);
    }


    public function view_payment_proof($paymentProf)
    {
        // Ambil data gambar dari database
        $this->db->select('paymentProf');
        $this->db->from('bookings');
        $this->db->where('paymentProf', $paymentProf);  // Misal berdasarkan nama file atau ID
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            $data = $query->row_array();
            $imageData = $data['paymentProf']; // Binary data

            // Set header untuk gambar
            header("Content-Type: image/jpeg"); // Sesuaikan dengan jenis gambar (jpeg, png, dll)
            echo $imageData; // Tampilkan gambar
        } else {
            // Tampilkan pesan jika gambar tidak ditemukan
            echo "Gambar tidak ditemukan.";
        }
    }

    
}
