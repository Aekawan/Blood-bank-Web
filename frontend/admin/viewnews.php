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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jq-3.2.1/dt-1.10.16/datatables.min.css"/>
  </head>
  <body>
    <!--ดึง navbarRander ด้านบนของเว็บมาแสดง-->
    <?php echo navbarRander(); ?>
    <div class="container" style="margin-top:100px">
      <!--เมนูด้านล่าง-->
      <div class="row">
        <div class="col-lg-12" id="news">
          <div class="card text-center">
           <div class="card-header text-left" id="news-header">

           </div>
           <div class="card-body" id="news-body">

           </div>
           <div class="card-footer text-muted">
             <?php if (isset($_SESSION['status']) && $_SESSION['status'] == "admin") { ?>
           <a role="button" class="btn btn-warning" href="./editarticle.php?id=<?php echo $_GET['id']?>">แก้ไข</a>
           <a role="button" class="btn btn-danger" href="./editarticle.php?id=<?php echo $_GET['id']?>">ลบ</a>
         <?php } ?>
           </div>
           </div>
           <br>
           <br>
        </div>

    </div>
    <div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <script src="../js/admin.js" charset="utf-8"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jq-3.2.1/dt-1.10.16/datatables.min.js"></script>
    <script type="text/javascript">
      getNewsbyId(<?php echo $_GET['id']?>)
    </script>

  </body>
</html>
