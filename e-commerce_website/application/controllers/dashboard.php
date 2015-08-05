<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard extends CI_Controller {

	public function index()
	{	$this->load->model('model');
		$this->load->library('pagination');
		$config['base_url'] = '/dashboard/allusers/';
		$config['total_rows'] = $this->model->count_records();
		$config['per_page'] = 5; 
		$config['num_links'] = $config['total_rows']/$config['per_page'];
		$config["uri_segment"] = 3;
		$this->pagination->initialize($config);
		$links = $this->pagination->create_links();
		$this->load->view('dashboard', array('pagelinks' => $links));

	}

	public function allusers()
	{
		
		$this->load->model('model');
		$config['per_page'] = 5;
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$orders = $this->model->display(intval($page), $config['per_page']);
		$this->load->view('partials/allusers',array('details'=> $orders));
	}

	public function user($id)
	{
		$this->load->model('model');
		$details = $this->model->user($id); // gets the billing details
		//var_dump($details);die();
		$shipping_detail = $this->model->shipping($id); // gets the shipping address
		//var_dump($shipping_detail);die();
		$this->load->view('user_details',array('details' => $details,'shippings' => $shipping_detail));
	}

	public function username($name) 
	{
        $this->load->Model('model');
        $user_name = $this->model->getuser_by_name($name);
        //var_dump($user_name);die();
        $this->load->view('partials/user_name', array('users' => $user_name));
  	}

  	public function productname($name)
  	{
  	$this->load->Model('model');
  	$product_name = $this->model->getproduct_by_name($name);
  	//var_dump($product_name);die();
  	$this->load->view('partials/product_name', array('product' => $product_name));
  	}

  	public function get_by_order($order)
  	{
  		//var_dump($order);die();
  		$this->load->Model('model');
  		$user_orders = $this->model->getuser_by_order($order);
  		//var_dump($user_orders);die();
  		$this->load->view('partials/order_status', array('orders' => $user_orders));
  	}

  	public function products()
  	{
  		$this->load->model('model');
		$this->load->library('pagination');
		$config['base_url'] = '/dashboard/allproducts/';
		$config['total_rows'] = $this->model->count_products();
		$config['per_page'] = 5; 
		//$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$config['num_links'] = $config['total_rows']/$config['per_page'];
		$config["uri_segment"] = 3;
		$this->pagination->initialize($config);
		$links = $this->pagination->create_links();
  		$this->load->view('dashboard-products',array('pagelinks' => $links));
  	}

  	public function allproducts()
  	{
  		$config['per_page'] = 5;
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
  		$this->load->Model('model');
  		$products = $this->model->display_all_products(intval($page), $config['per_page']);
	  	//echo "controller"; var_dump($products);die();
		$this->load->view('partials/dashboard-allproducts',array('products'=> $products));
    }

  	public function add_product()
  	{
  		$this->load->Model('model');
  		$category_details = $this->model->category();
  		$this->load->view('addproduct',array('categories' => $category_details));
  	}

  	public function change_status($orderid)
  	{
  		//echo "controller" ; 
  		//var_dump($this->input->post());die();
  		$post = $this->input->post();
  		$this->load->Model('model');
  		$this->model->change_status($orderid,$post);
  		redirect('/dashboard');
    }

  	public function add_new_product()
  	{
 	  	$post = $this->input->post();
  		$this->load->Model('model');
  		$this->model->add_new_product($post);
  		redirect('/dashboard/products');
  	}

  	public function delete($id)
  	{
  		$this->load->Model('model');
  		$delete_details = $this->model->product_details($id);  
  		//var_dump($delete_details); die();
  		$this->load->view('partials/deleteproduct',array('delete'=>$delete_details));
  	}

  	public function delete_product($id)
  	{
  		$this->load->Model('model');
  		$this->model->delete_product($id);
  		redirect('/dashboard/products');
  	}

  	public function edit($id)
  	{
  		$this->load->Model('model');
  		$details = $this->model->product_details($id);  
  		$category_details = $this->model->category();	
  		$this->load->view('edit',array('details'=>$details,'categories' => $category_details));
  	}

  	public function update()
  	{
  		//var_dump($this->input->post());die();
  	 	$this->load->Model('model');
  	 	$this->model->update_product($this->input->post());
  	 	redirect('/dashboard/products');
  	}
}

