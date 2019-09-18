<?php
class Welcome_model extends CI_Model
{
 function insert_info($data,$id)
 {
    
    $query = null;
    $query = $this->db->get_where('jobseeker_info', array(//making selection
        'talentid' => $id
    ));
    $count = $query->num_rows();
    if ($count === 0) {
        $this->db->insert('jobseeker_info', $data);
        return $this->db->insert_id();
    }
    elseif($count === 1){

        $value=array('first_name'=>$data['first_name'],'last_name'=>$data['last_name'],'father_name'=>$data['father_name'],'date_of_birth'=>$data['date_of_birth'],
        'nationality'=>$data['nationality'],'mobileno'=>$data['mobileno'],'city'=>$data['city'],'country'=>$data['country'],
        'address'=>$data['address'],'skype_id'=>$data['skype_id'],'linkdin_profile'=>$data['linkdin_profile']);
        
        $this->db->where('talentid',$id);
        $this->db->update('jobseeker_info',$value);
    }
 }

 function insert_exp($data)
 {
  $this->db->insert('jobseeker_exp', $data);
 }

 function insert_edu($data)
 {
     
  $this->db->insert('jobseeker_edu', $data); 
 }

 function insert_skill($data,$id)
 {
    
    foreach($data as $d){
     $value=array('skill_name'=>$d,'talentid'=>$id);
     $this->db->insert('jobseeker_skill', $value);
   }
   
 }

 function getExp($id)
 {
    
    $query = null;
    $data = array();
    $data2  = array();
    $query = $this->db->get_where('jobseeker_exp', array(//making selection
        'talentid' => $id
    ));
    $count = $query->num_rows();
    if ($count === 0) {
        return 0;
    }
    elseif($count >= 1){

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
        $this->db->update('jobseeker_info',$value);
        return 1;
    }
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