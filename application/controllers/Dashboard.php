<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('RoomModel');
        $this->load->model('BookingModel');
    }

    public function index()
    {
        $data['user_login'] = $this->session->userdata('username');
        $data['total_rooms'] = $this->RoomModel->get_total_rooms();
        $data['available_rooms'] = $this->RoomModel->get_rooms_by_status('Available');
        $data['booked_rooms'] = $this->RoomModel->get_rooms_by_status('Booked');
        $data['total_bookings_month'] = $this->BookingModel->get_total_bookings_month();

        $this->load->view('dashboard', $data);
    }
}
