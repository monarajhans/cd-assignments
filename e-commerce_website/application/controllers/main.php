<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    //$this->output->enable_profiler();
  }
  public function index()
  {
    $this->load->Model('Product');
    $results = $this->Product->allproducts_onindex();
    $this->load->view('index', array('allproducts' => $results));
  }
  public function userlogin(){
    $this->load->view('userlogin');
  }
  public function register(){
    $this->load->library("form_validation");
    $this->form_validation->set_rules("first_name", "First Name", "trim|required");
    $this->form_validation->set_rules("last_name", "Last Name", "trim|required");
    $this->form_validation->set_rules("email", "Email", "trim|valid_email|required");
    $this->form_validation->set_rules("password", "Password", "trim|min_length[8]|matches[confirm_password]|md5|required");
    $this->form_validation->set_rules("confirm_password", "Confirm Password", "trim|required|md5");

    if($this->form_validation->run() === FALSE)
    {
      $this->session->set_flashdata("registration_errors", validation_errors()); // Validation_errors() is from CI
      redirect('/main/userlogin');
    }
    else {
      $this->load->model('User');
      $this->User->insert_user($this->input->post());
      $this->session->set_flashdata('Successful', 'Registration Successful, Please login!');
      redirect('/main/userlogin');
    }
  }
  public function login_user() {
    $this->load->library("form_validation");
    $this->form_validation->set_rules("email", "Email", "trim|valid_email|required");
    $this->form_validation->set_rules("password", "Password", "trim|min_length[8]|md5|required");

    if($this->form_validation->run() === FALSE)
    {
      $this->session->set_flashdata("login_errors", validation_errors());
      redirect('/main/userlogin');
    }
    else {
      $this->load->model('User');
      $getuser = $this->User->get_user_by_email($this->input->post('email'));
      $password = $this->input->post('password');
      if ($getuser && $getuser['password'] == $password) 
      {
        $this->session->set_userdata('count', 0);
        $this->session->set_userdata('user_session', $getuser);
        if ($getuser['user_level'] == 'admin') {
          redirect('/dashboard');
        }
        else {
         redirect('/');
        }

      }
      else
      {
        $this->session->set_flashdata("login_errors", "Invalid email or password!");
        redirect("/userlogin");
      }
    }
  }
  public function logoff(){
    $this->session->sess_destroy();
    $this->session->set_flashdata("error_message","Logged Out successfully");
    redirect('/main/userlogin');
  }
}


