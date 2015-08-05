<?php
class model extends CI_Model { 

public function display($start, $limit)
{
    //echo"model"; var_dump($start); var_dump($limit); die();
    $query = "SELECT orders.id,orders.created_at,users.first_name,orders.status,
             concat(addresses.street,' ',addresses.city,' ',addresses.state,
             ' ',addresses.zipcode) as user_address,users.id as user_id, products.price,orders.quantity,
             (products.price*orders.quantity) as total_row,products.id as product_id
             FROM orders
             LEFT JOIN products
             ON products.id = orders.product_id
             LEFT JOIN users 
             ON users.id = orders.user_id
             LEFT JOIN billings
             ON users.id = billings.user_id
             LEFT JOIN addresses
             ON addresses.id = billings.address_id
             LIMIT ?,?";
    $values = array($start, $limit);
    return $this->db->query($query,$values)->result_array();        
}

public function count_records()
{
    return $this->db->count_all("users");
}

public function count_products()
{
    return $this->db->count_all("products");
}
public function change_status($orderid,$post)
{
    $query ="UPDATE orders SET orders.status=? 
             WHERE orders.id =?";
    $values = array($post['status-change'],$orderid);
    $this->db->query($query,$values);
}
public function user($id)
{
  //var_dump($id);die();
  $query = "SELECT orders.id,orders.created_at,users.first_name,orders.status,
            addresses.street,addresses.city,addresses.state,addresses.country,
            addresses.zipcode,users.id as user_id, products.id as product_id,
            products.price,products.name,orders.quantity,
            (products.price*orders.quantity) as total_row
            FROM orders
            LEFT JOIN products
            ON products.id = orders.product_id
            LEFT JOIN users 
            ON users.id = orders.user_id
            LEFT JOIN billings
            ON users.id = billings.user_id
            LEFT JOIN addresses
            ON addresses.id = billings.address_id
            WHERE users.id = ?
            GROUP BY users.id";
  $values = $id;
  return $this->db->query($query,$values)->result_array();
}
public function shipping($id)
{
  $query = "SELECT users.first_name,addresses.street,addresses.city,addresses.state,addresses.country,
            addresses.zipcode 
            FROM addresses
            LEFT JOIN shippings
            ON shippings.address_id = addresses.id
            LEFT JOIN users
            ON users.id = shippings.user_id";
    $values = $id;
    return $this->db->query($query,$values)->row_array();
}
public function getuser_by_name($name)
{
    $query = "SELECT orders.id,orders.created_at,users.first_name,orders.status,
             concat(addresses.street,' ',addresses.city,' ',addresses.state,' ',addresses.country,
             ' ',addresses.zipcode) as user_address,users.id as user_id, products.price,orders.quantity,
             (products.price*orders.quantity) as total_row
             FROM orders
             LEFT JOIN products
             ON products.id = orders.product_id
             LEFT JOIN users 
             ON users.id = orders.user_id
             LEFT JOIN billings
             ON users.id = billings.user_id
             LEFT JOIN addresses
             ON addresses.id = billings.address_id
             WHERE users.first_name = ?";
    $values = array($name);
    return $this->db->query($query,$values)->result_array();    
}
public function getproduct_by_name($name)
{
    $query = "SELECT products.id,products.name,products.inventory,products.quantity_sold,
              products.image_thumbnail,products.description
              FROM products 
              WHERE products.name = ?";
    $values = $name;
    return $this->db->query($query,$values)->row_array();    
}
// public function getuser_by_id($id)
// {
//     //echo"model";var_dump($id);die();
//     $query = "SELECT orders.id,orders.created_at,users.first_name,orders.status,
//              concat(addresses.street,' ',addresses.city,' ',addresses.state,' ',addresses.country,
//              ' ',addresses.zipcode) as user_address,users.id as user_id, products.price,orders.quantity,
//              (products.price*orders.quantity) as total_row
//              FROM orders
//              LEFT JOIN products
//              ON products.id = orders.product_id
//              LEFT JOIN users 
//              ON users.id = orders.user_id
//              LEFT JOIN billings
//              ON users.id = billings.user_id
//              LEFT JOIN addresses
//              ON addresses.id = billings.address_id
//              WHERE users.id = ?";
//     $values = $id;
//     return $this->db->query($query,$values)->result_array();    
// }
public function getuser_by_order($order)
{
    $query = "SELECT orders.id,orders.created_at,users.first_name,orders.status,
             concat(addresses.street,' ',addresses.city,' ',addresses.state,' ',addresses.country,
             ' ',addresses.zipcode) as user_address,users.id as user_id, products.price,orders.quantity,
             (products.price*orders.quantity) as total_row
             FROM orders
             LEFT JOIN products
             ON products.id = orders.product_id
             LEFT JOIN users 
             ON users.id = orders.user_id
             LEFT JOIN billings
             ON users.id = billings.user_id
             LEFT JOIN addresses
             ON addresses.id = billings.address_id
             WHERE orders.status = ?";    
    $values = array($order);
    return $this->db->query($query,$values)->result_array();
}
public function display_all_products($start, $limit)
{
    $query = "SELECT products.id,products.name,products.inventory,products.quantity_sold,products.image_thumbnail
              FROM products
              LIMIT ?,?";
    $values = array($start, $limit);
    return $this->db->query($query,$values)->result_array();

}
public function product_details($id)
{
    $query = "SELECT products.id,products.name,products.inventory,products.quantity_sold,
              products.image_thumbnail,products.description,categories.name as category_name,
              products.category_id as category_id
              FROM products 
              LEFT JOIN categories
              ON categories.id = products.category_id
              WHERE products.id = ?";
    $values = $id;
    return $this->db->query($query,$values)->row_array();    
}
public function delete_product($id)
{
    $query ="SET foreign_key_checks = 0";
    $query1 = "DELETE FROM products
              WHERE products.id=? ";
    $values = $id;
    $this->db->query($query);
    $this->db->query($query1,$values);
}
public function update_product($post)
{
    $image = '/assets/'.$post['pic'];
    //echo "model"; var_dump($image);die();
    $query = "UPDATE products SET products.name=?,products.description = ?,
              products.category_id =? ,products.image_thumbnail=?
              WHERE products.id =?";
    $values = array($post['name'],$post['description'],$post['category'],$image,$post['product_id']);
    $this->db->query($query,$values);
}
public function category()
{
    $query = "SELECT categories.id,categories.name 
              FROM categories";
    return $this->db->query($query)->result_array();
}
public function add_new_product($post)
{
   $image = '/assets/'.$post['pic'];
   $image_left ='/assets/'.$post['pic-left'];
   $image_right ='/assets/'.$post['pic-right'];
   $image_top ='/assets/'.$post['pic-top'];
   $image_bottom ='/assets/'.$post['pic-bottom'];
   //echo "model"; var_dump($image);die();
   $query = "INSERT INTO products (name,description,category_id,price,image_thumbnail,image_left,
             image_right,image_top,image_bottom)
             VALUES (?,?,?,?,?,?,?,?,?)";
   $values = array($post['name'],$post['description'],$post['category'],$post['price'],$image,
             $image_left,$image_right,$image_top,$image_bottom);
   $this->db->query($query,$values);
}
}

?>