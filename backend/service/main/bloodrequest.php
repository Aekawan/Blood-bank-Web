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
$hospitalname = $_POST['hospitalname'];
$hospitalphone = $_POST['hospitalphone'];
$casedescription = $_POST['casedescription'];
$time_delete = $_POST['time_delete'];
$status = 1;


//แปลงข้อมู,ที่ได้รับให้อยู่ในรูปแบบ array และเก็บไว้ใน ตัวแปร req
$req = compact("userid","title","firstname","lastname","sex","bloodtype","hospitalname","hospitalphone","casedescription","time_delete","status");
//ส่งค่าไปบันทึกใน postBloodRequest($req) โดยแนบค่า array ไปด้วย
$res = postBloodRequest($req);
//เช็ค่า
if($res == true ){
    $emails = getEmail($bloodtype);

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
          <p>ขณะนี้มีคนต้องการโลหิตซึ่งตรงกับหมู่เลือดของคุณ<p>
          <p>ผู้ขอโลหิตคือคุณ '.$firstname.' '.$lastname'<p>
          <p>หมู่เลือด '.$bloodtype.'<p>
          <p>สาเหตุที่ขอ '.$casedescription.'<p>
          <p>ซึ่งอยู่ ณ โรงพยาบาล '.$hospitalname.'<p>
          <p>สามารถติดต่อโรงพยาบาลเพื่อขอบริจาคโลหิตได้ที่เบอร์ '.$hospitalphone.'<p>
          <p>ขอบคุณครับ<p>
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
    //5ถ้าบันทึกไม่สำเร็จให้ไปหน้า bloodform.php เพื่อบันทึกใหม่
    header( "location: ../../../frontend/pages/bloodform.php?status=fail");
    exit(0);
}

?>
