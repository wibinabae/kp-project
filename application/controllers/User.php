<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('UserModel');
        $this->load->library('session');
    }

    public function index()
    {
        // Ambil semua data user dari model
        $data['users'] = $this->UserModel->getUsers();

        // Load view untuk menampilkan daftar user
        $this->load->view('user/index', $data);
    }

    public function add()
    {
        if ($this->input->method() == 'post') {
            $username = $this->input->post('username');
            $password = $this->input->post('password'); // Enkripsi password
            $name = $this->input->post('name');

            // Simpan data ke database
            $data = [
                'username' => $username,
                'password' => $password,
                'name' => $name,
                'role' => 'Admin'
            ];

            $isInserted = $this->UserModel->insertUser($data);

            if ($isInserted) {
                $this->session->set_flashdata('message', 'User berhasil ditambahkan!');
                redirect('user/index'); // Redirect ke halaman daftar user setelah berhasil
            } else {
                $this->session->set_flashdata('message', 'Terjadi kesalahan, coba lagi.');
                redirect('user/add');
            }
        } else {
            $this->load->view('user/add');
        }
    }

    public function edit($username)
    {
        $this->load->library('form_validation');
        $this->load->model('UserModel');
    
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            // Atur rules validasi
            $this->form_validation->set_rules('name', 'Nama', 'required');
    
            if ($this->form_validation->run() === TRUE) {
                // Data yang akan diupdate
                $data = [
                    'name' => $this->input->post('name'),
                ];
    
                // Jika password diisi, tambahkan ke array data
                $password = $this->input->post('password');
                if (!empty($password)) {
                    $data['password'] = $password; // Enkripsi password
                }
    
                // Proses update user
                $this->UserModel->updateUser($username, $data);
    
                $this->session->set_flashdata('message', 'User berhasil diperbarui!');
                redirect('user');
            }
        }
    
        // Ambil data user berdasarkan username
        $data['user'] = $this->UserModel->getUserByUsername($username);
    
        if (!$data['user']) {
            show_404();
        }
    
        // Tampilkan view edit user
        $this->load->view('user/edit', $data);
    }
    

}