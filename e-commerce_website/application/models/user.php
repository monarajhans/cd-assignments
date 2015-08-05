<?php
class User extends CI_Model {
  function insert_user($post)
  {
    $query = "INSERT INTO users (first_name, last_name, email, password, created_at)
             VALUES (?,?,?,?,now())";
    $values = array($post['first_name'], $post['last_name'], $post['email'], $post['password']);         
    $this->db->query($query, $values);
  }
  function get_user_by_email($post){
    $query = "SELECT * FROM users WHERE email = ?";
    $value = array($post);
    return $this->db->query($query, $value)->row_array();
  }
  function get_allfriends($id){
    $query = "SELECT users2.id as userId, users.id, SUM(friends.pokecount) as totalPokecount, count(friends.user_id) as friendcount, users.alias, users2.alias as friend_alias
              FROM users
              LEFT JOIN friends on users.id = friends.user_id
              LEFT JOIN users AS users2 ON users2.id = friends.friend_id
              where users.id=?
              group by users2.id
              order by pokecount desc;";
    $value = array($id);
    return $this->db->query($query, $value)->result_array();
  }
  function otherstoPoke($id) {
    $query = "SELECT users.id, users.name, users.alias, users.email, SUM(friends.pokecount) as totalPokecount
              FROM users
              LEFT JOIN friends on users.id = friends.user_id
              LEFT JOIN users AS users2 ON users2.id = friends.friend_id
              where users.id !=?
              group by friends.user_id";
    $value = array($id);
    return $this->db->query($query, $value)->result_array();
  }
  function addpoke($post, $id) {
    $query = "INSERT into friends (pokecount, user_id, friend_id) values (?,?,?)";
    $values = array($post['pokecount'], $post['friend_id'], $id);
    $this->db->query($query, $values);
  }
}
?>