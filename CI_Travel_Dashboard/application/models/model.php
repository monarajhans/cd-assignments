<?php

Class model extends CI_Model {

	public function register($user_register) {
		
		$query = "INSERT INTO users(name, username, password) VALUES (?, ?, ?)";
		$values = array($user_register['name'], $user_register['username'], $user_register['password']);
		return $this->db->query($query, $values);		
	}

	public function login($username) {
		
		$query = "SELECT * from users WHERE username = ?";
		$values = $username;
		return $this->db->query($query, $values)->row_array();
	}

	public function validation_register(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules("name", "Name", "trim|required|min_length[3]");
		$this->form_validation->set_rules("username", "Username", "trim|required|min_length[3]|is_unique(users.username)");
		$this->form_validation->set_rules("password", "Password", "trim|required|matches[confirm_password]");
		$this->form_validation->set_rules("confirm_password", "Confirm Password", "trim|required|min_length[8]");

			if($this->form_validation->run() == false) {
				$this->session->set_flashdata('errors', validation_errors());
			}

			else{
				$name = $this->input->post('name');
				$username = $this->input->post('username');
				$password = md5($this->input->post('password'));

				$new_user = array('name' => $name, 
								'username' => $username,
								'password' => $password);
				
				$user_status = $this->model->register($new_user);

				if($user_status == TRUE)
				{
					$this->session->set_flashdata('success', "You have successfully registered yourself. Please log in to continue!");
					redirect("/main/index");
					$this->session->set_userdata('signedin', "true");
				}
				else{
					$this->session->set_flashdata('error', "Registration not successfull. Please try again!");	
				}
			}
	}

	public function validation_signin()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules("username", "Username", "trim|required");
		$this->form_validation->set_rules("password", "Password", "trim|required");

		if($this->form_validation->run() == false) 
		{
			$this->session->set_flashdata('errors', validation_errors());
			redirect('/main/index');	
		}

		else{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$password = md5($password);

			$user = $this->login($username);
				if($user && $password == $user["password"]){
					$user_loggedin = array('id' => $user['id'],
											'name' => $user['name'], 
											'username' => $user['username']);
					$this->session->set_userdata("user_session", $user_loggedin);
					return $user_loggedin;
				}

				else{
					$this->session->set_flashdata('errors', "User does not exist");
					redirect('/main/index');
				}
				}
		}

	public function home(){
		if($this->session->userdata("user_session"))
		{
     		$session_user = $this->session->userdata("user_session");
    	}
		$id = $session_user['id'];
		$name = $session_user['name'];

		$query = "SELECT destinations.destination, plans.date_start, plans.date_end, plans.description from users
				  LEFT JOIN plans on users.id = plans.user_id
				  LEFT JOIN destinations on plans.destination_id = destinations.id
				  WHERE users.id = ?";
		$values = array('user_id' => $id);
		$travel_details = $this->db->query($query, $values)->result_array();

		$query = "SELECT users.name, destinations.destination, plans.date_start, plans.date_end from users
				  LEFT JOIN plans on users.id = plans.user_id
				  LEFT JOIN destinations on plans.destination_id = destinations.id
				  WHERE users.name != ?";
		$values = array('user_name' => $name);
		$other_travelers = $this->db->query($query, $values)->result_array();
		$this->session->set_userdata("other_travelers", $other_travelers);

		return $travel_details;
	}

	public function add_plan()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules("destination", "Destination", "trim|required");
		$this->form_validation->set_rules("description", "Description", "trim|required");
		$this->form_validation->set_rules("date_start", "Travel Date From", "trim|required");
		$this->form_validation->set_rules("date_end", "Travel date to", "trim|required");

		if($this->form_validation->run() == false) {
				$this->session->set_flashdata('errors', validation_errors());
			}
				
		if($this->session->userdata("user_session"))
		{
     		$session_user = $this->session->userdata("user_session");
    	}
		$id = $session_user['id'];
		$destination = $this->input->post('destination');
		$description = $this->input->post('description');
		$date_start = $this->input->post('date_start');
		$date_end = $this->input->post('date_end');

		$travel_details = array('id' => $id,
								'destination' => $destination, 
								'description' => $description,
								'date_start' => $date_start,
								'date_end' => $date_end);

		$query = "INSERT into destinations(destination) VALUES(?)";
		$values = array($travel_details['destination']);
		$this->db->query($query, $values);
		$travel_id = $this->db->insert_id();
		
		$travel_details['travel_id'] = $travel_id;
		
		$query = "INSERT into plans(description, date_start, date_end, user_id, destination_id) VALUES(?, ?, ?, ?, ?)";
		$values = array($travel_details['description'], $travel_details['date_start'], $travel_details['date_end'], $travel_details['id'], $travel_details['travel_id']);
		$this->db->query($query, $values);
		// $travel_details = array('destination' => $destination, 
		// 						'date_start' => $date_start,
		// 						'date_end' => $date_end,
		// 						'description' => $description,);
		// // var_dump($travel_details); die();
		// return $travel_details;
	}	


	public function destination($destination)
	{
		$query = "SELECT destinations.destination, users.name, plans.description, plans.date_start, plans.date_end 		from users
				  LEFT JOIN plans on users.id = plans.user_id
				  LEFT JOIN destinations on plans.destination_id = destinations.id
				  WHERE destinations.destination = ?";
		$values = array('destination' => $destination);
		$destination_details = $this->db->query($query, $values)->result_array();
		return $destination_details;
	}

	public function join($name, $destination)
	{
     	$session_user = $this->session->userdata("user_session");
		$id = $session_user['id'];

		$query = "SELECT destinations.destination, plans.date_start, plans.date_end, plans.description from users
				  LEFT JOIN plans on users.id = plans.user_id
				  LEFT JOIN destinations on plans.destination_id = destinations.id
				  WHERE destinations.destination = ? AND users.name = ?";
		$values = array('destination' => $destination, 'name' => $name);
		$other_plans = $this->db->query($query, $values)->result_array();
		

			$query = "INSERT into destinations(destination) VALUES(?)";
			$values = array($other_plans[0]['destination']);
			$this->db->query($query, $values);
			$destination_id = $this->db->insert_id();

		// $other_plans['destination_id'] = $travel_id;
		// $other_plans['user_id'] = $id;
		// var_dump($other_plans); die();
		$query = "INSERT into plans(description, date_start, date_end, user_id, destination_id) VALUES(?, ?, ?, ?, ?)";
		$values = array($other_plans[0]['description'], $other_plans[0]['date_start'], $other_plans[0]['date_end'], $id, $destination_id);
		$this->db->query($query, $values);
	}
}