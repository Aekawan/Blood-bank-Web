<?php
//หน้าการบักทึกข้อมมูลการสมัครสมาชิก
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include './main.service.php';
include '../function.service.php';
 //รับข้อมูลมาใส่ตัวแปร
$topic = $_POST['topic'];
$type = $_POST['type'];
//$img_preview = basename($_FILES["img_preview"]["name"]);
//$img_full= basename($_FILES["img_full"]["name"]);
$detail = $_POST['detail'];
$slid_on = $_POST['slid_on'];



$target_dir = "../../uploads/";
$target_file = $target_dir . basename($_FILES["img_preview"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$temp = explode(".", $_FILES["img_preview"]["name"]);
$img_preview = round(microtime(true)) . '.' . end($temp);
move_uploaded_file($_FILES["img_preview"]["tmp_name"], "../../uploads/" .$img_preview);

$target_file2 = $target_dir . basename($_FILES["img_full"]["name"]);
$uploadFullOk = 1;
$imageFileType2 = pathinfo($target_file2,PATHINFO_EXTENSION);
$temp = explode(".", $_FILES["img_full"]["name"]);
$img_full = round(microtime(true)) . '.' . end($temp);
move_uploaded_file($_FILES["img_full"]["tmp_name"], "../../uploads/" . $img_full);



//แปลงตัวแปรให้เป็นarray เพื่อง่ายต่อการส่งข้อมูล
$req = compact("topic","type","img_preview","img_full","detail","slid_on");

//เรียกฟังก์ชั่นบึกทึกข้อมูล และข้อมู,ที่รีเทินมาจะเป็น lastid เพื่อที่จะเอาไว้บึกทึกต่อในตาราง detail เป็นฟอเรนคีย์
$res = postNews($req);

if ($res != null) {
//  echo $res;
  header( "location: ../../../frontend/admin/viewnews.php?id=".$res."&status=new");
  exit(0);
} else {
  //echo $res;
    //ถ้าไม่สำเร็จให้ไปสมัครใหม่
  header( "location: ../../../frontend/addmin/addarticle.php?status=fail");
  exit(0);
}


?>
