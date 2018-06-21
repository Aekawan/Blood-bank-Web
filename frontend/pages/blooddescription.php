<?php
//เป็นหน้าการแสดงข้อมูลคนขอเลือด
  session_start();
  include '../component/header.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php echo headerRander("Blood For Life") ?>
    <style media="screen">
    #map {
            height: 330px;
            width: 100%;
    }
    </style>
  </head>
  <body>
    <?php echo navbarRander(); ?>
    <div class="container" style="margin-top:80px">
      <div class="row">
        <div class="col mr-top-20 mr-bottom-20" >
          <div class="card h-100" style="">
            <div class="card-body mr-top-20">
              <div class="text-center">
                <!--รายละเอียดต่างๆจะถูกดึงมาแสดง ตาม tag id ต่างๆ-->
                  <h3 class="card-title red-blood-color">รายละเอียดผู้ต้องโลหิต</h3>
                </div>
                <div class="col-12 mr-bottom-30" style="border-bottom: 5px solid #B71C1C !important; ">
                </div>
                <div class="row">
                  <div class="col-lg-6 col-md-12">
                    <div class="row">
                      <div class="col-12">
                        <!--แสดง username ใน id username-->
                        <h3 class="red-blood-color" id="username"></h3>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6">
                          <br>
                          <!--แสดงกรุ๊ปเลือด ใน id = bloodtype-->
                        <h5 id="bloodtype"> </h5>
                      </div>

                    </div>
                    <div class="row">
                      <div class="col-lg-12">
                          <br>
                          <!--แสดงกรุ๊ปเลือด ใน id = bloodtype-->
                        <h5 id="phone"> </h5>
                      </div>

                    </div>
                    <div class="row">
                      <div class="col-lg-12">
                          <br>
                          <!--แสดงกรุ๊ปเลือด ใน id = bloodtype-->
                        <h5 id="email"> </h5>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-12">
                          <br>
                          <!--แสดงกรุ๊ปเลือด ใน id = bloodtype-->
                        <h5 id="facebook"> </h5>
                      </div>

                    </div>
                    <div class="row">
                      <div class="col-lg-12">
                          <br>
                          <!--แสดงชื่อโรงพยาบาล -->
                        <h5 id="hospitalname"></h5>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-12">
                          <br>
                          <!--แสดงเบอโทรศัพท์-->
                        <h5 id="hospitalphone"></h5>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-12">
                          <br>
                          <!--แสดง case สาเหตุ-->
                        <h5 id="casedescription"></h5>
                      </div>

                    </div>
                    <div class="row">
                      <div class="col-lg-12">
                          <br>
                          <!--แสดง case สาเหตุ-->
                        <h5 id="date"></h5>
                      </div>

                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                  <div id="map"></div>
                </div>
            </div>
            <div class="row">
              <div class="col-12 text-center">
                <hr>
                <a role="button" href="./bloodlist.php"  class="btn btn-lg btn-secondary mr-right-20" name="button">ย้อนกลับ</a>
                <button type="button" class="btn btn-lg btn-red-blood" onclick="alert('คุณสามารถช่วยเหลือได้โดยการไปยังโรงพยาบาลที่ผู้ป่วยอยู่ และรระบุผู้รับโลหิตเป็นชื่อผู้ป่วย')" name="button">ช่วยเหลือ</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <!--ดึงไฟล์ script.js มาใช้-->
    <script src="../js/script.js" charset="utf-8"></script>
    <script>
     //ฟังก์ชั่นการดึงข้อมูลจากของคนป่วยจาก backend มาลงตาม id ต่างๆ โดยใช้ id ของผู้ป่วยดึงมา และแสดงแผนที่ตามโรงพยาบาลที่ผู้ป่วยอยู่
      getblood(<?php echo $_GET['bloodid']; ?>)

    </script>
    <!--เรียนก lib แผนที่มาใช้-->
    <script defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDcS4tW92A-9ZCVWTcUbVIeEp0k-PPwmk">
    </script>
  </body>
</html>
