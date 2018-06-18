<?php 
  class Category {
    // DB Stuff
    private $conn;
    private $table = 'categories';

    // Post Properties
    public $id;
    public $name;
    public $created_at;

    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get Categories
    public function read() {
      //Create query
      $query = 'SELECT id, name, created_at FROM ' . $this->table . ' ORDER BY created_at DESC';

      // Prepared statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }

    // Get Single 
    public function read_sigle() {
      $query = 'SELECT id, name FROM ' . $this->table . ' WHERE id = ? LIMIT 0,1';

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Bind ID
      $stmt->bindParam(1, $this->id);

      // Execute query
      $stmt->execute();

      $row = $stmt->fetch(PDO::FETCH_ASSOC);

      //Set properties
      $this->id = $row['id'];
      $this->name = $row['name'];
    }
  }