<?php
//หน้าการบักทึกข้อมมูลการสมัครสมาชิก
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include './main.service.php';
include '../function.service.php';

$user_dt_id = $_POST['id'];
$id_card = $_POST['idcard'];
$title = $_POST['title'];
$myfirstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$sex = $_POST['sex'];
$bdate = $_POST['bdate'];
$bmonth = $_POST['bmonth'];
$byear = $_POST['byear'];
$birthday = $birthday = strval($bdate)."/".strval($bmonth)."/".strval($byear);
$bloodtype = $_POST['bloodtype'];
$address = $_POST['address'];
$district = $_POST['district'];
$amphoe = $_POST['amphoe'];
$province = $_POST['province'];
$zipcode = $_POST['zipcode'];
$phone = $_POST['phone'];
$facebook = $_POST['facebook'];
$email = $_POST['email'];
//$picture = $_POST['picture'];


    //แปลงข้อมูลที่จะบันทึกในตาราง userdetail เป็น array
    $req = compact("user_dt_id","id_card","title","myfirstname","lastname","sex","birthday","bloodtype","address","district","amphoe","province","zipcode","phone","facebook","email");
    //เรียกฟังก์ชั่น และเมื่อรีเทินข้อมูลกลับมา เก็บข้อมูลไว้ใน $res_postuserdetail และแนบค่า $req_postuserdetail ไปด้วย
    $res = editUser($req);
    if($res == true ){
          header( "location: ../../../frontend/admin/usermanagement.php?status=new");
      } else {
          header( "location: ../../../frontend/pages/usermanagement.php?status=fail");
    }


?>
