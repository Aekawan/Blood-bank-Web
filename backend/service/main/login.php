<?php
session_start();
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include './main.service.php';
include '../function.service.php';
//รับค่ามาใส่ตัวแปร
$username = $_POST['username'];
$password = $_POST['password'];
//แปลงข้อมูลเป็น array
$req = compact("username","password");
//เรียกฟังก์ชั่น และเมื่อรีเทินข้อมูลกลับมา เก็บข้อมูลไว้ใน $res และแนบค่า $req ไปด้วย
$res = goLogin($req);
//เช็คค่า
if($res != null){
    //สำเร็จ
    //ตัวแปร $res จะเป็นค่า array แปลงarray เป็น ตัวแปร เพื่อง่ายต่อการใช้
    extract($res);
    //เก็บตัวแปรลง sesseion เพื่อเอาไปใช้
    $_SESSION["username"] = $user_username;
    $_SESSION["status"] = $user_status;
    $_SESSION["userid"] = $user_id;
    $_SESSION["verify"] = 1;

    if($user_status == "user"){
      //จากนั้นให้ไปยังหน้า profile
      header( "location: ../../../frontend/pages/profile.php" );
      exit(0);
    } else {
      //จากนั้นให้ไปยังหน้า profile
      header( "location: ../../../frontend/admin/dashboard.php");
      exit(0);
    }

} else {
    //ไม่สำเร็จ ให้ไปหน้า login ใหม่
    header( "location: ../../../frontend/pages/login.php?status=loginfail" );
    exit(0);
}


?>
