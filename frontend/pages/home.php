<?php
//หน้า home เป็นหรน้าแรก
//เปิด session
  session_start();
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
      <div class="row">
        <div class="col mr-top-10" >
          <!--ดึง slideimage มาแสดง-->
          <div class="img-slide" id="img_slide">
            <div><img class="d-block w-100 img-fluid" src="../assets/braner.png" style="" alt="First slide"></div>
          </div>
        </div>
      </div>
      <!--เมนูด้านล่าง-->
      <div class="row mr-top-20">
          <div class="col-lg-3 col-md-6 text-center">
            <?php if(isset($_SESSION['userid'])) { ?>
              <a href="./profile.php">
              <img class="rounded-circle mr-bottom-10 img-rotate" src="../assets/regis.png" style="background-color:#ffffff; width:150px" alt="">
              </a>
              <h4>โปรไฟล์ของฉัน</h4>
             <?php } else { ?>
               <a href="./register.php">
               <img class="rounded-circle mr-bottom-10 img-rotate" src="../assets/regis.png" style="background-color:#ffffff; width:150px" alt="">
               </a>
               <h4>สมัครสมาชิก</h4>
                <?php } ?>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
            <a href="./bloodlist.php">
            <img class="rounded-circle  mr-bottom-10 img-rotate" src="../assets/blood.png" style="background-color:#ffffff; width:150px" alt="">
            </a>
            <h4>ผู้ต้องการโลหิต</h4>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
            <a href="./donationplace.php">
              <img class="rounded-circle mr-bottom-10 img-rotate" src="../assets/bloodplace.png" style="background-color:#ffffff; width:150px" alt="">
            </a>
            <h4>สถานที่บริจาคโลหิต</h4>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
            <a href="./learning.php">
            <img class="rounded-circle mr-bottom-10 img-rotate" src="../assets/book.png" style="background-color:#ffffff; width:150px" alt="">
          </a>
            <h4>เรียนรู้</h4>
          </div>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <!--ดึง lib ที่เอาไว้สร้าง slie มาใช้-->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script src="../js/script.js" charset="utf-8"></script>
    <!-- echo สิ่งที่จำเป็น ในการสร้าง slide มาใช้-->
    <script type="text/javascript">
    $(document).ready(function(){
      $('.img-slide').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        dots: true,
      });
    });

    $.getJSON("../../backend/service/main/getnews.php?id=all", function( response ) {
         let item = response.data;
      $.each(item,function(i,data){
        if (data.slid_on == 1){
          $newslide = `<div><img class="d-block w-100 img-fluid" src="../../backend/uploads/${data.img_full}"  style="height:300px" alt="First slide"></div>`;
         // Add new slide
        $('.img-slide').slick('slickAdd', $newslide);
       }
       });
     });
    </script>
  </body>
</html>
