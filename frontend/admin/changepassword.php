<?php
//ยังไม่เสร็จ
 session_start();

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
          <div class="card" style="height:520px">
            <div class="card-body mr-top-20">
              <div class="text-center">
                  <h3 class="card-title red-blood-color">โปรไฟล์ของฉัน</h3>
                </div>
                <div class="col-12 mr-bottom-30" style="border-bottom: 5px solid #B71C1C !important; ">
                </div>
                <div class="row justify-content-md-center">
                  <div class="col-lg-3">
                    <h4 class="text-center">เมนู</h4>
                    <div class="list-group">
                      <a href="./profile.php" class="list-group-item list-group-item-action">
                        ข้อมูลส่วนตัว
                      </a>
                      <a href="#" class="list-group-item list-group-item-action active">เปลี่ยนรหัสผ่าน</a>
                    </div>
                  </div>
                  <div class="col-lg-9 col-md-12">
                    <h4 class="text-center">เปลี่ยนรหัสผ่าน</h4>
                    <div class="row justify-content-md-center">
                      <div class="col-7 mr-bottom-20">
                        <i class="fa fa-key"></i> รหัสผ่านใหม่
                        <input type="text" class="form-control" name="newpassword" value="">
                      </div>
                      <div class="col-7 mr-bottom-20">
                        <i class="fa fa-lock"></i> กรอกรหัสผ่านใหม่อีกครั้ง
                        <input type="text" class="form-control" name="newpassword" value="">
                      </div>
                      <div class=" col-12 text-center">
                        <button type="button" class="btn btn-lg btn-success" name="button" style="width:150px">ยืนยัน</button>
                      </div>
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
    <script src="../js/script.js" charset="utf-8"></script>
  </body>
</html>
