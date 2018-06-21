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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jq-3.2.1/dt-1.10.16/datatables.min.css"/>
  </head>
  <body>
    <!--ดึง navbarRander ด้านบนของเว็บมาแสดง-->
    <?php echo navbarRander(); ?>
    <div class="container" style="margin-top:100px">
      <!--เมนูด้านล่าง-->
      <div class="row">
          <div class="col-lg-12 col-md-6 text-center">
            <h4>จัดการผู้ดูแล</h4>
            <hr>
            <br>
            <a role="button" class="btn btn-lg btn-success" href="./addadmin.php"><i class="fa fa-plus"></i> เพิ่มผู้ดูแล</a>
            <br>
            <br>
          <table class="table table-hover" id="dt-tb'">
            <thead>
              <tr class="text-center">
                <th class="text-center" scope="col">#</th>
                <th class="text-center" scope="col">ชื่อผู้ใช้</th>
                <th class="text-center" scope="col">ชื่อ</th>
                <th class="text-center" scope="col">นามสกุล</th>
                <th class="text-center" scope="col">เพศ</th>
                <th class="text-center" scope="col">หมู่เลือด</th>
                <th class="text-center" scope="col">ตำบล</th>
                <th class="text-center" scope="col">อำเภอ</th>
                <th class="text-center" scope="col">จังหวัด</th>
                <th class="text-center" scope="col">สมครโดยใช้</th>
                <th class="text-center" scope="col">#</th>
              </tr>
            </thead>
            <tbody id="post-data">
            </tbody>
          </table>
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
      getUser("admin")

      $(document).ready(function() {
          $('#dt-tb').DataTable();
      } );
    </script>

  </body>
</html>
