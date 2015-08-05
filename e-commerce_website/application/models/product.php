<?php
class Product extends CI_Model {
  function singleproduct($name){ //gets all products matching the search term
    $query = "SELECT * from products where name like '%$name%' ";
    return $this->db->query($query)->result_array();
  }
  function count_records(){ //counts all records
    return $this->db->count_all("products");
  }
  function allproducts_onindex() { //allproduct for index page
    $query = "SELECT * from products";
    return $this->db->query($query)->result_array();
  }
  function allproducts($start, $limit) { //used for pagination
    $query = "SELECT * from products LIMIT ?,?";
    $values = array($start, $limit);
    return $this->db->query($query, $values)->result_array();
  }
  function getprice($start, $limit) { //get price by order 
    $query = "SELECT * from products order by price desc LIMIT ?,?";
    $values = array($start, $limit);
    return $this->db->query($query, $values)->result_array();
  }
  function sortprice_bycategory($id, $start, $limit) { //sort price by category 
    $query = "SELECT * from products where category_id=? order by price desc LIMIT ?,?";
    $values = array($id, $start, $limit);
    return $this->db->query($query, $values)->result_array();
  }
  function mostpopular($start, $limit) { //Most popular items
    $query = "SELECT products.id, products.name, products.image, products.price, SUM(orders.quantity) 
              from users 
              LEFT JOIN orders on orders.user_id = users.id 
              LEFT JOIN products on products.id = orders.product_id
              group by orders.product_id
              order by orders.quantity desc";
    $values = array($start, $limit);
    return $this->db->query($query, $values)->result_array();
  }
  function categories(){
    $query = "SELECT * from categories";
    return $this->db->query($query)->result_array();
  }
  // function pagination($id, $start, $limit){
  //   $query = "SELECT * from products where category_id=?";
  //   $value = array($id, $start, $limit);
  //   return $this->db->query($query, $value)->result_array();
  // }
  function singlecategory($id) {
    $query = "SELECT categories.name as categoryname, products.id, products.image,
               products.name, products.price from products
               left join categories on 
               categories.id = products.category_id where category_id = ?";
    $value = $id;
    return $this->db->query($query, $value)->result_array();
  }

}
?>