<?php
class staff {
    private $conn;
    private $table='staff';

    public $staff_id;
     public	$staff_first_name;
     public $staff_last_name;
     public  $address;
     public  $phone_no;
     public $email;
     public $image;
     public $designation_id;
     public $department_id;

public function __construct($db){
    $this->conn=$db;

}
public function read(){
    $query='SELECT staff_id,
    staff_first_name,staff_last_name,
    address,phone_no,email,image,designation_id,department_id 
    FROM
    '.$this->table.'
    ';
    $stmt=$this->conn->prepare($query);
    $stmt->execute();
    return $stmt;
}

public function read_single(){
    $query='SELECT staff_id,
    staff_first_name,staff_last_name,
    address,phone_no,email,image,designation_id,department_id 
    FROM
    '.$this->table.'
     id = ?
     LIMIT 0,1
    ';
    $stmt=$this->conn->prepare($query);
    $stmt->bindParam(1, $this->staff_id);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

          // Set properties
          $this->title = $row['title'];
          $this->body = $row['body'];
          $this->staff_id = $row['staff_id'];
}
}