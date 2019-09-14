<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Skillendorsed extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('id'))
		{
			redirect('home');
		}
		$this->load->library('form_validation');
		$this->load->library('encryptioncustom');
		$this->load->model('skillendrosed_model');
	}

	function index()
	{
        $this->load->view('templates/header');
        $data['getSkills'] = $this->skillendrosed_model->getSkill($this->session->userdata('id'));
		$this->load->view('skillendorsed',$data);
		$this->load->view('templates/footer');
    }

    function getskills(){

        $id = $this->session->userdata('id');
        $data = $this->register_model->getSkill($id);
    }
    
    
}

?>

