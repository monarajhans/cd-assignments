<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->output->enable_profiler();
	}

	public function index()
	{
		$array = array('date'=>date('M, d, y'), 'time'=>date('h:i a'));
		// var_dump($array);
		$this->load->view('time', $array);
	}
}

//end of main controller