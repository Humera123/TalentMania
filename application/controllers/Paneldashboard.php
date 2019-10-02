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
		$this->load->library('encryptioncustom');
		$this->load->model('paneldashboard_model');
	}

	function index()
	{
		$this->load->view('templates/header');
		$this->load->view('paneldashboard');
		$this->load->view('templates/footer');
	}

	function panel(){
		$this->load->view('templates/header');
		$this->load->view('panel');
		$this->load->view('templates/footer');
	}

	function experience(){
		
		$this->load->view('panelexp');
		
	}

	function education(){
		
		$this->load->view('paneledu');
		
	}

	function skill(){
		
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
		
		if($this->form_validation->run())
		{
			$data = array(
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
				$this->panel();
				
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

