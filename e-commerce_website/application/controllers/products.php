<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    //$this->output->enable_profiler();
  }
  public function index() //shows all products
  {
    $this->load->Model('Product');
    $categories = $this->Product->categories();
    $this->load->view('products', array('allcategories' => $categories));  
  }
  public function allproducts() { //shows all products
    $this->load->Model('Product');
    $this->load->library('pagination');
    $config['base_url'] = '/products/allproducts/';
    $config['total_rows'] = $this->Product->count_records(); //gets the total number of records frm model
    $config['per_page'] = 8; 
    $config['num_links'] = $config['total_rows']/$config['per_page'];
    $config["uri_segment"] = 3;
    $this->pagination->initialize($config); // CI library
    $links = $this->pagination->create_links(); // create_links() is a CI library
    $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
    $results = $this->Product->allproducts(intval($page), $config['per_page']); //pass two parameters here
    $this->load->view('partials/allproducts', array('allproducts' => $results,
                                                    'pagelinks' => $links));
  }
  public function searchproduct($name) // searches the product by name
  { 
    $this->load->Model('Product');
    $search_product= $this->Product->singleproduct($name);
    $this->load->view('partials/searchproduct', array('searchallproducts'=> $search_product));
  }
  public function productbyprice()
  {
    $this->load->Model('Product');
    $this->load->library('pagination');
    $config['base_url'] = '/products/productbyprice/';
    $config['total_rows'] = $this->Product->count_records(); //gets the total number of records frm model
    $config['per_page'] = 8; 
    $config['num_links'] = $config['total_rows']/$config['per_page'];
    $config["uri_segment"] = 3;
    $this->pagination->initialize($config); // CI library
    $links = $this->pagination->create_links(); // create_links() is a CI library
    $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
    $productbyprice = $this->Product->getprice(intval($page), $config['per_page']); //pass two parameters here
    $this->load->view('partials/productbyprice', array('priceproducts' => $productbyprice,
                                                        'pagelinks' => $links));
  }
  public function mostpopular()
  {
    $this->load->Model('Product');
    $this->load->library('pagination');
    $config['base_url'] = '/products/mostpopular/';
    $config['total_rows'] = $this->Product->count_records(); //gets the total number of records frm model
    $config['per_page'] = 8; 
    $config['num_links'] = $config['total_rows']/$config['per_page'];
    $config["uri_segment"] = 3;
    $this->pagination->initialize($config); // CI library
    $links = $this->pagination->create_links(); // create_links() is a CI library
    $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
    $mostpopularitem = $this->Product->mostpopular(intval($page), $config['per_page']); //pass two parameters here
    $this->load->view('partials/mostpopular', array('mostpopular_items' => $mostpopularitem, 
                                                    'pagelinks' => $links));
  }

  public function category($id){
    $this->load->Model('Product');
    $this->load->library('pagination');
    $categories = $this->Product->categories();
    $category = $this->Product->singlecategory($id);
    //var_dump($category[0]['categoryname']);die();
    // $config['base_url'] = '/products/category/1';
    // $config['total_rows'] = count($category); //gets the total number of records of category
    // $config['per_page'] = 2; 
    // $config['num_links'] = $config['total_rows']/$config['per_page'];
    // $config["uri_segment"] = 4;
    // $this->pagination->initialize($config); // CI library
    // $links = $this->pagination->create_links(); // create_links() is a CI library
    // $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
    // $results = $this->Product->pagination($id, intval($page), $config['per_page']); //pass two parameters here
    //var_dump($results);die();
    $this->load->view('category', array('singlecategory' => $category, 
                                        'allcategories' => $categories,
                                        ));
  }
  public function sortprice_bycategory($id){
    $this->load->Model('Product');
    $this->load->library('pagination');
    $config['base_url'] = '/products/category/';
    $config['total_rows'] = $this->Product->count_records(); //gets the total number of records frm model
    $config['per_page'] = 4; 
    $config['num_links'] = $config['total_rows']/$config['per_page'];
    $config["uri_segment"] = 3;
    $this->pagination->initialize($config); // CI library
    $links = $this->pagination->create_links(); // create_links() is a CI library
    $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
    $sortbyprice = $this->Product->sortprice_bycategory($id, intval($page), $config['per_page']); //pass two parameters here
    $this->load->view('partials/sort_bycategory', array('pricebycategory' => $sortbyprice,
                                                        'pagelinks' => $links));
  }
  //Show page starts here 
  public function show($id)
  {
    $this->load->model('show');
    $product = $this->show->display_product($id);
    $similar_products = $this->show->similar_products($id);
    $this->load->view('show', array('product' => $product, 'similar_products' => $similar_products)); 
    //$this->load->view('index', array('product' => $product)); // Comment this.
  }
  public function update_cart($id)
  {
    $this->load->model('show');
    $this->show->update_cart($id);
    redirect('products/show/'. $id);
  }
  public function success()
  {
    $this->load->view("partials/partial_success_message");
  }
//Uncomment this.
  public function shopping_cart()
  {
    $this->load->model('show');
    $cart_products = $this->show->shopping_cart();
    $this->load->view('cart_info', array('cart_products' => $cart_products));
  }
  public function shipping()
  {
    $this->load->model('show');
    $this->show->shipping();
  }
  public function billing()
  {
    $this->load->model('show');
    $this->show->billing();
  }
  public function shipping_information()
  {
    $this->load->view("partials/partial_shipping_information");
  }
  public function billing_information()
  {
    $this->load->view("partials/partial_billing_information");
  }
  public function payment()
  {
    $this->load->view('payment');
  }

  public function google()
  {
    $this->load->view('google_places');
  }
}

