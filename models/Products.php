<?php
    class Products {
        private $db; 

        public function __construct() {
            $this->db = new Database;
        }

        public function addProduct($data) {
            // Prepare Query
            $this->db->query('INSERT INTO products SET user_email = :user_email, prod_name = :prod_name, prod_image = :prod_image, prod_desc = :prod_desc, prod_price= :prod_price');
            // Bind Values
            $this->db->bind(':user_email', $data['user_email']);
            $this->db->bind(':prod_name', $data['prod_name']);
            $this->db->bind(':prod_image', $data['prod_image']);
            $this->db->bind(':prod_desc', $data['prod_desc']);
            $this->db->bind(':prod_price', $data['prod_price']);

            // Execute
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function getProducts() {
            // Prepare Query
            $this->db->query('SELECT p.PID, u.email as user_email, p.prod_name, p.prod_image, p.prod_desc, p.prod_price, p.created 
                                FROM products p
                              LEFT JOIN
                                users u ON u.email = p.user_email
                              ORDER BY
                                p.created DESC' );
            // Execute
            $results = $this->db->resultset();
            return $results;
        }

        public function sellersProducts($data) {
          // Prepare Query
          $this->db->query('SELECT PID, user_email, prod_name, prod_image, prod_desc, prod_price, created 
                              FROM products 
                            WHERE
                              user_email = :email
                            ORDER BY
                              created DESC' );
          $this->db->bind(':email', $data['email']);
          // Execute
          $results = $this->db->resultset();
          return $results;
        }

        public function getProduct($data) {
            // Prepare Query
            $this->db->query('SELECT p.PID, u.email as user_email, p.prod_name, p.prod_image, p.prod_desc, p.prod_price, p.created 
                              FROM products p
                            LEFT JOIN
                              users u ON u.email = p.user_email
                            WHERE
                              p.PID = :PID 
                            LIMIT 0,1');
            // Bind Values
            $this->db->bind(':PID', $data['PID']);
             // Execute
            $results = $this->db->single();
            return $results;
        }

        public function countProduct($data) {
            // Prepare Query
            $this->db->query('SELECT p.PID, u.email as user_email, p.prod_name, p.prod_image, p.prod_desc, p.prod_price, p.created 
                              FROM products p
                            LEFT JOIN
                              users u ON u.email = p.user_email');
            // Bind Values
            $this->db->bind(':user_email', $data['user_email']);
             // Execute
            $results = $this->db->rowCount();
            return $results;
        }

        public function updateProduct($data) {
            // Prepare Query
            $this->db->query('UPDATE products
                              SET user_email = :user_email, prod_name = :prod_name, prod_image = :prod_image, prod_desc = :prod_desc, prod_price = :prod_price
                            WHERE PID = :PID');
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

        public function deleteProduct($data) {
            // Prepare Query
            $this->db->query('DELETE FROM products WHERE PID = :PID');
            // Bind Values
            $this->db->bind(':id', $data['id']);
            // Execute
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }
?>



<?php 

  //   // Create Post
  //   public function create_product() {
  //     $photo = $_FILES["prod_image"]["name"];
  //     $temp = $_FILES["prod_image"]["tmp_name"];
  //     $size = $_FILES["prod_image"]["size"];
  //     $type = $_FILES["prod_image"]["type"]; //file name "txt_file" 
  //     $path = "../img/products/"; //set upload folder
  //     $imgExt = strtolower(pathinfo($photo, PATHINFO_EXTENSION));
  //     $pt = "../img/products/" .$photo;
  //     move_uploaded_file($temp, '../img/products/'.$photo);
      
  //         // Clean data
  //         $this->user_email = htmlspecialchars(strip_tags($this->user_email));
  //         $this->prod_name = htmlspecialchars(strip_tags($this->prod_name));
  //         $this->prod_image = htmlspecialchars(strip_tags($this->prod_image));
  //         $this->prod_image = move_uploaded_file($temp, '../img/products/'.$this->prod_image);
  //         $this->prod_desc= htmlspecialchars(strip_tags($this->prod_desc));
  //         $this->prod_price = htmlspecialchars(strip_tags($this->prod_price));
  //     }
  //     // Print error if something goes wrong
  //     printf("Error: %s.\n", $stmt->error);
  //     return false;
  //   }

  //   // Update Post
  //   public function update_product() {
  //         // Create query
  //         $query = 'UPDATE ' . $this->table . '
  //                     SET user_email = :user_email, prod_name = :prod_name, prod_image = :prod_image, prod_desc = :prod_desc, prod_price = :prod_price
  //                   WHERE PID = :PID';
  //         // Prepare statement
  //         $stmt = $this->conn->prepare($query);
  //         // Clean data
  //         $this->user_email = htmlspecialchars(strip_tags($this->user_email));
  //         $this->prod_name = htmlspecialchars(strip_tags($this->prod_name));
  //         $this->prod_image = htmlspecialchars(strip_tags($this->prod_image));
  //         $this->prod_desc = htmlspecialchars(strip_tags($this->prod_desc));
  //         $this->prod_price = htmlspecialchars(strip_tags($this->price));
  //         $this->PID = htmlspecialchars(strip_tags($this->PID));
  //         // Bind data
  //         $stmt->bindParam(':user_email', $this->user_email);
  //         $stmt->bindParam(':prod_name', $this->prod_name);
  //         $stmt->bindParam(':prod_image', $this->prod_image);
  //         $stmt->bindParam(':prod_desc', $this->prod_desc);
  //         $stmt->bindParam(':prod_price', $this->prod_price);
  //         $stmt->bindParam(':PID', $this->PID);
  //         // Execute query
  //         if($stmt->execute()) {
  //           return true;
  //         }
  //         // Print error if something goes wrong
  //         printf("Error: %s.\n", $stmt->error);
  //         return false;
  //   }

  //   // Delete Post
  //   public function delete_product() {
  //         // Create query
  //         $query = 'DELETE FROM ' . $this->table . ' WHERE PID = :PID';
  //         // Prepare statement
  //         $stmt = $this->conn->prepare($query);
  //         // Clean data
  //         $this->PID = htmlspecialchars(strip_tags($this->PID));
  //         // Bind data
  //         $stmt->bindParam(':PID', $this->PID);
  //         // Execute query
  //         if($stmt->execute()) {
  //           return true;
  //         }
  //         // Print error if something goes wrong
  //         printf("Error: %s.\n", $stmt->error);
  //         return false;
  //   }
    
  // }

  ?>