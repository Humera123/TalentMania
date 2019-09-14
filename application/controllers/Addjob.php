<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Addjob extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('id'))
		{
			redirect('home');
		}
		$this->load->library('form_validation');
		$this->load->library('encryptioncustom');
		$this->load->model('addjob_model');
	}

	function index()
	{
        $this->load->view('templates/header');
		$this->load->view('addjob');
		$this->load->view('templates/footer');
	}

	function company(){
		$this->load->view('templates/header');
		$this->load->view('company');
		$this->load->view('templates/footer');
	}
	
	function validation()
	{

		
		$this->form_validation->set_rules('job_title', 'Job title', 'required');
		$this->form_validation->set_rules('job_desc', 'Job description', 'required');
		$this->form_validation->set_rules('skills_required', 'Skill', 'required');
		$this->form_validation->set_rules('career_level', 'Career level', 'required');
		$this->form_validation->set_rules('qualification', 'qualification', 'required');
		$this->form_validation->set_rules('position', 'position', 'required');
		$this->form_validation->set_rules('qualification_range', 'qualification range', 'required');
		$this->form_validation->set_rules('job_location', 'Job location', 'required');
		$this->form_validation->set_rules('min_experience', 'min experience', 'required');
		$this->form_validation->set_rules('max_experience', 'max experience', 'required');
		$this->form_validation->set_rules('min_salary', 'min salary', 'required');
		$this->form_validation->set_rules('max_salary', 'max salary', 'required');
		$this->form_validation->set_rules('gender', 'gender', 'required');
		

		if($this->form_validation->run())
		{
			$data = array(
				'job_title'  => $this->input->post('job_title'),
				'job_desc'  => $this->input->post('job_desc'),
				'skills_required'  => $this->input->post('skills_required'),
				'career_level'  => $this->input->post('career_level'),
				'qualification'  => $this->input->post('qualification'),
				'qualification_range'  => $this->input->post('qualification_range'),
				'position'  => $this->input->post('position'),
				'job_location'  => $this->input->post('job_location'),
				'min_experience'  => $this->input->post('min_experience'),
				'max_experience'  => $this->input->post('max_experience'),
				'min_salary'  => $this->input->post('min_salary'),
				'max_salary'  => $this->input->post('max_salary'),
				'gender'  => $this->input->post('gender'),
				'talentid' => $this->session->userdata('id')
				
			);

			
			$id = $this->session->userdata('id');
			$result = $this->addjob_model->insert_info($data,$id); 
			
			if($result == '')
			{		
				$this->company();
				
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

	function jobseeker_available($jobid){
		

	}

}