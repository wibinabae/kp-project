<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RoomModel extends CI_Model
{
    // Menyimpan data room ke database
    public function insert_room($data)
    {
        return $this->db->insert('rooms', $data);
    }

    public function get_all_rooms()
    {
        $query = $this->db->get('rooms'); 
        return $query->result_array();
    }
    
    public function get_available_rooms()
    {
        $query = $this->db->order_by('roomType', 'ASC')
                          ->get('rooms');
        return $query->result_array();
    }
    


    public function get_room_by_id($id)
    {
        return $this->db->get_where('rooms', ['roomID' => $id])->row_array();
    }
    
    public function update_room($id, $data)
    {
        $this->db->where('roomID', $id);
        $this->db->update('rooms', $data);
    }
    
    public function delete_room($id)
    {
        $this->db->where('roomID', $id);
        $this->db->delete('rooms');
    }
    
    public function updateRoomStatus($roomID, $status)
    {
        $this->db->where('roomID', $roomID);
        return $this->db->update('rooms', ['status' => $status]);
    }

    //Dashboard
    public function get_total_rooms()
    {
        return $this->db->count_all('rooms'); // Total semua room
    }

    public function get_rooms_by_status($status)
    {
        $this->db->where('status', $status);
        return $this->db->count_all_results('rooms'); // Total room berdasarkan status
    }


}
