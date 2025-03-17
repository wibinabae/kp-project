<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BookingModel extends CI_Model
{
    public function getRoomById($roomID)
    {
        return $this->db->get_where('rooms', ['roomID' => $roomID])->row_array();
    }

    public function saveBooking($data)
    {
        $this->db->insert('bookings', $data);
        return $this->db->insert_id();
    }

    public function updateRoomStatus($roomID)
    {
        $this->db->where('roomID', $roomID);
        $this->db->update('rooms', ['status' => 'Booked']);
    }

    public function getAllBookings()
    {
        $this->db->select('bookingID, roomID, orderBy, noWhatsapp, checkIn, checkOut, paymentMethod, paymentProf, status, price, totalPrice');
        $this->db->from('bookings');
        return $this->db->get()->result_array();
    }
    
    public function approveBooking($bookingID)
    {
        $this->db->where('bookingID', $bookingID);
        $this->db->update('bookings', ['status' => 'Approved']);
    }
    
    public function getBookingById($bookingID)
    {
        return $this->db->get_where('bookings', ['bookingID' => $bookingID])->row_array();
    }

    //Dashboard
    public function get_total_bookings_month()
    {
        $this->db->where('MONTH(checkIn)', date('m'));
        $this->db->where('YEAR(checkIn)', date('Y'));
        return $this->db->count_all_results('bookings'); // Total booking bulan ini
    }

}
