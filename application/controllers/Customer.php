<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('CustomerModel');
        $this->load->model('RoomModel');
        $this->load->library('session');

    }

    public function index(){
        $data['rooms'] = $this->RoomModel->get_available_rooms();
        return $this->load->view('customer/index', $data);
    }

    public function detail($roomID)
    {
        $this->load->model('RoomModel'); 
        $data['room'] = $this->RoomModel->get_room_by_id($roomID); 

        if (!$data['room']) {
            show_404(); // Tampilkan halaman 404 jika room tidak ditemukan
        }

        $this->load->view('customer/detail', $data);
    }

}