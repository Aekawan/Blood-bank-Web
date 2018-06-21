<?php
session_start();
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include './main.service.php';
include '../function.service.php';
//รับค่ามาใส่ตัวแปร
    $id = $_REQUEST['card_id'];
    //จากนั้นให้ไปยังหน้า profile
    $res = checkCardId($id);
    if($res == false){

      $data = res_success(null);

    } else {

      $data = res_error(404);

    }

sendJson($data);
?>
