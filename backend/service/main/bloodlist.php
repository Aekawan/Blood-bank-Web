<?php

//หน้าเรียกฟังก์ชั่นดึงข้อมูลผู้ที่มาลงประกาศหาโลหิต
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include './main.service.php';
include '../function.service.php';

//เรียกฟังก์ชั่น และเมื่อรีเทินข้อมูลกลับมา เก็บข้อมูลไว้ใน $res
$res = getbloodList();

if($res != null){
    //ถ้ามีข้อมูลในเรียกฟังก์ชั่น res_success(ส่งค่า $res ที่รับมา) จะได้รับข้อมูล array ที่มีค่า success มา
    $data = res_success($res);
} else {
    //5ถ้า error ก็ส่งค่า error กลับไปให้ หน้า ui
    $data = res_error($res);
}
//เมื่อดึงมาข้อมูลจะเป็น array ต้องแปลง เป็น json เพื่อให้หน้า ui เรียกใช้ผ่าน ajax ได้ ajax คือ $.getJson ในไฟล์ js/script.js
sendJson($data);

?>
