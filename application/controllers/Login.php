<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

 public function __construct()
 {
  parent::__construct();
  if($this->session->userdata('id'))
  {
   redirect('index');
  }
  $this->load->library('form_validation');
  $this->load->library('encrypt');
  $this->load->model('login_model');
 }

 function index()
 {
    $this->load->view('templates/header');
    $this->load->view('login');
    $this->load->view('templates/footer');
 }

 function validation()
 {

    $response = array();
    $this->form_validation->set_rules('email', 'Email Address', 'required|trim|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'required');
    if($this->form_validation->run())
    {
      $result = $this->login_model->can_login($this->input->post('email'), $this->input->post('password')); 
    
        if($result == 'success')
        {          
          $response['message'] = "login success";
          $response['error'] = FALSE;   
        }
        else
        {
            $response['message'] = $result;  
          $response['error'] = TRUE;
        }
    }
    else
    {
         $response['message'] = "form validation error";  
          $response['error'] = TRUE;
    }
    echo json_encode($response);

   }

    public function logout(){
      destroy_session();
            $this->session->sess_destroy();
            redirect();
        }// viewer logout.

}



?>