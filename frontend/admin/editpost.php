<?php
//หน้าสำหรับการลงประกาศหาโลหิต
//เปิด session
  session_start();
  if (isset($_SESSION["status"]) && $_SESSION["status"] != "admin"){
     header( "location: ../../index.php");
  }

  $verify = isset($_SESSION["verify"]) ? $_SESSION["verify"] : 0;
  if (isset($verify) && $verify != 1 ){
      header( "location: ./updateprofile.php");
  }
//เช็คว่า login แล้วยัง ถ้ายัง ให้ไปหน้า login เพื่อ login ก่อใช้
  if(!isset($_SESSION['userid'])) {
    header( "location: ./login.php?status=pleaselogin");
     exit(0);
  }

  include '../component/header.php';
  include '../component/slideimage.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php echo headerRander("Blood For Life") ?>
  </head>
  <body>
    <?php echo navbarRander(); ?>
    <div class="container" style="margin-top:80px">
      <div class="row">
        <div class="col mr-top-20 mr-bottom-20" >
          <div class="card">
            <div class="card-body mr-top-20">
              <div class="text-center">
                  <h3 class="card-title red-blood-color">แก้ไขโพสขอรับโลหิต</h3>
                </div>
                <div class="col-12 mr-bottom-30" style="border-bottom: 5px solid #B71C1C !important; ">
                </div>
                <div class="row justify-content-md-center">
                  <div class="col-lg-8 col-md-12">

                    <!--ฟอร์มการส่งข้อมูล ไป insert ใน db โดยส่งข้อมูลไปในไฟล์ bloodrequest.php -->
                  <form class="" action="../../backend/service/main/editpost.php" method="post">
                    <input type="hidden" name="userid" value="<?php echo $_SESSION['userid']; ?>">
                    <div id="autofill">
                      <hr>

                    </div>
                    <div class="row justify-content-md-center mr-top-30 mr-bottom-50">
                      <div class="col-12 mr-bottom-30" style="border-bottom: 5px solid #B71C1C !important; ">
                      </div>
                      <div class="col-lg-4 col-md-4 text-center mr-top-20 mr-bottom-30">
                        <a href="../index.php" class="btn btn-lg btn-secondary" role="button"  name="button" style="width:200px" >ยกเลิก</a>
                      </div>
                      <div class="col-lg-4 col-md-4 text-center mr-top-20 mr-bottom-30">
                        <button class="btn btn-danger btn-lg btn-red-blood" type="submit" name="button" style="width:200px"  >ยืนยัน</button>
                      </div>
                    </div>
                    </div>
                  </form>
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
    <!-- เรียก library fill ตำบล อำเภอ จังหวัด อัตโนมิต -->
    <script type="text/javascript" src="../thailand/dependencies/JQL.min.js"></script>
    <script type="text/javascript" src="../thailand/dependencies/typeahead.bundle.js"></script>
    <script type="text/javascript" src="../thailand/dist/jquery.Thailand.min.js"></script>
    <script src="../js/script.js" charset="utf-8"></script>
    <script>
    //ถ้าขอให้คนอื่นจะส่งหน้าฟอร์มที่ไม่มีข้อมูลมา
    editPost(<?php echo $_GET['postid']; ?>);

    </script>
</html>
