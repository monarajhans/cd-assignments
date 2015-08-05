<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Show extends CI_Model {

	public function display_product($id)
	{
		$query = "SELECT * from products WHERE id = ?";
		$value = $id;
		$this->similar_products($id); // Uncomment this.
		return $this->db->query($query, $value)->row_array();
	}
// Uncomment this
	public function similar_products($id)
	{
		if ($id < 3)
		{
		$query = "SELECT * FROM products LIMIT $id, 6";
		$value = $id;
		return $this->db->query($query, $value)->result_array();
		}
		else
		{
			$query = "SELECT * FROM products LIMIT 1, 6";
			return $this->db->query($query)->result_array();
		}
	}

	public function update_cart($id)
	{
		$user = $this->session->userdata('user_session'); // Set the logged in user's information in session.
		$userid = $user['id'];
		// var_dump($id); die();
		$query = "INSERT into carts(user_id, product_id) VALUES(?, ?)";
		$values = array('user_id' => $userid, 'product_id' => $id);
				// var_dump($values);die();
		$count = $this->session->userdata('count');
		$this->session->set_userdata('count', $count + 1);		
		$this->db->query($query, $values);
	}

// Uncomment this
	public function shopping_cart()
	{
		$user_id = $this->session->userdata('user_session'); // Uncomment this
		// var_dump($user_id); die();
		$query = "SELECT products.name, products.description, products.quantity_sold, products.price, products.id, products.category_id from products 
							left join carts on products.id = carts.product_id
							left join users on carts.user_id = users.id
							where user_id = ?";
		$value = $user_id['id'];
		// var_dump($value); die();
		return $this->db->query($query, $value)->result_array();
		// var_dump($test); die();
	}

// Uncomment this
	public function shipping()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules("first_name", "First Name", "trim|required");
		$this->form_validation->set_rules("last_name", "Last Name", "trim|required");
		$this->form_validation->set_rules("address", "Address", "trim|required");
		$this->form_validation->set_rules("city", "City", "trim|required");
		$this->form_validation->set_rules("state", "State", "trim|required");
		$this->form_validation->set_rules("country", "Country", "trim|required");
		$this->form_validation->set_rules("zipcode", "Zipcode", "trim|required");

		if($this->form_validation->run() == false) 
		{
			$this->session->set_flashdata('errors', validation_errors());
		}
		else
		{
			$first_name = $this->input->post('first_name');
			$last_name = $this->input->post('last_name');
			$street = $this->input->post('address');
			$city = ($this->input->post('city'));
			$state = ($this->input->post('state'));
			$country = ($this->input->post('country'));
			$zipcode = ($this->input->post('zipcode'));
		
		$user_id = $this->session->userdata('user_session');
		$shipping_info = array('user_id' => $user_id['id'],
								'first_name' => $first_name, //Just realised, we need first_name, last_name in both shipping and billing tables.
								'last_name' => $last_name,
								'street' => $street,
								'city' => $city,
								'state' => $state,
								'country' => $country,
								'zipcode' => $zipcode);

		$query = "INSERT into addresses(street, city, state, country, zipcode) values(?, ?, ?, ?, ?)";
		$values = array($shipping_info['street'], $shipping_info['city'], $shipping_info['state'], $shipping_info['country'], $shipping_info['zipcode']);
		$this->db->query($query, $value);
		$address_id = $this->db->insert_id();

		$shipping_info['address_id'] = $address_id;

		$query = "INSERT into shippings(first_name, last_name, user_id, address_id) VALUES(?,?,?,?)";
		$values = array($shipping_info['first_name'], $shipping_info['last_name'], $shipping_info['user_id'], $shipping_info['address_id']);
	}
}

	public function billing()
	{
		if($this->post->input('billing_address') == 'checkbox')
		{
			$user_id = $this->session->userdata('user_session');
				$first_name = $this->input->post('first_name');
				$last_name = $this->input->post('last_name');
				$street = $this->input->post('address');
				$city = ($this->input->post('city'));
				$state = ($this->input->post('state'));
				$country = ($this->input->post('country'));
				$zipcode = ($this->input->post('zipcode'));
				$billing_info = array('user_id' => $user_id['id'],
									'first_name' => $first_name, //Just realised, we need first_name, last_name in both shipping and billing tables.
									'last_name' => $last_name,
									'street' => $street,
									'city' => $city,
									'state' => $state,
									'country' => $country,
									'zipcode' => $zipcode);

				$query = "INSERT into addresses(street, city, state, country, zipcode) values(?, ?, ?, ?, ?)";
			$values = array($billing_info['street'], $billing_info['city'], $billing_info['state'], $billing_info['country'], $billing_info['zipcode']);
			$this->db->query($query, $value);
			$address_id = $this->db->insert_id();

			$billing_info['address_id'] = $address_id;

			$query = "INSERT into billings(first_name, last_name, user_id, address_id) VALUES(?,?,?,?)";
			$values = array($billing_info['first_name'], $billing_info['last_name'], $billing_info['user_id'], $billing_info['address_id']);
			$this->db->query($query, $values);
		}

		else
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules("first_name", "First Name", "trim|required");
			$this->form_validation->set_rules("last_name", "Last Name", "trim|required");
			$this->form_validation->set_rules("address", "Address", "trim|required");
			$this->form_validation->set_rules("city", "City", "trim|required");
			$this->form_validation->set_rules("state", "State", "trim|required");
			$this->form_validation->set_rules("country", "Country", "trim|required");
			$this->form_validation->set_rules("zipcode", "Zipcode", "trim|required");

			if($this->form_validation->run() == false) 
			{
				$this->session->set_flashdata('errors', validation_errors());
			}
			else
			{
				$first_name = $this->input->post('first_name');
				$last_name = $this->input->post('last_name');
				$street = $this->input->post('address');
				$city = ($this->input->post('city'));
				$state = ($this->input->post('state'));
				$country = ($this->input->post('country'));
				$zipcode = ($this->input->post('zipcode'));
			}
			$user_id = $this->session->userdata('user_session');

			$shipping_info = array('user_id' => $user_id['id'],
									'first_name' => $first_name, //Just realised, we need first_name, last_name in both shipping and billing tables.
									'last_name' => $last_name,
									'street' => $street,
									'city' => $city,
									'state' => $state,
									'country' => $country,
									'zipcode' => $zipcode);

			$query = "INSERT into addresses(street, city, state, country, zipcode) values(?, ?, ?, ?, ?)";
			$values = array($shipping_info['street'], $shipping_info['city'], $shipping_info['state'], $shipping_info['country'], $shipping_info['zipcode']);
			$this->db->query($query, $value);
			$address_id = $this->db->insert_id();

			$shipping_info['address_id'] = $address_id;

			$query = "INSERT into shippings(first_name, last_name, user_id, address_id) VALUES(?,?,?,?)";
			$values = array($shipping_info['first_name'], $shipping_info['last_name'], $shipping_info['user_id'], $shipping_info['address_id']);
			$this->db->query($query, $values);
			}
		}
}