<?php
//เปิดใช้งาน session เพื่อเก็บค่าไว้ใช้ทุกหน้า
 session_start();
 if (isset($_SESSION["status"]) && $_SESSION["status"] != "admin"){
    header( "location: ../../index.php");
 }
 //เช็คว่ามีการเก็บ userid ไว้มั้ย ถ้าไม่มีแสดงว่า ยังไม่ได้ login ให้กลับไปหน้า login
 if(!isset($_SESSION['userid'])) {
   header( "location: ./login.php?status=pleaselogin");
    exit(0);
 }
 //ดึงไฟล์ header มาใช้งาน
 include '../component/header.php';
 include '../helper/helper.php';

 $newid = genNewID($_GET['id']);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!--echo ค่าต่างๆที่อยู่ใน ฟังก์ชั่น headerRender สามารถดูฟังก์ชั่นได้ใน component/header.php-->
    <?php  echo headerRander("Blood For Life") ?>
  </head>
  <body>
    <!-- echo ค่าต่างๆในฟังก์ชั่น navbarRander สามารถดูฟังก์ชั่นได้ใน component/header.php  -->
    <?php echo navbarRander(); ?>
    <div class="container" style="margin-top:80px">
      <div class="row">
        <div class="col mr-top-20 mr-bottom-20" >
          <div class="card">
            <div class="card-body mr-top-20">
              <div class="text-center">
                  <h3 class="card-title red-blood-color">ข้อมูลสมาชิก</h3>
                </div>
                <div class="col-12 mr-bottom-30" style="border-bottom: 5px solid #B71C1C !important; ">
                </div>
                <div class="row justify-content-md-center">
                  <div class="col-lg-12 col-md-12">
                    <h4 class="text-center">ข้อมูลส่วนตัว</h4>
                    <br>
                    <h5 class="text-center"><i class="fa fa-id-card"> </i> <?php echo "รหัสประจำตัวผู้บริจาค"." ".$newid; ?></h5>
                      <!---ข้อมูลส่วนตัว ข้อมูลส่วนตัวต่างๆ จะถูกดึงมาดึงในหน้านี้ โดยใช้ ajax ดึงข้อมูลมา ข้อมูลจะถูกเขียนลงในแท็กที่มี  id="profile"-->
                    <div class="row justify-content-md-center" id="profile">
                      </div>
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
    <!--เรียกไฟล์ script.js ดึงการ ajax ข้อมูลจะอยู่ใน ไฟล์นี้ ajax คือการดึงข้อมูลจาก backend-->
    <script src="../js/script.js" charset="utf-8"></script>
    <script type="text/javascript">
      //เรียกฟังกืชั่น getProfile เพื่อไปดึงข้อมูลส่วนตัว โดยใช้ id ของผู้ใช้ เป็นตัว WHERE เพื่อดึงเฉพาะข้อมูลส่วนตัวของคนที่ login มาแสดงในแท็กที่มี id="profile" การทำงานของฟังก์ชั่นสามารถดูได้ที่ /js/script.js
      getProfile(<?php echo $_GET['id'];?>)
    </script>
  </body>
</html>
