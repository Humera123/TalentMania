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

 function getrecuriters($data){

    $query = null;
    $query2 = null;
    $query3 = null;
    $talentid = array();
    $talentid2 = array();
    $talentid3 = array();
    $query = $this->db->select('talentid,experience,approval,gender');
    $query = $this->db->from('jobseeker_info');
    $query = $this->db->where(array(//making selection
      'experience >=' => $data['exp'],
      'gender' => $data['gender'],
      'approval >' => '0',
      'hired' => '0',
    ));
   $query =  $this->db->get();
   if($query->num_rows() > 0){
      foreach($query->result() as $row){
         $talentid[] = $row->talentid;
      }
      $query2 = $this->db->select('talentid');
      $query2 = $this->db->from("jobseeker_edu");
      $query2 = $this->db->where('degree_name', $data['edu']);
      $query2 = $this->db->where_in('talentid', $talentid);

      $query2 =  $this->db->get();
      if($query2->num_rows() > 0){
         foreach($query2->result() as $row){
            $talentid2[] = $row->talentid;
         }
         $talentid2 = array_unique($talentid2);
         $skill_req = json_decode($data['skills']);
         $query3 = $this->db->select('talentid');
         $query3 = $this->db->from("jobseeker_skill");
         $query3 = $this->db->where_in('skill_name', $skill_req );
         $query3 = $this->db->where_in('talentid', $talentid2);
         $query3 =  $this->db->get();
        
         if($query3->num_rows() > 0){
            foreach($query3->result() as $row){
               $talentid3[] = $row->talentid;
            }
            $talentid3 = array_unique($talentid3);
            
            return $talentid3;
         }
         else{
            return "No record found";
         }
      }
      else{
         return "No record found";
      }

   }  
   else{
      return "No record found";
   }

 }

 function getRecuritersName($data){
   $query = null;
   $talent = array();
    $query = $this->db->select("*");
    $query = $this->db->from("jobseeker_info");
    $query = $this->db->where_in('talentid', $data);
    $query = $this->db->get();

    $count = $query->num_rows();
    if ($count === 0) {
        return 0;
        
    }
    elseif($count >= 1){
        
      foreach($query->result() as $row){
         $talent[$row->talentid] = $row->first_name;
      }
      return $talent;
    }
 }

}

?>