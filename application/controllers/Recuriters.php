<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recuriters extends CI_Controller {

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
		$this->load->model('recuriters_model');
	}

	function index()
	{
		$this->load->view('templates/header');
		$data['alljob'] = $this->recuriters_model->getJob($this->session->userdata('id'));
		$this->load->view('recuriters',$data);
		$this->load->view('templates/footer');
	}
	
	function getRecuriters(){
		$data = array(
			'jobid' => $this->input->post('jobid'),
			'skills' => $this->input->post('skills'),
			'exp' => $this->input->post('exp'),
			'edu' => $this->input->post('edu'),
			'gender' => $this->input->post('gender')
		);
		
		$result = $this->recuriters_model->getrecuriters($data);
		
		$data_result = $this->recuriters_model->getRecuritersName($result);
		foreach($data_result as $key=> $val){
			echo "<p><a href='".base_url()."/profile/$key'>$val</a></p>";
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

