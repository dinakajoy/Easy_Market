<?php 
  class Post {
    // DB stuff
    private $conn;
    private $table = 'chats';

    // Post Properties
    public $ChID;
    public $SID;
    public $RID;
    public $chat;

    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get Posts
    public function getFriends($id) {
      // Create query
      $query = 'SELECT r.name as reciever, c.created_at
                                FROM ' . $this->table . ' c
                                LEFT JOIN
                                  user r ON r.UID = c.RID
                                WHERE 
                                  c.SID = ?
                                ORDER BY
                                  p.created_at DESC';
      // Prepare statement
      $stmt = $this->conn->prepare($query);
      // Bind ID
      $stmt->bindParam(1, $this->id);
      // Execute query
      $stmt->execute();
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      // Set properties
      $this->id = $row['id'];
    } 
}