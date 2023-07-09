<?php
header('Access-Control-Allow-Origin:*');
header ('Content-type:application/json');

include_once'../../config/database.php';
include_once'../../models/staff.php';

$database =new database();
$db=$database->connect();
$staff=new staff($db);
$staff->staff_id = isset($_GET['id']) ? $_GET['id'] : die();
$staff->read_single();
$staff_arr = array(
    'id' => $staff->staff_id,
    'title' => $staff->title,
    'body' => $staff->body,
    'author' => $staff->author,
    'staff_id' => $staff->staff_id,
   
  );

  // Make JSON
  print_r(json_encode($staff_arr));

?>