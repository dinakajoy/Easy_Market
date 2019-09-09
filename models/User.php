<?php
    class Users {
        private $db;
        private $table = users; 

        public function __construct() {
            $this->db = new Database;
        }

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

        public function getUser($data) {
            $this->db->query('SELECT
                                UID, email, name, phone, address, photo, password, created
                            FROM
                                users
                            WHERE
                                email = :email && password = :password');
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':password', $data['password']);
            $results = $this->db->single();
            return $results;
        }

        public function countUser($data) {
            $this->db->query('SELECT
                                UID, email, name, phone, address, photo, password, created 
                            FROM
                                users
                            WHERE
                                email = :email');
            $this->db->bind(':email', $data['email']);
            $results = $this->db->single();
            return $results;
        }
        
        public function getSellers() {
            $this->db->query('SELECT p.user_email as email, u.UID, u.name, u.photo, u.address, u.phone, u.created, p.created
                                FROM users u 
                            LEFT JOIN 
                                products p ON p.user_email = u.email 
                            WHERE 
                                p.user_email = u.email 
                            GROUP BY
                             p.user_email');
            $results = $this->db->resultset();
            return $results;
        }

        public function updateUser($data) {
            $this->db->query('UPDATE 
                                users
                            SET 
                                name =  email = :email, name = :name, phone = :phone, address = :address
                            WHERE 
                                UID = :UID');
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':phone', $data['phone']);
            $this->db->bind(':address', $data['address']);
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function deleteUser($data) {
            $this->db->query('DELETE FROM users WHERE UID = :UID');
            $this->db->bind(':id', $data['id']);
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }
?>