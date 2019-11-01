<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Skillendorsed extends CI_Controller 
{

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

    function getskills()
    {

        $id = $this->session->userdata('id');
        $result['data'] = $this->skillendrosed_model->getSkill($id);
        $this->load->view('templates/header');
    	$this->load->view('panelskillendorse',$result);
    	$this->load->view('templates/footer');
    }

    function insert()
    {
        $skillid=$this->input->post('skillid');
   		$rating=$this->input->post('index');
        $this->skillendrosed_model->insert_rating($skillid,$rating);   
	}
 
 	
}

?>

