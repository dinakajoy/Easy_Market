<?php
    class Comments {
        private $db; 

        public function __construct() {
            $this->db = new Database;
        }
        public function addComment($data) {
            $this->db->query("INSERT INTO comments SET user_email = :user_email, PID = :PID, comment = :comment");
            $this->db->bind(':user_email', $data['user_email']);
            $this->db->bind(':PID', $data['PID']);
            $this->db->bind(':comment', $data['comment']);
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function getComments($data) {
            $this->db->query("SELECT `PID`, u.email as `user_email`, u.name as `name`, u.photo as   `photo`, c.comment, c.created_at 
                                FROM 
                                    comments c
                                LEFT JOIN
                                    users u ON u.email = c.user_email
                                WHERE 
                                    PID = :PID 
                                ORDER BY
                                    c.created_at DESC");
            $this->db->bind(':PID', $data);
            $results = $this->db->resultset();
            return $results;
        }
    }
?>