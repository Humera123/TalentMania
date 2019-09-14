<?php
class Addjob_model extends CI_Model
{
 function insert_info($data,$id)
 {
    $query = null;
    $query = $this->db->get_where('newjob_info', array(//making selection
        'talentid' => $id
    ));
    $count = $query->num_rows();
    if ($count === 0) {

        $this->db->insert('newjob_info', $data);

    }
    elseif($count === 1){
        
        $this->db->where('talentid',$id);
        $this->db->update('newjob_info',$data);

    }

 }
}

?>