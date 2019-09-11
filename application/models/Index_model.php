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
}

?>