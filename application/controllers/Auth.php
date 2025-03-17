<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('AuthModel');
        $this->load->library('session');
    }

    public function login()
    {
        $this->load->view('auth/login');
    }

    public function do_login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        // Validasi input
        if (empty($username) || empty($password)) {
            $this->session->set_flashdata('message', 'Username dan Password harus diisi.');
            redirect('auth/login');
        }

        // Cek kredensial
        $user = $this->AuthModel->get_user($username, $password);
        if ($user) {
            // Set session data
            $session_data = array(
                'username' => $user->username,
                'logged_in' => TRUE
            );
            $this->session->set_userdata($session_data);

            redirect('booking/manage'); // Ganti dengan halaman dashboard setelah login
        } else {
            $this->session->set_flashdata('message', 'Username atau Password salah.');
            redirect('auth/login');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        $this->session->set_flashdata('message', 'Anda telah berhasil logout.');
        redirect('/');
    }
}
