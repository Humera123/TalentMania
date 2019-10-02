<?php
class Profile_model extends CI_Model
{
 function getProfile($id)
 {
    
    $query = null;
    $query = $this->db->get_where('jobseeker_info', array(//making selection
        'talentid' => $id
    ));
    
    if($query->num_rows()){
        return $query->result();
    }
    else{
        return "no result found";
    }
 }

 function getEdu($id)
 {
    
    $query = null;
    $query = $this->db->get_where('jobseeker_edu', array(//making selection
        'talentid' => $id
    ));
    
    if($query->num_rows()){
        return $query->result();
    }
    else{
        return "no result found";
    }
 }

 function getExp($id)
 {
    
    $query = null;
    $query = $this->db->get_where('jobseeker_exp', array(//making selection
        'talentid' => $id
    ));
    
    if($query->num_rows()){
        return $query->result();
    }
    else{
        return "no result found";
    }
 }

 function getHire($id,$jobid){
    $query = null;
    
    $hired_array = array();
    $value = array('hired'=> '1');
    $this->db->where('talentid',$id);
    $this->db->update('jobseeker_info',$value);
    $query = $this->db->get_where('newjob_info', array(//making selection
        'jobid' => $jobid
    ));
    if($query->num_rows()){
        foreach ($query->result() as $row){
            $json_hired = $row->hired_emp;
            
        }
        if ( $json_hired == null){
            
            $hired_array[] = $id;
            $json = json_encode($hired_array);
        }
        else{
           $hired_array = json_decode($json_hired);
           $addHire = array_push($hired_array, $id);
           $json = json_encode($addHire);
        }
        $value2 = array('hired_emp'=> $json);
        $this->db->where('jobid',$jobid);
        $this->db->update('newjob_info',$value2);
    }
    
    

 }


}

?>