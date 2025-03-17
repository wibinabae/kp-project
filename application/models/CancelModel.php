<?php
class CancelModel extends CI_Model
{
    public function insertCancel($data)
    {
        $this->db->insert('cancels', $data);
    }

    public function getCancelWithBooking()
    {
        $this->db->select('cancels.cancelID, cancels.bookingID, cancels.reason, cancels.cancelDate, bookings.orderBy, bookings.checkIn, bookings.checkOut');
        $this->db->from('cancels');
        $this->db->join('bookings', 'cancels.bookingID = bookings.bookingID');
        return $this->db->get()->result_array();
    }

}
