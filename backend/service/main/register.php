<?php
//หน้าการบักทึกข้อมมูลการสมัครสมาชิก
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include './main.service.php';
include '../function.service.php';
 //รับข้อมูลมาใส่ตัวแปร
$firstname = $_POST['username'];
$password = $_POST['password'];
$fid = 0;
$status = isset($_POST['status']) ? $_POST['status'] : "user";
$provider = "username";
$verify = 1;

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
$picture = $_POST['picture'];





//แปลงตัวแปรให้เป็นarray เพื่อง่ายต่อการส่งข้อมูล
$req_postregister = compact("fid","firstname","password","provider","verify","status");

//เรียกฟังก์ชั่นบึกทึกข้อมูล และข้อมู,ที่รีเทินมาจะเป็น lastid เพื่อที่จะเอาไว้บึกทึกต่อในตาราง detail เป็นฟอเรนคีย์
$user_id = postRegister($req_postregister);

if ($user_id != null) {
    //แปลงข้อมูลที่จะบันทึกในตาราง userdetail เป็น array
    $req_postuserdetail = compact("user_id","id_card","title","myfirstname","lastname","sex","birthday","bloodtype","address","district","amphoe","province","zipcode","phone","facebook","email");
    //เรียกฟังก์ชั่น และเมื่อรีเทินข้อมูลกลับมา เก็บข้อมูลไว้ใน $res_postuserdetail และแนบค่า $req_postuserdetail ไปด้วย
    $res_postuserdetail = postUserDetail($req_postuserdetail);
    if($res_postuserdetail == true ){
      if ($status == "admin") {
          header( "location: ../../../frontend/admin/adminmanagement.php?status=new");
      } else {
        //ถ้าบึกทึกสำเร็จ ให้ไปหน้า login เพื่อให้ผูใช้ login
        header( "location: ../../../frontend/pages/login.php?status=new");
      }
    exit(0);
} else {
    //ถ้าไม่สำเร็จให้ไปสมัครใหม่
    if ($status == "admin") {
      header( "location: ../../../frontend/admin/addadmin.php");
      exit(0);
    } else {
      header( "location: ../../../frontend/pages/register.php");
    }
}
} else {
    //ถ้า error ให้ไปยังหน้าสมัครใหม่
    if ($status == "admin") {
      header( "location: ../../../frontend/admin/addadmin.php");
      exit(0);
    } else {
      header( "location: ../../../frontend/pages/register.php");
    }
}


?>
