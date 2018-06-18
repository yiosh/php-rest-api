<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/Category.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $category = new Category($db);

  // Get ID
  $category->id = isset($_GET['id']) ? $_GET['id'] : die();

  // Get post
  $category->read_sigle();

  // Create array
  $category_arr = array(
    'id' => $category->id,
    'name' => $category->name
  );

  // Make JSON
  print_r(json_encode($category_arr));
