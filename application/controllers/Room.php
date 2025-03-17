<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Room extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('RoomModel');
        $this->load->library('session');

        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login'); // Redirect jika belum login
        }
    }

    public function index(){
        $data['rooms'] = $this->RoomModel->get_all_rooms();
        $data['user_login'] = $this->session->userdata('username');
        $this->load->view('room/index', $data);
    }

    // Menampilkan form tambah room
    public function add()
    {
    $data['rooms'] = $this->RoomModel->get_all_rooms();
    $data['user_login'] = $this->session->userdata('username');
    $this->load->view('room/add_room', $data);
    }

    public function empty($roomID)
    {
        $this->load->model('RoomModel');
    
        // Update room status
        $updated = $this->RoomModel->updateRoomStatus($roomID, 'Available');
    
        if ($updated) {
            $this->session->set_flashdata('message', 'Room berhasil dikosongkan.');
        } else {
            $this->session->set_flashdata('message', 'Gagal mengosongkan room.');
        }
    
        redirect('room'); 
    }
    
    // Menyimpan data room ke database
    public function save()
    {
        if (!empty($_FILES['room_image']['tmp_name'])) {
            $image = file_get_contents($_FILES['room_image']['tmp_name']); // Baca file sebagai binary

            $roomData = [
                'roomID'  => $this->input->post('room_number'),
                'roomName'  => $this->input->post('room_name'),
                'roomType'  => $this->input->post('type'),
                'price'     => $this->input->post('price'),
                'status'    => 'available', // Default status
                'roomImage' => $image,      // Simpan binary image
            ];

            $this->RoomModel->insert_room($roomData);
            $this->session->set_flashdata('message', 'Room added successfully!');
            redirect('room/add');
        } else {
            $this->session->set_flashdata('message', 'Please upload an image!');
            redirect('room/add');
        }
    }

    public function edit($id)
    {
        $data['user_login'] = $this->session->userdata('username');
        $data['room'] = $this->RoomModel->get_room_by_id($id);
        $this->load->view('room/edit', $data);
    }

    public function update()
    {
        $id = $this->input->post('id');
        $image = $_FILES['room_image']['tmp_name'] ? file_get_contents($_FILES['room_image']['tmp_name']) : null;

        $roomData = [
            'roomName' => $this->input->post('room_name'),
            'roomType' => $this->input->post('type'),
            'price' => $this->input->post('price'),
            'status' => $this->input->post('status'),
            'roomDetail' => $this->input->post('room_detail'),
        ];

        if ($image) {
            $roomData['roomImage'] = $image;
        }

        $this->RoomModel->update_room($id, $roomData);
        $this->session->set_flashdata('message', 'Room updated successfully!');
        redirect('room/add');
    }

    public function delete($id)
    {
        $this->RoomModel->delete_room($id);
        $this->session->set_flashdata('message', 'Room deleted successfully!');
        redirect('room');
    }
    
}
