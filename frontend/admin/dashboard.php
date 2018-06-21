<?php
//หน้า home เป็นหรน้าแรก
//เปิด session
  session_start();

  if (isset($_SESSION["status"]) && $_SESSION["status"] != "admin"){
     header( "location: ../../index.php");
  }

  //ดึงไฟล์ hearder มาใช้
  include '../component/header.php';
  //ดึงไฟล์ที่ใช้สร้าง slide หน้าแรกมาใช้
  include '../component/slideimage.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!--ดึงค่า header มาแสดง-->
    <?php echo headerRander("Blood For Life") ?>
  </head>
  <body>
    <!--ดึง navbarRander ด้านบนของเว็บมาแสดง-->
    <?php echo navbarRander(); ?>
    <div class="container" style="margin-top:80px">
      <!--เมนูด้านล่าง-->
      <div class="row">
          <div class="col-lg-4 col-md-6 text-center">

              <a href="./postmanagement.php">
              <img class="rounded-circle mr-bottom-10 img-rotate" src="https://image.flaticon.com/icons/svg/603/603596.svg" style="background-color:#ffffff; width:150px" alt="">
              </a>
              <h4>จัดการโพส</h4>

          </div>
          <div class="col-lg-4 col-md-6 text-center">
            <a href="./news.php">
            <img class="rounded-circle  mr-bottom-10 img-rotate" src="https://image.flaticon.com/icons/svg/254/254025.svg" style="background-color:#ffffff; width:150px" alt="">
            </a>
            <h4>จัดการข่าวประชาสัมพันธ์ <?php ?></h4>
          </div>
          <div class="col-lg-4 col-md-6 text-center">
            <a href="./learning.php">
              <img class="rounded-circle mr-bottom-10 img-rotate" src="https://image.flaticon.com/icons/svg/139/139257.svg" style="background-color:#ffffff; width:150px" alt="">
            </a>
            <h4>จัดการความรู้เกี่ยวกับโลหิต</h4>
          </div>
          <div class="col-lg-4 col-md-6 text-center">
            <a href="./usermanagement.php">
            <img class="rounded-circle mr-bottom-10 img-rotate" src="https://image.flaticon.com/icons/svg/149/149072.svg" style="background-color:#ffffff; width:150px" alt="">
          </a>
            <h4>จัดการสมาชิก</h4>
          </div>
          <div class="col-lg-4 col-md-6 text-center">
            <a href="./adminmanagement.php">
            <img class="rounded-circle mr-bottom-10 img-rotate" src="https://image.flaticon.com/icons/svg/149/149074.svg" style="background-color:#ffffff; width:150px" alt="">
          </a>
            <h4>จัดการผู้ดูแล</h4>
          </div>
          <div class="col-lg-4 col-md-6 text-center">
            <a href="./hospitalmanagement.php">
            <img class="rounded-circle mr-bottom-10 img-rotate" src="https://image.flaticon.com/icons/svg/619/619051.svg" style="background-color:#ffffff; width:150px" alt="">
          </a>
            <h4>จัดการโรงพยาบาล</h4>
          </div>
          <div class="col-lg-4 col-md-6 text-center">
            <a href="./chart.php">
            <img class="rounded-circle mr-bottom-10 img-rotate" src="https://image.flaticon.com/icons/svg/138/138339.svg" style="background-color:#ffffff; width:150px" alt="">
          </a>
            <h4>สรุป</h4>
          </div>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <!--ดึง lib ที่เอาไว้สร้าง slie มาใช้-->
    <script type="text/javascript" src="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.min.js"></script>
    <!-- echo สิ่งที่จำเป็น ในการสร้าง slide มาใช้-->
    <?php echo slideimageJS()?>
  </body>
</html>
