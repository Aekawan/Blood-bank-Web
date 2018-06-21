<?php
 //เปิด session
 session_start();
 //เช็คว่ามีการ login หรือยัง ถ้าแล้วให้ไปยังหน้า home.php
 if(isset($_SESSION['userid'])) {
   header( "location: ./home.php");
    exit(0);
 }
 //ดึงไฟล์ hearder มาใช้
 include '../component/header.php';
 //เช็คว่ามี parameter ส่งมากับ url ไหม เช่น login.php?status=new แสดงว่าเป็นการสมัครสามากชิกใหม่ อและมีอื่นๆ
 $status = isset($_GET['status']) ? $_GET['status'] : '';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!--echo ข้อมูลใน function header-->
    <?php echo headerRander("Blood For Life") ?>
  </head>
  <body>
    <!--echo navbar ด้านบนสุด-->
    <?php echo navbarRander(); ?>
    <div class="container" style="margin-top:80px">
      <div class="row justify-content-md-center">
        <?php
        //เช็คสถานที่ส่งมากับ url ว่เป้นสถานะไหน ให้แสดง alert ตามสถานที่ส่งมา ถ้าไม่มีสถานะก็จะไม่มีอะไรแสดง
         if ($status == "new") {
           ?>
           <div class="col-12">
             <div class="alert alert-primary" role="alert">
               ลงทะเบียนสำเร็จ
             </div>
           </div>
        <?php
         }
         if ($status == 'loginfail') {
        ?>
        <div class="col-12">
          <div class="alert alert-primary" role="alert">
            ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง
          </div>
        </div>
        <?php
         }
        if ($status == 'pleaselogin') {
       ?>
       <div class="col-12">
         <div class="alert alert-primary" role="alert">
           กรุณาเข้าสู่ระบบ เพื่อใช้งาน
         </div>
       </div>
       <?php
        }
       ?>
        <div class="col-lg-6 mr-top-20 mr-bottom-20" >
          <div class="card">
            <div class="card-body mr-top-20">
              <div class="text-center">
                  <h3 class="card-title red-blood-color">ลงชื่อเข้าใช้</h3>
                </div>
                <div class="col-12 mr-bottom-30" style="border-bottom: 5px solid #B71C1C !important; ">
                </div>
                <div class="row">
                  <div class="col-lg-12 col-md-12">
                    <!--ส่งข้อมูลในฟอร์มไปที่ไฟล์ login.php เพื่อเช็คว่า login ผ่านไหม-->
                  <form class="" action="../../backend/service/main/login.php" method="post">
                      <div class="form-group">
                        <label for="inputUsername">ชื่อผู้ใช้</label>
                        <input type="text" name="username" class="form-control" id="inputUsername"  placeholder="ชื่อผู้ใช้ เช่น bloodman2017">
                      </div>
                      <div class="form-group">
                        <label for="inputPassword">รหัสผ่าน</label>
                        <input type="password" name="password" class="form-control" id="inputPassword" placeholder="รหัสผ่าน 8 ตัวขึ้นไป">
                      </div>
                      <div class="text-center mr-top-20">
                        <a role="button" href="./home.php" class="btn btn-lg btn-secondary">กลับหน้าแรก</a>
                        <!--คลิกเข้าสู่ระบบข้อมูลในฟอร์มจะถูกส่งไปยังไฟล์ login.php --->
                        <button type="submit" class="btn btn-lg btn-red-blood" style="width:150px">เข้าสู่ระบบ</button>
                      </div>
                    </form>
                </div>
                <div class="col-12 text-right">
                  <!--ถ้ายังไม่ได้ลงทะเบียน คลิกปุ่มลงทะเบียนตรงนี้ได้-->
                  <hr>
                    ยังไม่ได้ลงทะเบียน?&nbsp;<a href="./register.php" role="button" class="btn btn-outline-success">ลงทะเบียนฟรี</a>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  </body>
</html>
