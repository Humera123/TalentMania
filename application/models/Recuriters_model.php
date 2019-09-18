<?php
class Recuriters_model extends CI_Model
{
 function getJob($id)
 {
    $query = null;
    $query = $this->db->select("*");
    $query = $this->db->from("newjob_info");
    $query = $this->db->where('talentid', $id);
    $query = $this->db->get();

    $count = $query->num_rows();
    if ($count === 0) {
        return 0;
        
    }
    elseif($count === 1){
        
       return $query->result();
    }
 }

 function getrecuriters(){

    $query = null;
    $this->db->select('*');
    $this->db->from('jobseeker_info');
    $this->db->join('newjob_info', 'jobseeker_info.e = cv.owner_id','left');
    $data = $this->db->get();
 }

}

?>