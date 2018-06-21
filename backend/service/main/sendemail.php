<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
include './main.service.php';
include '../function.service.php';

$id = $_REQUEST['post_id'];

//$res = sendMail($postid);
$post = getPostbyId($id);


if ($post != null || $post != false) {

    $bloodtype = $post['post_profile']['blood_type'];
    $hospital_id = $post['hospital']['hospital_id'];

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
          <p>ผู้ขอโลหิตคือคุณ '.$post['post_profile']['firstname'].' '.$post['post_profile']['lastname'].'</p>
          <p>หมู่เลือด '.$post['post_profile']['blood_type'].'</p>
          <p>สาเหตุที่ขอ '.$post['case_description'].'</p>
          <p>-----------------โรงพยาบาลที่อยู่ขอโลหิตอยู่ -------------------------</p>
          <p>ซึ่งอยู่ ณ โรงพยาบาล '.$post['hospital']['hospital_name'].'</p>
          <p>สามารถติดต่อโรงพยาบาลเพื่อขอบริจาคโลหิตได้ที่เบอร์ '.$post['hospital']['hospital_name'].'</p>
          <p>---------------- ข้อมูลการติดต่อผู้ขอโลหิต ---------------------------</p>
          <p>เบอร์ติดต่อ '.$post['post_profile']['phone'].'</p>
          <p>อีเมล '.$post['post_profile']['email'].'</p>
          <p>เฟสบุ๊ค '.$post['post_profile']['facebook'].'</p>
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
        $res = res_success(true);
    } catch (Exception $e) {
        $res = res_error(404);
  }

  } else {
    $res = res_success(true);

  }
} else {
    //5ถ้าบันทึกไม่สำเร็จให้ไปหน้า bloodform.php เพื่อบันทึกใหม่
    $res = res_error(404);

}


sendJson($res);

?>
