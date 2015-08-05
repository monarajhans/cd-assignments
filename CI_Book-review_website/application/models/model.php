<?php

Class model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function register($user_register) {
		
		$query = "INSERT INTO users(first_name, last_name, email, password) VALUES (?, ?, ?, ?)";
		$values = array($user_register['first_name'], $user_register['last_name'], $user_register['email'], $user_register['password']);
		return $this->db->query($query, $values);		
	}

	public function login($email) 
	{
		$query = "SELECT * from users WHERE email = ?";
		$values = $email;
		return $this->db->query($query, $values)->row_array();
	}

	public function validation_register(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules("first_name", "First Name", "trim|required");
		$this->form_validation->set_rules("last_name", "Last Name", "trim|required");
		$this->form_validation->set_rules("email", "Email", "trim|required|valid_email|is_unique(users.email)");
		$this->form_validation->set_rules("password", "Password", "trim|required|matches[confirm_password]");
		$this->form_validation->set_rules("confirm_password", "Confirm Password", "trim|required");

			if($this->form_validation->run() == false) {
				$this->session->set_flashdata('errors', validation_errors());
			}

			else{
				$first_name = $this->input->post('first_name');
				$last_name = $this->input->post('last_name');
				$email = $this->input->post('email');
				$password = md5($this->input->post('password'));

				$new_user = array('first_name' => $first_name, 
								'last_name' => $last_name,
								'email' => $email,
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
		$this->form_validation->set_rules("email", "Email", "trim|required");
		$this->form_validation->set_rules("password", "Password", "trim|required");

		if($this->form_validation->run() == false) 
		{
			$this->session->set_flashdata('errors', validation_errors());
			redirect('/main/index');	
		}
		else{
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$password = md5($password);
			$user = $this->login($email);
				if($user && $password == $user["password"]){
					$user_loggedin = array('id' => $user['id'],
											'first_name' => $user['first_name'], 
											'last_name' => $user['last_name'],
											'email' => $user['email']);
					$this->session->set_userdata("user_session", $user_loggedin);
					return $user_loggedin;
				}

				else{
					$this->session->set_flashdata('errors', "User does not exist");
					redirect('/main/index');
				}
				}
		}

	public function add_new() 
	{
		if($this->session->userdata("user_session")){
     		$session_user = $this->session->userdata("user_session");
    	 }

		$id = $session_user['id'];
		$title = $this->input->post('name');
		$author = $this->input->post('author');
		$review = $this->input->post('review');
		$rating = $this->input->post('rating');

		$book_details = array('id' => $id,
								'name' => $title, 
								'author' => $author,
								'review' => $review,
								'rating' => $rating);

		$query = "INSERT into books(name, author) VALUES(?, ?)";
		$values = array($book_details['name'], $book_details['author']);
		$this->db->query($query, $values);
		$book_id = $this->db->insert_id();

		$book_details['book_id'] = $book_id;

		$query = "INSERT into reviews(review, rating, user_id, book_id) VALUES(?, ?, ?, ?)";
		$values = array($book_details['review'], $book_details['rating'], $book_details['id'], $book_details['book_id']);
		$this->db->query($query, $values);
		return $book_details;
	}

	public function book_page($id){

		$query = "SELECT * from books 
					LEFT JOIN reviews on books.id = reviews.book_id 
					LEFT JOIN users on reviews.user_id = users.id
					where books.id = ?";
		$values = $id;

		return $this->db->query($query, $values)->row_array();
	}

	// public function books_reviewed($id){
	// 	$query = "SELECT * from books 
	// 				LEFT JOIN reviews on books.id = reviews.book_id 
	// 				LEFT JOIN users on reviews.user_id = users.id
	// 				where users.id = ?";
	// 	$values = $id;

	// 	return $this->db->query($query, $values)->result_array();
	// }

	public function add_review($id){
		if($this->session->userdata("user_session")){
     	$session_user = $this->session->userdata("user_session");
    	 }
		$query = "INSERT into reviews(review, rating, user_id, book_id) VALUES (?, ?, ?, ?)";
		$values = array($this->input->post('review'), $this->input->post('rating'), $session_user['id'], $id);
		return $this->db->query($query, $values);
	}

	public function get_reviews(){
		if($this->session->userdata("user_session")){
     	$session_user = $this->session->userdata("user_session");
    	 }
    	$query = "SELECT * from books 
					LEFT JOIN reviews on books.id = reviews.book_id 
					LEFT JOIN users on reviews.user_id = users.id
					ORDER BY reviews.id desc";
		$result = $this->db->query($query)->result_array();
		return $result;
		// var_dump($result);
	}
}