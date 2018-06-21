<?php
session_start();
//หน้าการบักทึกข้อมมูลการสมัครสมาชิก
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include './main.service.php';
include '../function.service.php';
 //รับข้อมูลมาใส่ตัวแปร

$status = "user";
$user_id = $_POST['userid'];
$id_card = $_POST['idcard'];
$title = $_POST['title'];
$myfirstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$sex = $_POST['sex'];
$picture = $_POST['picture'];
$bdate = $_POST['bdate'];
$bmonth = $_POST['bmonth'];
$byear = $_POST['byear'];
$birthday = strval($bdate)."/".strval($bmonth)."/".strval($byear);
$bloodtype = $_POST['bloodtype'];
$address = $_POST['address'];
$district = $_POST['district'];
$amphoe = $_POST['amphoe'];
$province = $_POST['province'];
$zipcode = $_POST['zipcode'];
$phone = $_POST['phone'];
$facebook = "http://www.facebook.com/".$_POST['facebook'];
$email = $_POST['email'];


    $req_postuserdetail = compact("user_id","id_card","title","myfirstname","lastname","sex","birthday","bloodtype","address","district","amphoe","province","zipcode","phone","facebook","email","picture");
    //เรียกฟังก์ชั่น และเมื่อรีเทินข้อมูลกลับมา เก็บข้อมูลไว้ใน $res_postuserdetail และแนบค่า $req_postuserdetail ไปด้วย
    $res_postuserdetail = postUserDetail($req_postuserdetail);
    if($res_postuserdetail == true ){
    $_SESSION["verify"] = 1;
        //ถ้าบึกทึกสำเร็จ ให้ไปหน้า login เพื่อให้ผูใช้ login
    header( "location: ../../../frontend/pages/profile.php");
    exit(0);
  } else {
    header( "location: ../../../frontend/pages/updateprofile.php");
  }




?>
