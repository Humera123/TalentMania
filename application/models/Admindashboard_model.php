<?php
class Admindashboard_model extends CI_Model
{
  function company_retrieve_info()
  {
     $sql  = 'SELECT * ';
    $sql .= ' FROM company_info';
    $query = $this->db->query($sql);
    return $query->result();
  }

  function panel_retrieve_info()
  {
     $sql = "select * ,(select GROUP_CONCAT(pskill_name,' ') from panel_skill where panel_skill.talent_id=panel_info.talentid) as skills, (select GROUP_CONCAT(job_title,' ') from panel_exp where panel_exp.talentid=panel_info.talentid) as exp,(select GROUP_CONCAT(degree_name,' ') from panel_edu where panel_edu.talentid=panel_info.talentid) as edu from  panel_info ";
    
    $query = $this->db->query($sql);
    return $query->result();
  }

  function jobseeker_retrieve_info()
  {
    $sql="select *,(select GROUP_CONCAT(skill_name,' ') from jobseeker_skill where jobseeker_skill.talentid=jobseeker_info.talentid) as skills,(select GROUP_CONCAT(job_title,' ') from jobseeker_exp where jobseeker_exp.talentid=jobseeker_info.talentid) as exp,(select GROUP_CONCAT(degree_name,' ') from jobseeker_edu where jobseeker_edu.talentid=jobseeker_info.talentid) as edu FROM jobseeker_info";
    
    $query = $this->db->query($sql);
    return $query->result();
  }

  function jobseeker_data_filter($search_value,$field_name)
  {
    if($field_name=="skill_name")
    {
        $sql="select *,(select GROUP_CONCAT(skill_name,' ') from jobseeker_skill where  skill_name='".$search_value."') as skills
          FROM jobseeker_info where  talentid=(SELECT talentid FROM jobseeker_skill where skill_name='".$search_value."')";
        $query=$this->db->query($sql);
        return $query->result();
    }
    else 
    {
      $sql = "select * ,(select GROUP_CONCAT(skill_name,' ') from jobseeker_skill where jobseeker_skill.talentid=jobseeker_info.talentid) as skills from  jobseeker_info WHERE ".$field_name."='".$search_value."'";
      $query=$this->db->query($sql);
      return $query->result();
    }
      
  }

  function panel_data_filter($search_value,$field_name)
  {
    if($field_name=="pskill_name")
    {
        $sql="select *,(select GROUP_CONCAT(pskill_name,' ') from panel_skill where  pskill_name='".$search_value."') as skills
          FROM panel_info where  talentid=(SELECT talent_id FROM panel_skill where pskill_name='".$search_value."')";
        $query=$this->db->query($sql);
        return $query->result();
    }
    else 
    {
      $sql = "select * ,(select GROUP_CONCAT(pskill_name,' ') from panel_skill where panel_skill.talent_id=panel_info.talentid) as skills from  panel_info WHERE ".$field_name."='".$search_value."'";
      $query=$this->db->query($sql);
      return $query->result();
    }
  }

  function company_data_filter($search_value,$field_name)
  {
      $sql = "SELECT * FROM company_info WHERE ".$field_name."='".$search_value."'";
      $query=$this->db->query($sql);
      return $query->result();
  }

  function retreive_company_jobs($id)
  {
    $sql  = 'SELECT * ';
    $sql .= ' FROM newjob_info WHERE company_no = ?';
    $sql_params = array($id);
    $query = $this->db->query($sql, $sql_params);
    return $query->result();
  }

  function company_job_filter($search_value,$field_name)
  {
      $sql = "SELECT * FROM newjob_info WHERE ".$field_name."='".$search_value."'";
      $query=$this->db->query($sql);
      return $query->result();
  }
  
}

?>