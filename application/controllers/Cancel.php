<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cancel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('BookingModel'); // Model untuk tabel bookings
        $this->load->model('CancelModel');  // Model untuk tabel cancels
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view('cancel/cancel');
    }

    public function list()
    {
        $data['user_login'] = $this->session->userdata('username');
        $this->load->model('CancelModel');
        $data['cancelData'] = $this->CancelModel->getCancelWithBooking();
        $this->load->view('cancel/list', $data);
    }

    public function submitCancel()
    {
        $this->form_validation->set_rules('bookingID', 'Booking ID', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('cancel/cancel');
        } else {
            $bookingID = $this->input->post('bookingID');
            $booking = $this->BookingModel->getBookingById($bookingID);

            if (!$booking) {
                $data['error'] = 'Booking ID tidak ditemukan!';
                $this->load->view('cancel/cancel', $data);
            } else {
                $data['booking'] = $booking;
                $this->load->view('cancel/submitCancel', $data);
            }
        }
    }

    public function process()
    {
        $this->form_validation->set_rules('reason', 'Reason', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('cancel/submit');
        } else {
            $data = [
                'bookingID' => $this->input->post('bookingID'),
                'reason' => $this->input->post('reason'),
                'cancelDate' => date('Y-m-d')
            ];

            $this->CancelModel->insertCancel($data);
            $this->session->set_flashdata('message', 'Pengajuan cancel berhasil dikirim.');
            redirect('customer');
        }
    }
}
