<?php
//หน้าแสดงแผนที่ และข้อมูลสถานที่บริจาคโลหิต
//เปิด session
 session_start();
 include '../component/header.php';
 include '../component/slideimage.php';

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php echo headerRander("Blood For Life") ?>
    <style media="screen">
    #map {
            height: 500px;
            width: 100%;
    }
    </style>
  </head>
  <body>
    <?php echo navbarRander(); ?>
    <div class="container" style="margin-top:80px">
      <div class="row">
        <div class="col mr-top-20 mr-bottom-20" >
          <div class="card">
            <div class="card-body mr-top-20">
              <div class="text-center">
                  <h3 class="card-title red-blood-color">สถานที่รับบริจาคโลหิต</h3>
                </div>
                <div class="col-12 mr-bottom-30" style="border-bottom: 5px solid #B71C1C !important; ">
                </div>
                <div class="row justify-content-md-center">
                  <div class="col-lg-12 col-md-12">
                    <div class="col text-center">
                      <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <h5>ขณะนี้ระบบสามารถแสดงสถานที่รับบริจาคโลหิต เฉพาะจังหวัดภูเก็ต เท่านั้น!!</h5>
                      </div>
                    </div>
                    <div class="row mr-top-30">
                    <!--
                    <div class="col-lg-12">
                      <div class="col-12 text-center mr-top-20">
                        <h5>รายละเอียดสถานรับบริจาคโลหิต</h5>
                      </div>
                      <div id="hospitaldata" class="row">
                      </div>
                    </div>
                  -->
                      <div class="col-lg-12">
                        <div class="col-12 text-center">
                          <h5>แผนที่แสดงตำแหน่งสถานที่บริจาคโลหิต (คลิกที่หมุดเพื่อดูข้อมูล)</h5>
                        </div>
                        <!--สำหรับแสดงแผนที่-->
                        <div id="map"></div>
                      </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="col-12 text-center mr-top-10 mr-bottom-20">
          <h5>รายละเอียดสถานรับบริจาคโลหิต</h5>
        </div>
        <!--แสดงรายละเอียดโรงพยาบาลใน tag นี้ โดยอ้างอิง id=hospitaldata ข้อมูลจะถูกถึงมาเบียนในนี้เท่าัน้น-->
        <div id="hospitaldata" class="row">
        </div>
      </div>
    </div>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <!--ดึงไฟล์ scriopt.js มาใช้ ด้านในจะรวมฟังก์การดึงข้อมูลจาก backend มาใช้-->
    <script src="../js/script.js" charset="utf-8"></script>
    <!--ดึง lib google map มาใช้-->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDcS4tW92A-9ZCVWTcUbVIeEp0k-PPwmk&callback=initMap"></script>
    <script type="text/javascript">
      //เรียกฟังก์ชั่น getHospital() เพื่อดึงข้อมูลฏรงพยาบาลมาแสดง ด้านในจะเป็นการดึงข้อมูลจาก backend
      getDonation()
    </script>

  </body>
</html>
