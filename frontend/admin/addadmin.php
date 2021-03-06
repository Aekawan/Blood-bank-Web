<?php
 //เปิดการใช้งาน session
 session_start();
 //เช็คว่ามีการเก็บค่า userid หรือยัง ถ้ามีแสดงว่า login แล้ว ให้เปลี่ยนหน้าไปเป้นหน้า home เพราะคนที่เข้าสู่ระบบแล้วไม่สามารถสมัครซ้ำได้
 if (isset($_SESSION["status"]) && $_SESSION["status"] != "admin"){
    header( "location: ../../index.php");
 }
 //ดึงไฟล์ hearder.php มาใช้ คือส่วนหัวของเว็บ
 include '../component/header.php';
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
                <!-- แบบฟรอ์มการสมัครสามาชก-->
                  <h3 class="card-title red-blood-color">ลงทะเบียนผูดูแลระบบ</h3>
                </div>
                <div class="col-12 mr-bottom-30" style="border-bottom: 5px solid #B71C1C !important; ">
                </div>
                <div class="row justify-content-md-center">




                  <div class="col-lg-8 col-md-12">
                    <!--เมื่อกดปุ่ม สมัคร ข้อมูลในฟอร์มจะถูกส่งไปหน้า  ../../backend/service/main/register.php เป็นไฟล์ที่เอาข้อมูลไปลง database-->
                  <form class="" action="../../backend/service/main/register.php" onsubmit="return checkForm()" method="post" >
                    <div class="row mr-top-20">
                      <div class="col-lg-6 col-md-12">
                        <label for="">ชื่อผู้ใช้</label>
                        <input type="text" id="username" name="username" class="form-control"  placeholder="ชื่อผู้ใช้ เช่น bloodman2017">
                        <div class="invalid-feedback" id="invalid-username">

                        </div>
                      </div>
                      <div class="col-lg-6 col-md-12">
                        <label for="">รหัสผ่าน</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="รหัสผ่าน 8 ตัวขึ้นไป">
                        <div class="invalid-feedback" id="invalid-apassword">

                        </div>
                      </div>

                    </div>
                    <div class="row mr-top-20">
                      <div class="col-lg-6 col-md-12">
                      </div>
                      <div class="col-lg-6 col-md-12">
                        <label for="">ยืนยันรหัสผ่าน</label>
                        <input type="password" id="checkPasswork" class="form-control"  placeholder="กรอกรหัสผ่านอีกครั้ง" onchange="checkEqualPassword()">
                        <div class="invalid-feedback" id="invalid-password">
                        </div>
                      </div>

                    </div>
                    <br>
                    <hr>
                    <div class="row mr-top-20">
                      <div class="col-12">
                        <label for="">เลขบัตรประชาชน</label>
                        <input type="text" id="idcard" name="idcard" class="form-control" placeholder="หมายเลขบัตรประจำตัวประชาชน" onchange="checkCardId()" >
                        <div class="invalid-feedback" id="invalid-cardid">

                        </div>
                      </div>
                    </div>
                    <div class="row mr-top-20">
                      <div class="col-lg-2 col-md-12">
                        <label for="">คำนำหน้า</label>
                        <select class="form-control" id="title" name="title">
                          <option value="นาย">นาย</option>
                          <option value="นาง">นาง</option>
                          <option value="นางสาว">นางสาว</option>
                        </select>

                      </div>
                      <div class="col-lg-5 col-md-12">
                        <label for="">ชื่อ</label>
                        <input type="text" id="firstname" name="firstname" class="form-control" placeholder="ชื่อจริง" >
                        <div class="invalid-feedback" id="invalid-firstname">

                        </div>
                      </div>
                      <div class="col-lg-5 col-md-12">
                        <label for="">นามสกุล</label>
                        <input type="text" id="lastname" name="lastname" class="form-control" placeholder="นามสกุล" >
                        <div class="invalid-feedback" id="invalid-lastname">

                        </div>
                      </div>
                    </div>
                    <div class="row mr-top-20">
                      <div class="col-lg-6 col-md-12">
                        <label for="">เพศ</label>
                        <select name="sex" class="form-control" id="sex">
                          <option value="ชาย">ชาย</option>
                          <option value="หญิง">หญิง</option>
                        </select>
                      </div>
                      <div class="col-lg-2 col-md-3">
                        <label for="">วันเกิด</label>
                        <select name="bdate" class="form-control" id="days"></select>
                      </div>
                      <div class="col-lg-2 col-md-3">
                        <label for="">เดือน</label>
                        <select name="bmonth" class="form-control" id="months"></select>
                      </div>
                      <div class="col-lg-2 col-md-3">
                        <label for="">ปี</label>
                        <select name="byear" class="form-control" id="years"></select>
                      </div>
                    </div>
                    <div class="row mr-top-20">
                    <div class="col-lg-6 col-md-12">
                      <label for="">กรุ๊ปเลือด</label>
                      <select name="bloodtype" class="form-control" id="bloodtype" >
                        <option value="0">เลือกหมู่เลือด</option>
                        <option value="A Rh+">A Rh+</option>
                        <option  value="A Rh-">A Rh-</option>
                        <option value="B Rh+">B Rh+</option>
                        <option  value="B Rh-">B Rh-</option>
                        <option value="AB Rh+">AB Rh+</option>
                        <option  value="AB Rh-">AB Rh-</option>
                        <option value="O Rh+">O Rh+</option>
                        <option  value="O Rh-">O Rh-</option>
                      </select>
                      <div class="invalid-feedback" id="invalid-bloodtype">

                        </div>
                      <br>
                    </div>
                  </div>
                    <hr>
                    <div class="row mr-top-20">
                      <div class="col-12">
                        <label for="">ที่อยู่</label>
                        <input type="text" id="address" name="address" class="form-control" placeholder="ที่อยู่ปัจจุบัน เช่น 123/45 ม.1 ตึกขาวดำ ซอยแม่น้ำ" >
                        <div class="invalid-feedback" id="invalid-address">

                        </div>
                      </div>
                    </div>
                    <div class="row mr-top-20">
                      <!--ฟอร์มที่อยู่ พวกตำบล จะถูกดึงขึ้นมาอัตโนมิต โดยใช้ library jquery.Thailand ตำบล อำเภอ จังหวัด และรหัส ปณ จะดึงขึ้นมาอัตโนมัติ-->
                      <div class="col-lg-3 col-md-12">
                        <label for="">ตำบล</label>
                        <input type="text" name="district" id="district" class="form-control" placeholder="ตำบล" >
                        <div class="invalid-feedback" id="invalid-district">

                        </div>
                      </div>
                      <div class="col-lg-3 col-md-4">
                        <label for="">อำเภอ</label>
                        <input type="text" name="amphoe" id="amphoe" class="form-control" placeholder="อำเภอ" >
                        <div class="invalid-feedback" id="invalid-amphoe">

                        </div>
                      </div>
                      <div class="col-lg-3 col-md-12">
                        <label for="">จังหวัด</label>
                        <input type="text" name="province" id="province" class="form-control" placeholder="จังหวัด" >
                        <div class="invalid-feedback" id="invalid-province">

                        </div>
                      </div>
                      <div class="col-lg-3 col-md-12">
                        <label for="">รหัสไปรษณีย์</label>
                        <input type="text" name="zipcode" id="zipcode" class="form-control" placeholder="รหัสไปรษณีย์" >
                        <div class="invalid-feedback" id="invalid-zipcode">

                        </div>
                      </div>
                    </div>
                    <br>
                    <hr>
                    <div class="row mr-top-20">
                      <div class="col-lg-4">
                        <label for="">เบอร์โทรศัพท์</label>
                        <input type="text" id="phone" name="phone" class="form-control" placeholder="เบอร์โทรศัพท์" >
                        <div class="invalid-feedback" id="invalid-phone">

                        </div>
                      </div>
                      <div class="col-lg-4">
                        <label for="">เฟสบุ๊ค/Facebook</label>
                        <input type="text" id="facebook" name="facebook" class="form-control" placeholder="URL เฟสบุ๊คของคุณ" >
                        <div class="invalid-feedback" id="invalid-facebook">

                        </div>
                      </div>
                      <div class="col-lg-4">
                        <label >อีเมล</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="อีเมล" value="" onchange="checkEmail()" >
                        <div class="invalid-feedback" id="invalid-email">
                        </div>
                      </div>
                    </div>
                    <div class="row justify-content-md-center mr-top-30 mr-bottom-50">
                      <div class="col-12 mr-bottom-30" style="border-bottom: 5px solid #B71C1C !important; ">
                      </div>
                      <div class="col-lg-4 col-md-4 text-center mr-top-20 mr-bottom-30">
                        <!--กดปุ่มนี้จะย้อนกลับไปหน้า index -->
                        <a href="" class="btn btn-lg btn-secondary" role="button" onClick="goBack()"  name="button" style="width:200px" >ย้อนกลับ</a>
                      </div>
                      <div class="col-lg-4 col-md-4 text-center mr-top-20 mr-bottom-30">
                        <!--ปุ่มลงทะเบียน กดปุ่มนี้จะเป็นการส่งฟอร์ม ไปให้ backend-->
                        <button class="btn btn-danger btn-lg btn-red-blood" type="submit" name="button" style="width:200px"  >ลงทะเบียน</button>
                      </div>
                    </div>
                    </div>
                    <input type="hidden" name="picture" value="0">
                    <input type="hidden" name="status" value="admin">
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
    <script type="text/javascript" src="../js/script.js"></script>
   <script type="text/javascript">
    //ฟังก์ชั่นการสร้างฟอร์มวันเกิด
  (function () {
    //วนลูปปีขึ้นมาแสดง
     for (i = new Date().getFullYear() + 543 ; i > 2450; i--) {
         $('#years').append($('<option />').val(i).html(i));
     }
     //วนลูปเดือน
     for (i = 1; i < 13; i++) {
         $('#months').append($('<option />').val(i).html(i));
     }
     //วนลูปวัน
     for (i = 1; i < 32 ; i++) {
         $('#days').append($('<option />').val(i).html(i));
    }
 })();

//ฟักง์ชั่นการ fill ตำบล อำเภอ จังหวัด รหัสไปรษณีย์อัตโนมิต
 $.Thailand({
    database: '../thailand/database/db.json', // path หรือ url ไปยัง database
    $district: $('#district'), // input ของตำบล
    $amphoe: $('#amphoe'), // input ของอำเภอ
    $province: $('#province'), // input ของจังหวัด
    $zipcode: $('#zipcode'), // input ของรหัสไปรษณีย์
});

   </script>
  </body>
</html>
