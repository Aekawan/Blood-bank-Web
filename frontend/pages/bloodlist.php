<?php
//หน้าแสดงคนที่ต้องการโลหิต
//เปิด session
  session_start();
//ดึง header.php มาใช้
 include '../component/header.php';
//เช็คว่ามีอะไรส่งมากับ url หรือไม่ เช่น bloodlist.php?status=success มีคำว่า success ส่งมา
 $status = isset($_GET['status']) ? $_GET['status'] : '';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
   <?php echo headerRander("Blood For Life") ?>
  </head>
  <body>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = 'https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v2.11&appId=1292037427567316';
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

    <?php echo navbarRander(); ?>
    <div class="container" style="margin-top:80px">
      <div class="row">
        <!--เช็คว่า status เป็นคำว่าอะไร ถ้า success ให้ขึ้น alert ว่าเพิ่มข้อมูลสำเร็จ-->
        <?php if($status == 'success') {
        ?>
        <div class="col-12 mr-bottom-20">
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <strong>คุณได้ทำการร้องขอโลหิตเรียบร้อย!</strong> หวังว่าคุณจะได้รับความช่วยเหลือจากผู้ที่มีจิตสาธารณะ เร็วๆนี้
          </div>
        </div>
        <?php
        } ?>
        <div class="col-12 text-center mr-top-20">
          <h2 class="red-blood-color">ผู้ที่ต้องการโลหิต</h2>
        </div>
        <div class="col-12 text-center">
          <a role="button" href="./bloodform.php" class="btn btn-lg btn-outline-success mr-top-20 mr-bottom-20" name="button">ลงประกาศร้องขอโลหิต</a>
        </div>
      </div>
      <!--ดึงข้อมูล bloodlist มาเขียนลงใน เท็กที่มี id = bloodlist-->
      <div class="row mr-top-20 mr-top-20" id="bloodlist">
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <!--เรียน script.js มาใช้ ด้านในจะเป็น ฟังก์การดึงข้อมูลแบบ ajax และการทำงานต่างๆ-->
    <script src="../js/script.js" charset="utf-8"></script>
    <script type="text/javascript">
     deletePostTime()
    //ดึงฟังก์ชั่น bloodlist มาใช้ ด้านในจะเป็นวิธีการดึงข้อมูล และเขียนขอมูลลง tag id= bloodlist
      bloodList(<?php echo $page = isset($_GET['page']) ? $_GET['page'] : 1  ?>);
    </script>
  </body>
</html>
