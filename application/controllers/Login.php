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

  $this->form_validation->set_rules('user_email', 'Email Address', 'required|trim|valid_email');
  $this->form_validation->set_rules('user_password', 'Password', 'required');
  if($this->form_validation->run())
  {
   $result = $this->login_model->can_login($this->input->post('user_email'), $this->input->post('user_password')); 
   if($result == '')
   {
    redirect('index');
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

}

?>