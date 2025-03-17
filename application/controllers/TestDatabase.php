<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TestDatabase extends CI_Controller
{
    public function index()
    {
        // Load library database CodeIgniter
        $this->load->database();

        // Lakukan tes koneksi
        if ($this->db->conn_id) {
            echo "Koneksi ke database berhasil!";
        } else {
            echo "Koneksi ke database gagal.";
        }
    }
}
