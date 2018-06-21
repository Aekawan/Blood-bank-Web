<?php
session_start();
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include './main.service.php';
include '../function.service.php';


$news_id = $_GET['id'];
$page = $_GET['page'];


//$profile_id = $_POST['profile_id'];


//ส่งค่าไปบันทึกใน postBloodRequest($req) โดยแนบค่า array ไปด้วย
$res = deleteNews($news_id);
if ($page == "1"){
  if ($res != null){
     header( "location: ../../../frontend/admin/news.php?status=deletesuccess");
  } else {
     header( "location: ../../../frontend/admin/news.php?status=deletefail");
  }
} else {
  if ($res != null){
     header( "location: ../../../frontend/admin/learning.php?status=deletesuccess");
  } else {
     header( "location: ../../../frontend/admin/learning.php?status=deletefail");
  }
}



?>
