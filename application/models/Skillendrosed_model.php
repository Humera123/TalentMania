<?php
class Skillendrosed_model extends CI_Model
{

function getSkill($id)
{
  $query='';
  $sql  = 'SELECT *';
    $sql .= ' FROM jobseeker_skill where panelid=?';
    $sql_params = array($id);
    $query = $this->db->query($sql, $sql_params);
  return      $query->result();
    
}

function insert_rating($skillid,$rating)
{
  $this->db->set('rating', $rating);
  $this->db->where('skillid',$skillid);
  $this->db->update('jobseeker_skill');
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