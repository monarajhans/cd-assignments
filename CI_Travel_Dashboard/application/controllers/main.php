<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('index');
	}

	public function register()
	{
		$this->load->model('model');
		$this->model->validation_register();
		redirect('/');
	}

	public function login() 
	{
		$this->load->model('model');
		$user = $this->model->validation_signin();
		$this->load->view('travel_dashboard', array('user' => $user));		
	}

	public function log_off(){
		$this->session->sess_destroy();
		redirect('/');
	}

	public function home(){
		$this->load->model('model');
		$travel_details = $this->model->home();
		// var_dump($travel_details); die();
		$this->load->view('travel_dashboard', array('travel_details' => $travel_details));
	}

	public function add_travel()
	{
		$this->load->view('add_plan');
	}

	public function add_plan(){
		$this->load->model('model');
		$this->model->add_plan();
		$travel_details = $this->model->home();
		$this->load->view('travel_dashboard', array('travel_details' => $travel_details));
	}

	public function destination($destination)
	{
		$this->load->model('model');
		$destination_details = $this->model->destination($destination);
		$this->load->view('destination', array('destination_details' => $destination_details));
	}

	public function join($name, $destination)
	{
		$this->load->model('model');
		$this->model->join($name, $destination);
		$this->home();
		// $this->load->view('travel_dashboard', array('travel_details' => $travel_details));
	}
}
//end of main controller