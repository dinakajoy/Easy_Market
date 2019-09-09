<?php
    class Ratings {
        private $db; 

        public function __construct() {
            $this->db = new Database;
        }

        public function countRatings() {
          $this->db->query('SELECT UID, PID, stars FROM reviews WHERE PID=:PID ORDER BY created DESC');
          $results = $this->db->resultset();
          return $results;
        }

        public function addRatings($data) {
            $this->db->query('INSERT INTO reviews SET UID = :UID, PID = :PID, stars = :stars');
            $this->db->bind(':UID', $data['UID']);
            $this->db->bind(':PID', $data['PID']);
            $this->db->bind(':stars', $data['stars']);

            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function getRatings() {
            $this->db->query('SELECT UID, PID, stars FROM reviews WHERE PID=:PID ORDER BY created DESC');
            $results = $this->db->resultset();
            return $results;
        }
    }
?>