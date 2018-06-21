<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");


require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
include './main.service.php';
include '../function.service.php';

//รับข้อมูลที่ถกส่งมาจาก from
$userid = $_POST['userid'];
$title = $_POST['title'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$sex = $_POST['sex'];
$bloodtype = $_POST['bloodtype'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$facebook = $_POST['facebook'];
$address = $_POST['address'];
$amphoe = $_POST['amphoe'];
$district = $_POST['district'];
$province = $_POST['province'];
$zipcode = $_POST['zipcode'];
$hospital_id = $_POST['hospital_id'];
$casedescription = $_POST['casedescription'];
$time_delete = $_POST['time_delete'];
$status = 1;


//แปลงข้อมู,ที่ได้รับให้อยู่ในรูปแบบ array และเก็บไว้ใน ตัวแปร req
$req = compact("userid","title","firstname","lastname","sex","bloodtype","phone","email","facebook","address","amphoe","district","province","zipcode","hospital_id","casedescription","time_delete","status");
//ส่งค่าไปบันทึกใน postBloodRequest($req) โดยแนบค่า array ไปด้วย
$res = postBlood($req);

if ($res != null || $res != false) {
    print_r($res);
    $fname = $res['post_profile']['firstname'];
    $lname = $res['post_profile']['lastname'];
    $blood_type = $res['post_profile']['blood_type'];
    $cd = $res['case_description'];
    $hname = $res['hospital']['hospital_name'];
    $hphone = $res['hospital']['hospital_phone'];
    $userphone = $res['post_profile']['phone'];
    $useremail = $res['post_profile']['email'];
    $userfacebook = $res['post_profile']['facebook'];

    $emails = getEmail($bloodtype,$hospital_id);

    if($emails != null){

    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
    try {
        //Server settings

        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.sendgrid.net';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'apikey';                 // SMTP username
        $mail->Password = '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';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;
        $mail->CharSet = "utf-8";                                   // TCP port to connect to

        //Recipients
        $mail->setFrom('sendmail@bloodforlife.com', 'Blood For Life');
        $mail->addAddress('aekawan.ks@gmail.com');
        foreach ($emails as $key => $email) {
        $mail->addAddress($email['email']);               // Name is optional
        }

        // Message
        $message = '
        <html>
        <head>
          <title>ขณะนี้มีคนกำลังต้องการโลหิตซึ่งตรงกับหมู่เลือดของคุณ</title>
        </head>
        <body>
          <p>ขณะนี้มีคนต้องการโลหิตซึ่งตรงกับหมู่เลือดของคุณ</p>
          <p>----------------------- ข้อมูลผู้ขอโลหิต ---------------------------</p>
          <p>ผู้ขอโลหิตคือคุณ '.$fname.' '.$lname.'</p>
          <p>หมู่เลือด '.$blood_type.'</p>
          <p>สาเหตุที่ขอ '.$cd.'</p>
          <p>-----------------โรงพยาบาลที่อยู่ขอโลหิตอยู่ -------------------------</p>
          <p>ซึ่งอยู่ ณ โรงพยาบาล '.$hname.'</p>
          <p>สามารถติดต่อโรงพยาบาลเพื่อขอบริจาคโลหิตได้ที่เบอร์ '.$hphone.'</p>
          <p>---------------- ข้อมูลการติดต่อผู้ขอโลหิต ---------------------------</p>
          <p>เบอร์ติดต่อ '.$userphone.'</p>
          <p>อีเมล '.$useremail.'</p>
          <p>เฟสบุ๊ค '.$userfacebook.'</p>
          <p>ขอบคุณครับ</p>
        </body>
        </html>
        ';

        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = '[Blood For Life] ขณะนี้มีผู้ต้องการโลหิตซึ่งตรงกับหมู่เลือดของคุณ';
        $mail->Body    = $message;
        $mail->AltBody = 'testmail';

        $mail->send();
        //echo 'Message has been sent';
        header( "location: ../../../frontend/pages/bloodlist.php?status=success");
    } catch (Exception $e) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
  }
    header( "location: ../../../frontend/pages/bloodlist.php?status=success");

    exit(0);
  } else {
    header( "location: ../../../frontend/pages/bloodlist.php?status=success&email=null");

    exit(0);
  }
} else {
    //5ถ้าบันทึกไม่สำเร็จให้ไปหน้า bloodform.php เพื่อบันทึกใหม่
    header( "location: ../../../frontend/pages/bloodlist.php?status=fail");
    exit(0);
}




?>
