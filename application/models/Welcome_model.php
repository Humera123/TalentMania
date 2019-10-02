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
    }
    elseif($count === 1){

        $value=array('pimage'=>$data['pimage'],'first_name'=>$data['first_name'],'last_name'=>$data['last_name'],'father_name'=>$data['father_name'],'date_of_birth'=>$data['date_of_birth'],
        'nationality'=>$data['nationality'],'mobileno'=>$data['mobileno'],'city'=>$data['city'],'country'=>$data['country'],
        'address'=>$data['address'],'skype_id'=>$data['skype_id'],'linkdin_profile'=>$data['linkdin_profile'],'cnic_front'=>$data['cnic_front'],'cnic_back'=> $data['cnic_back'],'last_degree'=> $data['last_degree']);
        
        $this->db->where('talentid',$id);
        $this->db->update('jobseeker_info',$value);
    }
 }

 function insert_exp($data,$id)
 {
    $this->db->insert('jobseeker_exp', $data);
 }

function update_exp($data,$id)
{
    $this->db->where('experience_id', $id);
    $this->db->update('jobseeker_exp', $data);
}

function update_edu($data,$id)
{
    $this->db->where('education_id', $id);
    $this->db->update('jobseeker_edu', $data);
}


function retrieve_exp($id)
{
    $sql  = 'SELECT * ';
    $sql .= ' FROM jobseeker_exp WHERE talentid = ?';
    $sql_params = array($id);
    $query = $this->db->query($sql, $sql_params);
    return $query->result();
}

function retrieve_edu($id)
{
    $sql  = 'SELECT * ';
    $sql .= ' FROM jobseeker_edu WHERE talentid = ?';
    $sql_params = array($id);
    $query = $this->db->query($sql, $sql_params);
    return $query->result();
}

function retreive_one_experience($id)
{
    $sql  = 'SELECT * ';
    $sql .= ' FROM jobseeker_exp WHERE experience_id = ?';
    $sql_params = array($id);
    $query = $this->db->query($sql, $sql_params);
    return $query->result();
}

function retreive_one_education($id)
{
    $sql  = 'SELECT * ';
    $sql .= ' FROM jobseeker_edu WHERE education_id = ?';
    $sql_params = array($id);
    $query = $this->db->query($sql, $sql_params);
    return $query->result();
}

 function insert_edu($data)
 {
     
  $this->db->insert('jobseeker_edu', $data); 
 }

 function insert_skill($data,$id)
 {
    
    foreach($data as $d)
    {
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

  function retrieve_info($id)
  {
    $sql  = 'SELECT pimage,first_name,last_name,father_name,date_of_birth,nationality,mobileno,city,country,address,
          skype_id,linkdin_profile,cnic_front,cnic_back,last_degree';
    $sql .= ' FROM jobseeker_info WHERE talentid = ?';
    $sql_params = array($id);
    $query = $this->db->query($sql, $sql_params);
    $form = $query->row_array();

    $data = array('title' => 'Edit Page', 'form' => $form);
    $this->load->view('welcome', $data);
  
  }

  function delete_exp($id)
  {
    $this->db->query("delete  from jobseeker_exp where experience_id='".$id."'");
  }

  function delete_edu($id)
  {
    $this->db->query("delete  from jobseeker_edu where education_id='".$id."'");
  }

  function assign_skill()
{
    $skill_array = array();
    $this->db->select('*');
    $this->db->from('panel_skill');
    $this->db->join('jobseeker_skill', 'panel_skill.skill_name = jobseeker_skill.skill_name');
    $this->db->where(array('jobseeker_skill.rating' => 0,
                           'panel_skill.emp_assign <' => 3,
                            'jobseeker_skill.author_id' => 0 ));
    
    $query = $this->db->get();
    
    if($query->num_rows() != 0){
       foreach($query->result() as $row){
           
          print_r($row);
           
       }
       
    }

    
}

}

?>