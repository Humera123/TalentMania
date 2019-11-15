<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paneldashboard extends CI_Controller {

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
		$this->load->helper('form');

		$this->load->library('encryptioncustom');
		$this->load->model('paneldashboard_model');
	}

	function index()
	{
		$this->load->view('templates/header');
		if($this->session->userdata('id'))
		{
			$id=$this->session->userdata('id');
			$this->paneldashboard_model->retrieve_info($id);
		}
		else 
		{
			$this->load->view('paneldashboard');
		}
		$this->load->view('templates/footer');
	}

	function panel(){
		$this->load->view('templates/header');
		$this->load->view('panel');
		$this->load->view('templates/footer');
	}

	function experience()
	{
		
		$this->load->view('panelexp');
		
	}

	function education()
	{
		
		$this->load->view('paneledu');
		
	}

	function skill()
	{
		
		$this->load->view('panelskill');
		

	}


	function validation()
	{

		
		$this->form_validation->set_rules('first_name', 'First Name', 'required|alpha_numeric_spaces');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required|alpha_numeric_spaces');
		$this->form_validation->set_rules('mobileno', 'Mobile no', 'required|numeric');
		$this->form_validation->set_rules('city', 'City', 'required|alpha');
		$this->form_validation->set_rules('country', 'Country', 'required|alpha');
		$this->form_validation->set_rules('skype_id', 'Skype Id', 'required|alpha_numeric');
		$this->form_validation->set_rules('linkdin_profile', 'Linkdin Profile', 'required|alpha_numeric');

		if(isset($_FILES['profile_image']['name']))
		{
			$profile_img=$this-> upload('profile_image');
			$profile_img_name=$profile_img['upload_data']['file_name'];
		}
		else
		{
			$profile_img_name=$this->input->post('image_value');
		
		}
		
		
		if($this->form_validation->run())
		{
			$data = array(
				'pimage'=> $profile_img_name,
				'first_name'  => $this->input->post('first_name'),
				'last_name'  => $this->input->post('last_name'),
				'mobileno'  => $this->input->post('mobileno'),
				'city'  => $this->input->post('city'),
				'country'  => $this->input->post('country'),
				'skype_id'  => $this->input->post('skype_id'),
				'linkdin_profile'  => $this->input->post('linkdin_profile'),
				'talentid' => $this->session->userdata('id')
				
			);


			$id = $this->session->userdata('id');
			$result = $this->paneldashboard_model->insert_info($data,$id); 
			
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
			$this->index();
		}
	}


	public function upload_file($image)
        {	

			
			    $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png';
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
            
        public function upload($f)
	{
		if(isset($_FILES[$f]["name"])){
			if(($_FILES[$f]["name"])!== ""){
				$picture=$this-> upload_file($f);
				return $picture;
			}
		}

	}

	function validation_exp()
	{

		$this->form_validation->set_rules('job_title', 'Job Title', 'required|alpha_numeric_spaces');
		$this->form_validation->set_rules('company', 'Company', 'required|alpha_numeric_spaces');
		$this->form_validation->set_rules('location', 'Location', 'required|alpha_numeric_spaces');
		$this->form_validation->set_rules('start_month', 'Start of month', 'required');
		$this->form_validation->set_rules('end_month', 'End of month', 'required');
		$this->form_validation->set_rules('current_job', 'Current Job');
		

		if($this->form_validation->run())
		{
			$data = array(
				'job_title'  => $this->input->post('job_title'),
				'company_name'  => $this->input->post('company'),
				'location'  => $this->input->post('location'),
				'start_month'  => $this->input->post('start_month'),
				'end_month'  => $this->input->post('end_month'),
				'curent_job'  => $this->input->post('current_job'),
				'talentid' => $this->session->userdata('id')
				
			);

			
			$id = $this->session->userdata('id');
			$result = $this->paneldashboard_model->insert_exp($data); 
			
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

    function totalexperience()
	{
		
		$id = $this->session->userdata('id');
		$result = $this->paneldashboard_model->getExp($id);
		if($result == 0){
			$this->output
				->set_content_type('application/json')
				->set_output(json_encode(['message'=>"", 'status'=>'Fresh Graduate']));
		}
		elseif($result == 1){
			$this->skill();
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
			$result = $this->paneldashboard_model->insert_edu($data); 
			
			if($result == '')
			{		
				
				$this->skill();
				
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
			$result = $this->paneldashboard_model->insert_skill($data,$id); 
			
			if($result == '')
			{
				$this->panel($this->session->set_flashdata('true', 'You Successfully Complete your Profile'));
			
			}
			else
			{
				$this->output
				->set_content_type('application/json')
				->set_output(json_encode(['message'=>$result, 'status'=>'faliure']));
			}
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

