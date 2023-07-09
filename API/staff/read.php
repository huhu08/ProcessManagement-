<?php
header('Access-Control-Allow-Origin:*');
header ('Content-type:application/json');

include_once'../../config/database.php';
include_once'../../models/staff.php';

$database =new database();
$db=$database->connect();
$staff=new staff($db);
$result=$staff->read();
$num=$result->rowCount();

if ($num>0){
$staff_arr=array();
$staff_arr['data']=array();
while($row=$result->fetch(PDO::FETCH_ASSOC)){
    extract($row);
    $staff_item=array(
        'staff_id'=>$staff_id,
        'staff_first_name'=>$staff_first_name,
        'staff_last_name'=>$taff_last_name,
        'body' => html_entity_decode($body)
    );

    array_push($staff_arr, $staff_item);

   
}
echo json_encode($staff_arr);

}else
{
    echo json_encode(
        array('message' => 'No staff Found')
      );

}

