<?php
class Paneldashboard_model extends CI_Model
{
 function insert_info($data,$id)
 {
    
    $query = null;
    $query = $this->db->get_where('panel_info', array(//making selection
        'talentid' => $id
    ));
    $count = $query->num_rows();
    if ($count === 0) {
        $this->db->insert('panel_info', $data);
        
    }
    elseif($count === 1){
        
        $this->db->where('talentid',$id);
        $this->db->update('panel_info',$data);
    }
 }

 function insert_exp($data)
 {
  $this->db->insert('panel_exp', $data);
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