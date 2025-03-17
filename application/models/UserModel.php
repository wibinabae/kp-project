<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    // Fungsi untuk mengambil daftar user
    public function getUsers()
    {
        // Ambil data username, password, name, dan role dari tabel 'users'
        $query = $this->db->select('username, name, role')->get('users');
        return $query->result_array();
    }

    public function getUserByUsername($username)
    {
        return $this->db->get_where('users', ['username' => $username])->row_array();
    }

    public function insertUser($data)
    {
        // Menyimpan data user ke dalam tabel 'users'
        return $this->db->insert('users', $data);
    }

    public function updateUser($username, $data)
    {
        $this->db->where('username', $username);
        $this->db->update('users', $data);
    }

}
