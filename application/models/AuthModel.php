<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AuthModel extends CI_Model
{
    public function get_user($username, $password)
    {
        $this->db->where('username', $username);
        $this->db->where('password', $password); 
        return $this->db->get('users')->row();
    }
}
