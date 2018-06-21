<?php
//หน้าดึงโรงพยาบาลโดยใช้ชื่อโรงพยาบาล
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include './main.service.php';
include '../function.service.php';
//รับค่ามาใส่ตัวแปร
$req = $_REQUEST['id'];
//เรียกฟังก์ชั่น และเมื่อรีเทินข้อมูลกลับมา เก็บข้อมูลไว้ใน $res และแนบค่า $req ไปด้วย
$res = getHospitalById($req);
//เช็คค่า
if($res != null){
    //สำเร็จ
    $data = res_success($res);
} else {
    //ไม่สำเร็จ
    $data = res_error($res);
}
//เมื่อดึงมาข้อมูลจะเป็น array ต้องแปลง เป็น json เพื่อให้หน้า ui เรียกใช้ผ่าน ajax ได้ ajax คือ $.getJson ในไฟล์ js/script.js
sendJson($data);

?>
