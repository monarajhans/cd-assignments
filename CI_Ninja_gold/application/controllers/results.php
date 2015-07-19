<?php
		
class Results extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->output->enable_profiler();
	}

	public function index()
	{
	if(!($this->session->userdata('status'))) 
	{
		$this->session->set_userdata('status', array());
	}

	if(!($this->session->userdata('final'))) 
		{
			$this->session->set_userdata('final', 0);
		}

	if ($this->input->post('place') == "farm") {
			$temp = $this->session->userdata('final') + rand(10,20);
			$this->session->set_userdata('final', $temp);
			$activity = "You entered a farm and earned " . $this->session->userdata('farm') . " golds.";
			$activities = $this->session->userdata('status');
			$activities[] = $activity; 
			$this->session->set_userdata('status', $activities);
			// $this->session->set_userdata('status', "You entered a farm and earned " . $this->session->userdata('cave') . " golds.");
			$this->load->view('index');
	}

	else if ($this->input->post('place') == "cave") {
			$temp = $this->session->userdata('final') + rand(5,10);
			$this->session->set_userdata('final', $temp);
			$activity = "You entered a cave and earned " . $this->session->userdata('cave') . " golds.";
			$this->session->userdata('status')[] = $activity;
			$this->load->view('index');
	}

	else if ($this->input->post('place') == "house") {
			$temp = $this->session->userdata('final') + rand(10,20);
			$this->session->set_userdata('final', $temp);
			$activity = "You entered a house and earned " . $this->session->userdata('house') . " golds.";
			$this->session->userdata('status')[] = $activity;
			$this->load->view('index');
	}

	else if ($this->input->post('place') == "casino") {
				$temp = $this->session->userdata('final') + rand(-50,50);
				$this->session->set_userdata('final', $temp);
				$activity = "You entered a casino and earned " . $this->session->userdata('casino') . " golds.";
				$this->session->userdata('status')[] = $activity;
				$this->load->view('index');
		}
	
	if ($this->input->post('action') == "reset") {
		// $this->session->set_userdata('final', 0);
			$this->session->sess_destroy();
			// $this->session->unset_userdata('final');
			$this->load->view('index');
			}
	}
}