<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Companydashboard extends CI_Controller {

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

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('id'))
		{
			redirect('index');
		}
		$this->load->library('form_validation');
		$this->load->library('encryptioncustom');
		$this->load->model('companydashboard_model');
	}

	function index()
	{
		$this->load->view('templates/header');
		$this->load->view('companydashboard');
		$this->load->view('templates/footer');
    }
    
    function loadIndex()
	{
        $this->load->view('index');
    }


	function validation()
	{

		
		$this->form_validation->set_rules('name_of_organization', 'Name of Organization', 'required|alpha_numeric_spaces');
		$this->form_validation->set_rules('industry_type', 'Industry Type', 'required|alpha_numeric_spaces');
		$this->form_validation->set_rules('sector', 'Private or Public sector', 'required|alpha_numeric_spaces');
		$this->form_validation->set_rules('address', 'Address', 'required|alpha_numeric_spaces');
		$this->form_validation->set_rules('phoneno', 'Phone no', 'required|alpha_numeric_spaces');
		$this->form_validation->set_rules('mobileno', 'Mobile no', 'required|numeric');
		$this->form_validation->set_rules('website_link', 'Website Link', 'required|alpha_numeric_spaces');
		$this->form_validation->set_rules('facebook', 'Facebook Page Link', 'required|alpha_numeric_spaces');
		$this->form_validation->set_rules('ceo_name', 'Name of CEO', 'required|alpha_numeric_spaces');
		$this->form_validation->set_rules('skype_id', 'Skype Id', 'required|alpha_numeric_spaces');
		$this->form_validation->set_rules('email_ceo', 'Email Address of CEO', 'required|trim|valid_email|is_unique[company_info.email_ceo]');
        $this->form_validation->set_rules('focal_name', 'Focal Person Name', 'required|alpha');
		$this->form_validation->set_rules('focal_email', 'Email Address of Focal person', 'required|trim|valid_email|is_unique[company_info.focal_email]');
		$this->form_validation->set_rules('ntn_no', 'NTN no', 'required|alpha_numeric');
		$this->form_validation->set_rules('employee_no', 'No of employees in organization', 'required|alpha_numeric');

		if($this->form_validation->run())
		{
			$data = array(
				'name_of_organization'  => $this->input->post('name_of_organization'),
				'industry_type'  => $this->input->post('industry_type'),
				'sector'  => $this->input->post('sector'),
				'address'  => $this->input->post('address'),
				'phoneno'  => $this->input->post('phoneno'),
				'mobileno'  => $this->input->post('mobileno'),
				'website_link'  => $this->input->post('website_link'),
				'facebook'  => $this->input->post('facebook'),
				'ceo_name'  => $this->input->post('ceo_name'),
				'skype_id'  => $this->input->post('skype_id'),
                'email_ceo'  => $this->input->post('email_ceo'),
                'focal_name'  => $this->input->post('focal_name'),
				'focal_email'  => $this->input->post('focal_email'),
				'ntn_no'  => $this->input->post('ntn_no'),
				'employee_no'  => $this->input->post('employee_no'),
				'talentid' => $this->session->userdata('id')
				
			);

			
			$id = $this->session->userdata('id');
			$result = $this->companydashboard_model->insert_info($data,$id); 
			
			if($result == '')
			{		
				
				$this->loadIndex();
				
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

