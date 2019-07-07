<?php
    class Users {
        private $db; 

        public function __construct() {
            $this->db = new Database;
        }

        public function addUser($data) {
            // Prepare Query
            $this->db->query('INSERT INTO users (email, name, phone, address, photo, password) VALUES (:email, :name, :phone, :address, :photo, :password)');
            // Bind Values
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':phone', $data['phone']);
            $this->db->bind(':address', $data['address']);
            $this->db->bind(':photo', $data['photo']);
            $this->db->bind(':password', $data['password']);
            // Execute
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function getUsers($data) {
            // Prepare Query
            $this->db->query('SELECT
                                `UID`, `email`, `name`, `phone`, `address`, `photo`, `password`, `created`
                            FROM
                                users' );
            // Execute
            $results = $this->db->resultset();
            return $results;
        }

        public function getUser($data) {
            // Prepare Query
            $this->db->query('SELECT
                                `UID`, `email`, `name`, `phone`, `address`, `photo`, `password`, `created`
                            FROM
                                users
                            WHERE
                                email = :email && password = :password
                            LIMIT 0,1');
            // Bind Values
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':password', $data['password']);
             // Execute
            $results = $this->db->single();
            return $results;
        }

        public function countUser($data) {
            // Prepare Query
            $this->db->query('SELECT
                                `UID`, `email`, `name`, `phone`, `address`, `photo`, `password`, `created` 
                            FROM
                                users
                            WHERE
                                email = :email');
            // Bind Values
            $this->db->bind(':email', $data['email']);
             // Execute
            $results = $this->db->rowCount();
            return $results;
        }

        public function updateUser($data) {
            // Prepare Query
            $this->db->query('UPDATE 
                                users
                            SET 
                                name =  email = :email, name = :name, phone = :phone, address = :address, address = :address, photo = :photo, password = :password 
                            WHERE 
                                UID = :UID');
            // Bind Values
            $this->db->bind(':UID', $data['UID']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':phone', $data['phone']);
            $this->db->bind(':address', $data['address']);
            $this->db->bind(':photo', $data['photo']);
            $this->db->bind(':password', $data['password']);
            // Execute
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function deleteUser($data) {
            // Prepare Query
            $this->db->query('DELETE FROM users WHERE UID = :UID');
            // Bind Values
            $this->db->bind(':id', $data['id']);
            // Execute
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function getSellers() {
            // Prepare Query
            $this->db->query('SELECT p.user_email as email, u.name, u.photo, u.address, u.phone, u.created, p.created
                                FROM users u 
                            LEFT JOIN 
                                products p ON p.user_email = u.email 
                            WHERE 
                                p.user_email = u.email 
                            GROUP BY
                             p.user_email');
             // Execute
            $results = $this->db->resultset();
            return $results;
        }
    }
?>