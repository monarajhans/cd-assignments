<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('login_registration');
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
		$details = $this->model->get_reviews();
		$this->load->view('books_home', array('user' => $user, 'details' => $details));
	}

	public function log_off(){
		$this->session->sess_destroy();
		redirect('/');
	}

	public function add_new(){
		$this->load->view('add_new');
	}

	public function home(){
		$this->load->model('model');
		$details = $this->model->get_reviews();
		$this->load->view('books_home', array('details' => $details));
	}

	public function add_book(){
		$this->load->model('model');
		$book_details = $this->model->add_new();
		// var_dump($book_details); die();
		$this->load->view('book_page', array('book' => $book_details));
	}

	public function add_review($id){
		$this->load->model('model');
		$book_details = $this->model->add_review($id);
		$this->add_book();
		// $this->load->view('book_page');
		// $this->load->view('book_page', array('book' => $book_details));
	}

	public function book_page($id){
		$this->load->model('model');
		$book_details = $this->model->book_page($id);
		$this->load->view('book_page', array('book' => $book_details));
	}

	public function user_reviews(){
		$this->load->view('user_reviews');
	}

	// public function books_reviewed($id){
	// 	$this->load->model('model');
	// 	$book_details = $this->model->books_reviewed($id);
	// 	var_dump($book_details); die();
	// 	$this->load->view('user_reviews', array('book' => $book_details));
	// }
}
//end of main controller