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
    <script src="https://cdn.ckeditor.com/ckeditor5/1.0.0-alpha.2/classic/ckeditor.js"></script>
    <style>
    .ck-editor__editable {
    min-height: 300px;
    border-color: #21a892;
}

.upload-btn-wrapper {
  position: relative;
  overflow: hidden;
  display: inline-block;
}


.upload-btn-wrapper input[type=file] {
  font-size: 100px;
  position: absolute;
  left: 0;
  top: 0;
  opacity: 0;
}
    </style>
  </head>
  <body>
    <!--ดึง navbarRander ด้านบนของเว็บมาแสดง-->
    <?php echo navbarRander(); ?>
    <div class="container" style="margin-top:100px">
      <!--เมนูด้านล่าง-->
  <div class="row">
   <div class="col-lg-12 text-center">
     <h3>แก้ไขบทความ</h3>
     <hr class="gd">
   </div>
   <form class="" action="../../backend/service/main/editnews.php" enctype="multipart/form-data" method="post" runat="server">
     <div class="row">
   <div class="col" style="margin-bottom:20px">
     <h4>หัวข้อบทความ:</h4>
     <input type="text" class="form-control" id="topic" name="topic" value="" placeholder="พิมพ์หัวข้อข่าวสารที่ต้องการ....">
   </div>
 </div>
 <div class="row">
   <div class="col-lg-6">
     <h4>ประเภทบทความ</h4>
     <select class="form-control" name="type">
       <option value="1">ข่าวประชาสัมพันธ์ู้</option>
       <option value="2">ความรู้เกี่ยวกับโลหิต</option>
       <option value="3">ช่วยเหลือ</option>
     </select>
   </div>
   <div class="col-lg-12" style="margin-top:15px">
     <hr>
   </div>
 </div>
   <div class="row">
     <div class="col-lg-5" style="margin-bottom:20px">
       <h6>รูปภาพพรีวิว (ขนาดที่แนะนำ 200x350px):</h6>
       <div class="panel green panel-defualt" style="height:200px;width:350px;padding:0px">
         <img id="imgPreview" src="#" alt="" style="height:198px;width:100%;">
       </div>
       <div class="text-center">
         <div class="upload-btn-wrapper">
           <button class="btn btn-outline-success">เลือกรูปภาพ</button>
           <input type="file" accept="image/*" name="img_preview" id="btn-img-preview"  />
         </div>
       </div>
     </div>
     <div class="col-lg-7" style="margin-bottom:20px">
       <h6>รูปภาพประกอบบทความ (ขนาดที่แนะนำ 950x350px):</h6>
       <div class="panel green panel-defualt" style="height:200px;width:100%;padding:0px">
          <img id="imgFull" src="#" alt="" style="height:198px;width:100%;">
       </div>
       <div class="text-center">
         <div class="upload-btn-wrapper">
           <button class="btn btn-outline-success">เลือกรูปภาพ</button>
           <input type="file" accept="image/*" name="img_full" id="btn-img-full"  />
         </div>
       </div>
     </div>
   </div>
   <div class="row">
     <div class="col-lg-12">
       <hr>
     </div>
     <div class="col-lg-12">
       <h4>รายละเอียดบทความ:</h4>
       <textarea name="detail" id="editor" class="custom-editor"></textarea>
     </div>
     <div class="col-lg-12" style="margin-top:5px;style="margin-bottom:20px"">
       <h6>ต้องการให้แสดงข่าวสารนี้บนสไลด์หรือไม่  <input type="checkbox" id="slid_on" class="form-color" name="slid_on" value="0"></h6>
     </div>
      <input type="hidden" name="news_id" value="<?php echo $_GET['id']?>">
     <div class="col-lg-12 text-center" style="margin-bottom:20px">
       <button type="submit" class="btn btn-lg btn-success" name="button" style="width:200px">แก้ไขบทความ</button>
       <button onclick="goBack()" type="button" class="btn btn-lg btn-danger" name="button" style="width:200px">ย้อนกลับ</button>
     </div>
   </div>
   </form>
</div>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <script src="../js/admin.js" charset="utf-8"></script>
    <script>
          function imgPreview(input) {
              if (input.files && input.files[0]) {
                  var reader = new FileReader();

                  reader.onload = function (e) {
                      $('#imgPreview').attr('src', e.target.result);
                  }

                  reader.readAsDataURL(input.files[0]);
              }
          }

          $("#btn-img-preview").change(function() {
            imgPreview(this);
          });
          function imgFull(input)  {
              if (input.files && input.files[0]) {
                  var reader = new FileReader();

                  reader.onload = function (e) {
                      $('#imgFull').attr('src', e.target.result);
                  }

                  reader.readAsDataURL(input.files[0]);
              }
          }

          $("#btn-img-full").change(function() {
            imgFull(this);
          });

          $("#slid_on").on('change', function() {
              if ($("#slid_on").is(':checked')) {
                 $("#slid_on").val(1);
                 console.log($("#slid_on").val());
              } else {
             $("#slid_on").val(0);
             console.log($("#slid_on").val());
            }
          });

        getEditNewsbyId(<?php echo $_GET['id']?>)

        setTimeout(function(){
          ClassicEditor
          .create( document.querySelector( '#editor' ) )
          .catch( error => {
              console.error( error );
          } );

        }, 50);




    </script>
  </body>
</html>
