<?php
class Skillendrosed_model extends CI_Model
{

function getSkill($id){
    $this->db->select("*");
    $this->db->from("jobseeker_skill");
    $this->db->where('talentid', $id);
    $query = $this->db->get();        
    return $query->result();
}

function insert($data)
 {
  $this->db->insert('jobseeker_user', $data);
  return $this->db->insert_id();
 }

 function verify_email($key)
 {
  $this->db->where('verification_key', $key);
  $this->db->where('is_email_verified', 'no');
  $query = $this->db->get('jobseeker_user');
  if($query->num_rows() > 0)
  {
   $data = array(
    'is_email_verified'  => 'yes'
   );
   $this->db->where('verification_key', $key);
   $this->db->update('jobseeker_user', $data);
   return true;
  }
  else
  {
   return false;
  }
 }
}

?>