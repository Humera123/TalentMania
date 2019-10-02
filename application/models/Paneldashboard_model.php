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
 function retrieve_info($id)
  {
    $sql  = 'SELECT *';
    $sql .= ' FROM panel_info WHERE talentid = ?';
    $sql_params = array($id);
    $query = $this->db->query($sql, $sql_params);
    $form = $query->row_array();

    $data = array('title' => 'Edit Page', 'form' => $form);
    $this->load->view('Paneldashboard', $data);
  
  }

   function insert_skill($data,$id)
 {
    
    foreach($data as $d)
    {
     $value=array('pskill_name'=>$d,'talentid'=>$id);
     $this->db->insert('panel_skill', $value);
    }
   
 }
  function getExp($id)
 {
    
    $query = null;
    $data = array();
    $data2  = array();
    $query = $this->db->get_where('panel_exp', array(//making selection
        'talentid' => $id
    ));
    $count = $query->num_rows();
    if ($count === 0) {
        return 0;
    }
    elseif($count >= 1)
    {

        foreach($query->result() as $row){
            $data[] = $row->start_month;
            $data2[]  = $row->end_month;
        }
        
        $min_date = min($data);
        $max_date = max($data2);
        $diff = date_diff(date_create($min_date), date_create($max_date));
        if($diff->format('%y') == 0){
            $value = array('experience'=>37);
        }
        else if($diff->format('%m') == 0){
            $value = array('experience'=>0);
        }
        else{
            $value = array('experience'=>$diff->format);
        }
        $this->db->where('talentid',$id);
        $this->db->update('panel_info',$value);
        return 1;
    }
 }
}


?>