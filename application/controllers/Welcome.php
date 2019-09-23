<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	/*public function index()
	{
		$this->load->view('welcome_message');
	}*/

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('id'))
		{
			redirect('login');
		}
		$this->load->library('form_validation');
		$this->load->helper(array('form', 'url'));
		$this->load->library('encryptioncustom');
		$this->load->model('welcome_model');
	}

	function index()
	{
		$this->load->view('templates/header');
		if($this->session->userdata('id'))
		{
			$id=$this->session->userdata('id');
			$this->welcome_model->retrieve_info($id);
		}
		else 
		{
			$this->load->view('welcome');
		}
		$this->load->view('templates/footer');
	}

	function experience()
	{
		$id=$this->session->userdata('id');
		$result['data']=$this->welcome_model->retrieve_exp($id);
		$result['exp']=null;
		$this->form_validation->unset_field_data();
		$this->load->view('experience',$result); 
		
	}

	function education()
	{
		
		$id=$this->session->userdata('id');
		$result['data']=$this->welcome_model->retrieve_edu($id);
		$result['exp']=null;
		$this->form_validation->unset_field_data();
		$this->load->view('experience',$result); 
		
	}

	function skill(){
		
		$this->load->view('skill');
		
	}

	function validation()
	{
//		$response = array();
		$this->form_validation->set_rules('first_name', 'First Name', 'required|alpha_numeric_spaces');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required|alpha_numeric_spaces');
		$this->form_validation->set_rules('father_name', 'Father Name', 'required|alpha_numeric_spaces');
		$this->form_validation->set_rules('date_of_birth', 'Date of Birth', 'required');
		$this->form_validation->set_rules('nationality', 'Nationality', 'required|alpha_numeric_spaces');
		$this->form_validation->set_rules('mobileno', 'Mobile no', 'required|callback_validate_mobileno');
		$this->form_validation->set_rules('address', 'Address', 'required|callback_validate_address');
		$this->form_validation->set_rules('city', 'City', 'required|alpha');
		$this->form_validation->set_rules('country', 'Country', 'required|alpha');
		$this->form_validation->set_rules('skype_id', 'Skype Id', 'required|alpha_numeric');
		$this->form_validation->set_rules('linkdin_profile', 'Linkdin Profile', 'required|alpha_numeric');
		$this->form_validation->set_rules('gender', 'Gender', 'required');
		/*$this->form_validation->set_rules('cnic_front', 'CNIC front', 'required');
		$this->form_validation->set_rules('cnic_back', 'CNIC back', 'required');
		$this->form_validation->set_rules('last_degree', 'Last Degree', 'required');*/
		if(isset($_FILES['proimage']["name"])){
			if(($_FILES['proimage']["name"])!== ""){
				$picture=$this-> upload_file('proimage');
			}
		}
		
		
		if($this->form_validation->run())
		{
			
			$data = array(
				'pimage' => $this->input->post('image_value'),
				'first_name'  => $this->input->post('first_name'),
				'last_name'  => $this->input->post('last_name'),
				'father_name'  => $this->input->post('father_name'),
				'date_of_birth'  => $this->input->post('date_of_birth'),
				'nationality'  => $this->input->post('nationality'),
				'mobileno'  => $this->input->post('mobileno'),
				'address'  => $this->input->post('address'),
				'city'  => $this->input->post('city'),
				'country'  => $this->input->post('country'),
				'skype_id'  => $this->input->post('skype_id'),
				'linkdin_profile'  => $this->input->post('linkdin_profile'),
				'gender'  => $this->input->post('gender'),
				/*'cnic_front'  => $this->input->post('cnic_front'),
				'cnic_back'  => $this->input->post('cnic_back'),
				'last_degree'  => $this->input->post('last_degree'),*/
				'talentid' => $this->session->userdata('id')
				
			);
						
			$id = $this->session->userdata('id');

			$result = $this->welcome_model->insert_info($data,$id); 
			
			if($result =='')
			{		
				/*$this->output
				->set_content_type('application/json')
				->set_output(json_encode(['status'=>'success'])); */
					$this->experience();
			}
			else
			{
				$this->output
				->set_content_type('application/json')
				->set_output(json_encode(['message'=>$result, 'status'=>'faliure']));
			}
		}
		else
		{
			$this->index();
		}
	}
	
	 public function upload_file($image)
        {	

			
			if(isset($_FILES[$image]["name"]))  
        	{
                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png|pdf|doc';
                $config['max_size']             = 102400;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;
                $this->load->library('upload', $config);
                if ( ! $this->upload->do_upload($image))
                {
                    $error = array('error' => $this->upload->display_errors());
                    print_r($error);
                    exit;
                    
                }
                else
                {
                    $data = array('upload_data' => $this->upload->data());
                    return $data;
                }
            }
            else
            {
            	echo "File is not select";
            	exit;
            }
        }
	
	public function validate_mobileno($str)
	{
        if (preg_match("/[\d\s-+]/", $str) !== 0)
        {            
        	return true;
        }
        else
        {
            $this->form_validation->set_message("validate_mobileno", '%s is not valid.');
            return false;
        }
    }

	public function validate_address($str)
	{
        if (preg_match("/[\w\s.,-\/]/", $str) !== 0)
        {            
        	return true;
        } 
        else 
        {
            $this->form_validation->set_message("validate_address", '%s is not valid.');
            return false;
        }
    }

	public function validation_exp()
	{

		$this->form_validation->set_rules('job_title', 'Job Title', 'required|alpha_numeric_spaces');
		$this->form_validation->set_rules('company', 'Company', 'required|alpha_numeric_spaces');
		$this->form_validation->set_rules('location', 'Location', 'required|alpha_numeric_spaces');
		$this->form_validation->set_rules('start_month', 'Start of month', 'required');
		$this->form_validation->set_rules('end_month', 'End of month', 'required');
		$this->form_validation->set_rules('current_job', 'Current Job');
		
		

		if($this->form_validation->run())
		{
			$checked=$this->input->post('current_job');
			if(!isset($checked))
			{
					$val=0;
			}
			else 
			{	
				$val=1;
			}
			$data = array(
				'job_title'  => $this->input->post('job_title'),
				'company_name'  => $this->input->post('company'),
				'location'  => $this->input->post('location'),
				'start_month'  => $this->input->post('start_month'),
				'end_month'  => $this->input->post('end_month'),
				'curent_job'  => $val,
				'talentid' => $this->session->userdata('id')
			);

			$id=$this->input->post('job_title');
			$result = $this->welcome_model->insert_exp($data,$id); 
			
			if($result == '')
			{
				$this->experience();

			}
			else
			{
				$this->output
				->set_content_type('application/json')
				->set_output(json_encode(['message'=>$result, 'status'=>'faliure']));
			}
		}
		else
		{
			$this->experience();
		}
	}

	function validation_edu()
	{
		$this->form_validation->set_rules('school', 'School', 'required|alpha_numeric_spaces');
		$this->form_validation->set_rules('degree_name', 'Degree/Certificate', 'required|alpha_numeric_spaces');
		$this->form_validation->set_rules('field_of_study', 'Field of study', 'required|alpha_numeric_spaces');
		$this->form_validation->set_rules('location', 'Location', 'required|alpha_numeric_spaces');
		$this->form_validation->set_rules('start_month_edu', 'Start of month', 'required');
		$this->form_validation->set_rules('end_month_edu', 'End of month', 'required');
		$this->form_validation->set_rules('current_degree', 'Current Job');
		
		if($this->form_validation->run())
		{
			$checked=$this->input->post('current_degree');
			if(!isset($checked))
			{
					$val=0;
			}
			else 
			{	
				$val=1;
			}
			$data = array(
				'school'  => $this->input->post('school'),
				'degree_name'  => $this->input->post('degree_name'),
				'field_of_study'  => $this->input->post('field_of_study'),
				'location'  => $this->input->post('location'),
				'start_date'  => $this->input->post('start_month_edu'),
				'end_date'  => $this->input->post('end_month_edu'),
				'current_degree'  => $val,
				'talentid' => $this->session->userdata('id')
				
			);
			
			$id = $this->session->userdata('id');
			$result = $this->welcome_model->insert_edu($data); 
			
			if($result == '')
			{		
				
				$this->education();
				
			}
			else
			{
				$this->output
				->set_content_type('application/json')
				->set_output(json_encode(['message'=>$result, 'status'=>'faliure']));
			}
		}
		else
		{
			$this->education();
		}
	}

	function validation_skill()
	{
		$tskill = $this->input->post('tskill');
		$data = array();
		for($i = 1; $i <= $tskill; $i++){
 			$data[] = $this->input->post('skill'.$i);
		}
		
			$id = $this->session->userdata('id');
			$result = $this->welcome_model->insert_skill($data,$id); 
			
			if($result == '')
			{		
				$this->index();
				
			}
			else
			{
				$this->output
				->set_content_type('application/json')
				->set_output(json_encode(['message'=>$result, 'status'=>'faliure']));
			}
		
	
	}


	function totalexperience(){
		$id = $this->session->userdata('id');
		$result = $this->welcome_model->getExp($id);
		if($result == 0){
			$this->output
				->set_content_type('application/json')
				->set_output(json_encode(['message'=>"", 'status'=>'Fresh Graduate']));
		}
		elseif($result == 1){
			$this->education();
		}

	}

	public function delete_exp_data()
	{
		$eid = $this->uri->segment(3);
		$id = $this->session->userdata('id');
		$this->welcome_model->delete_exp($eid);
		$this->experience();
		
	}

	function edit_exp_data()
	{
		$eid = $this->uri->segment(3);
		$id = $this->session->userdata('id');
		$result['exp']=$this->welcome_model->retreive_one_experience($eid);
			$result['data']=$this->welcome_model->retrieve_exp($id);
				
		$this->form_validation->unset_field_data();
		$this->load->view('experience',$result); 
		
	}

	function update_exp_data()
	{
		$id= $this->input->post('did');
		if(!isset($checked))
			{
					$val=0;
			}
			else 
			{	
				$val=1;
			}
			$data = array(
				'job_title'  => $this->input->post('job_title'),
				'company_name'  => $this->input->post('company'),
				'location'  => $this->input->post('location'),
				'start_month'  => $this->input->post('start_month'),
				'end_month'  => $this->input->post('end_month'),
				'curent_job'  => $val,
			);
		$this->welcome_model->update_exp($data,$id);
		$this->experience();
		
	}

	public function delete_edu_data()
	{
		$eid = $this->uri->segment(3);
		$id = $this->session->userdata('id');
		$this->welcome_model->delete_edu($eid);
		$this->education();
		
	}

	function edit_edu_data()
	{
		$eid = $this->uri->segment(3);
		$id = $this->session->userdata('id');
		$result['exp']=$this->welcome_model->retreive_one_education($eid);
			$result['data']=$this->welcome_model->retrieve_education($id);
				
		$this->form_validation->unset_field_data();
		$this->load->view('experience',$result); 
		
	}

	function update_edu_data()
	{
		$id= $this->input->post('did');
		if(!isset($checked))
			{
					$val=0;
			}
			else 
			{	
				$val=1;
			}
			$data = array(
				'school'  => $this->input->post('school'),
				'degree_name'  => $this->input->post('degree_name'),
				'field_of_study'  => $this->input->post('field_of_study'),
				'location'  => $this->input->post('location'),
				'start_date'  => $this->input->post('start_month_edu'),
				'end_date'  => $this->input->post('end_month_edu'),
				'current_degree'  => $val,
			);
		$this->welcome_model->update_edu($data,$id);
		$this->education();
		
	}

	function logout()
	{
		$data = $this->session->all_userdata();
		foreach($data as $row => $rows_value)
		{
			$this->session->unset_userdata($row);
		}
		redirect('home');
	}
}

?>

