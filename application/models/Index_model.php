<?php
class Index_model extends CI_Model
{
 function dashboardLoad($id)
 {
    $query = $this->db->get_where('jobseeker_user', array('talentid' => $id));
    foreach ($query->result() as $row)
    {
        return $row->type;
    }
 }

 function getApproval($id){
    $query = $this->db->get_where('jobseeker_info', array('talentid' => $id));
    foreach ($query->result() as $row)
    {
        $data = array(
            'approval'  => $row->approval,
            'hired'  => $row->hired,
           );
        return $data;
    }
 }
}

?>