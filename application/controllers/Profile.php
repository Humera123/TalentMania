<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('id'))
		{
			redirect('home');
		}
		$this->load->library('form_validation');
		$this->load->library('encryptioncustom');
		$this->load->model('profile_model');
	}

	function index()
	{
        $this->load->view('templates/header');
        $data['profile'] = $this->profile_model->getProfile($this->input->get('id', TRUE));
        $data['edu'] = $this->profile_model->getEdu($this->input->get('id', TRUE));
        $data['exp'] = $this->profile_model->getExp($this->input->get('id', TRUE));
		$this->load->view('profile',$data);
		$this->load->view('templates/footer');
    }
     
    function getHire(){
        $id = $this->input->post('id');
        $jobid = $this->input->post('jobid');
        $this->profile_model->getHire($id,$jobid);
    }


}