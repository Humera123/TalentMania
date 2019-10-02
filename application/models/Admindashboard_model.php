<?php
class Admindashboard_model extends CI_Model
{
  function company_retrieve_info()
  {
     $sql  = 'SELECT * ';
    $sql .= ' FROM company_info';
    $query = $this->db->query($sql);
    return $query->result();
  }

  function panel_retrieve_info()
  {
     $sql  = 'SELECT * ';
    $sql .= ' FROM panel_info';
    $query = $this->db->query($sql);
    return $query->result();
  }

  function jobseeker_retrieve_info()
  {
     $sql  = 'SELECT * ';
    $sql .= ' FROM jobseeker_info';
    $query = $this->db->query($sql);
    return $query->result();
  }
}

?>