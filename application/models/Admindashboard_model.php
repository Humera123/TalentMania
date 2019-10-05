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

  function jobseeker_data_filter($search_value,$field_name)
  {
      $sql = "SELECT * FROM jobseeker_info WHERE ".$field_name."='".$search_value."'";
      $query=$this->db->query($sql);
      return $query->result();
  }

  function panel_data_filter($search_value,$field_name)
  {
      $sql = "SELECT * FROM panel_info WHERE ".$field_name."='".$search_value."'";
      $query=$this->db->query($sql);
      return $query->result();
  }

  function company_data_filter($search_value,$field_name)
  {
      $sql = "SELECT * FROM company_info WHERE ".$field_name."='".$search_value."'";
      $query=$this->db->query($sql);
      return $query->result();
  }

  function retreive_company_jobs($id)
  {
    $sql  = 'SELECT * ';
    $sql .= ' FROM newjob_info WHERE company_no = ?';
    $sql_params = array($id);
    $query = $this->db->query($sql, $sql_params);
    return $query->result();
  }

  function company_job_filter($search_value,$field_name)
  {
      $sql = "SELECT * FROM newjob_info WHERE ".$field_name."='".$search_value."'";
      $query=$this->db->query($sql);
      return $query->result();
  }
  
}

?>