<?php
session_start();
include './main.service.php';
include '../function.service.php';

//รับค่ามาใส่ตัวแปร

function checkinfo()
{
  $user_id = $_SESSION["userid"];
  //จากนั้นให้ไปยังหน้า profile
  $checkinfo = checkInfomation($user_id);
  if(isset($checkinfo) && $checkinfo == true){
    $checkinfo = false;
  } else {
    $checkinfo = true;

  }
  return $checkinfo;
}

?>
