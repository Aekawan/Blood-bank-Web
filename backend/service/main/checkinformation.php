<?php
session_start();
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include './main.service.php';
include '../function.service.php';
//รับค่ามาใส่ตัวแปร

    $user_id = $_SESSION["userid"];
    //จากนั้นให้ไปยังหน้า profile
    $checkinfo = checkInfomation($user_id);
    if(isset($checkinfo) && $checkinfo == true){
      $checkinfo = 1;
    } else {
      $checkinfo = 0;
    }
?>
