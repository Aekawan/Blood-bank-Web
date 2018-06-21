<?php
session_start();
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include './main.service.php';
include '../function.service.php';

$uid = isset($_GET['id']) ? $_GET['id'] : "all";
$status = $_GET['status'];
$user_id = $_SESSION['userid'];
//$profile_id = $_POST['profile_id'];

if ($uid != "all" ){
//ส่งค่าไปบันทึกใน postBloodRequest($req) โดยแนบค่า array ไปด้วย
$data = getUserById($uid,$status);

    if ($data != null){
      $res = res_success($data);
    } else {
      $res = res_error(404);
    }

} else {

  $data = getUser($status);
  if ($data != null){
    $res = res_success($data);
  } else {
    $res = res_error(404);
  }

}

sendJson($res);
?>
