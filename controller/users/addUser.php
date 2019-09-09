<?php 
  // include database files
  // require_once 'config/db_config.php';
  // require_once 'config/db_conn.php';
  // require_once 'models/User.php';
  class User {
    public function addUser($data) {
      $this->db->query('INSERT INTO users (email, name, phone, address, photo, password) VALUES (:email, :name, :phone, :address, :photo, :password)');
      $this->db->bind(':email', $data['email']);
      $this->db->bind(':name', $data['name']);
      $this->db->bind(':phone', $data['phone']);
      $this->db->bind(':address', $data['address']);
      $this->db->bind(':photo', $data['photo']);
      $this->db->bind(':password', $data['password']);
      
      if($this->db->execute()) {
          return true;
      } else {
          return false;
      }
    }
  }
?>