<?php
session_start();
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include './main.service.php';
include '../function.service.php';


$post_id = $_GET['post_id'];
$user_id = $_SESSION['userid'];
//$profile_id = $_POST['profile_id'];


//ส่งค่าไปบันทึกใน postBloodRequest($req) โดยแนบค่า array ไปด้วย
$res = deletePost($post_id,$user_id);

if ($res != null){
   if($_SESSION['status'] == "admin"){
   header( "location: ../../../frontend/admin/postmanagement.php?status=success");
    } else {
   header( "location: ../../../frontend/pages/mypost.php?status=success");
    }
} else {
    if($_SESSION['status'] == "admin"){
      header( "location: ../../../frontend/pages/admin/postdetail.php?id=".$post_id."&status=fail");
   } else {
      header( "location: ../../../frontend/pages/management.php?id=".$post_id."&status=fail");
   }
}

sendJson($res);
?>
