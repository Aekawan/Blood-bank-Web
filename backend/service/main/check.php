<?php
session_start();
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include './main.service.php';
include '../function.service.php';
//รับค่ามาใส่ตัวแปร
$fid = $_POST['facebookid'];
$name = $_POST['facebookname'];
$firstname = $_POST['facebookfirstname'];
$lastname = $_POST['facebooklastname'];
$email = $_POST['facebookemail'];
$picture = $_POST['facebookpicture'];
$gender = $_POST['facebookgender'];
$verify = 1;
$provider = "facebook";
$status = "user";
$password = "";
//แปลงข้อมูลเป็น array
$req = compact("fid","name","password","firstname","lastname","email","picture","verify","provider","status","gander");
//เรียกฟังก์ชั่น และเมื่อรีเทินข้อมูลกลับมา เก็บข้อมูลไว้ใน $res และแนบค่า $req ไปด้วย
$res = goLoginWithFacebook($req);
//เช็คค่า
if($res != null){
    //สำเร็จ
    //ตัวแปร $res จะเป็นค่า array แปลงarray เป็น ตัวแปร เพื่อง่ายต่อการใช้
    extract($res);
    //เก็บตัวแปรลง sesseion เพื่อเอาไปใช้
    $_SESSION["username"] = $user_username;
    $_SESSION["status"] = $user_status;
    $_SESSION["userid"] = $user_id;
    $_SESSION["facebook_id"] = $facebook_id;
    $_SESSION["facebook_picture"] = $picture;
    $_SESSION["facebook_email"] = $email;
    $_SESSION["firstname"] = $firstname;
    $_SESSION["lastname"] = $lastname;
    $_SESSION["facebook_gender"] = $gender;
    //จากนั้นให้ไปยังหน้า profile
    $checkinfo = checkInfomation($user_id);
    if(isset($checkinfo) && $checkinfo == true){
      $_SESSION["verify"] = 1;
      header( "location: ../../../frontend/pages/profile.php" );
    } else {
      header( "location: ../../../frontend/pages/updateprofile.php" );
    }
    exit(0);
} else {

    $res = postRegister($req);
    if(isset($res) && $res != null){
        $res = goLoginWithFacebook($req);
        if(isset($res) && $res != null){
            extract($res);
            $_SESSION["username"] = $user_username;
            $_SESSION["status"] = $user_status;
            $_SESSION["userid"] = $user_id;
            $_SESSION["facebook_id"] = $facebook_id;
            $_SESSION["facebook_picture"] = $picture;
            $_SESSION["facebook_email"] = $email;
            $_SESSION["firstname"] = $firstname;
            $_SESSION["lastname"] = $lastname;
            $_SESSION["facebook_gender"] = $gender;
            header( "location: ../../../frontend/pages/updateprofile.php" );
        } else {
            header( "location: ../../../frontend/pages/updateprofile.php" );
        }

    }else {
        header( "location: ../../../frontend/pages/home.php" );
    }
    exit(0);
}
