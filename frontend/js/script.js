let base_url = "../../backend/service/main/";

//ฟักง์ชั่นการ fill ตำบล อำเภอ จังหวัด รหัสไปรษณีย์อัตโนมิต
 $.Thailand({
    database: '../thailand/database/db.json', // path หรือ url ไปยัง database
    $district: $('#district'), // input ของตำบล
    $amphoe: $('#amphoe'), // input ของอำเภอ
    $province: $('#province'), // input ของจังหวัด
    $zipcode: $('#zipcode'), // input ของรหัสไปรษณีย์
});



//ฟังก์ชั่นการสร้างแผนที่
function initMap() {
    var center = {lat: 7.963342, lng: 98.345727};
    var maps = new google.maps.Map(document.getElementById('map'), {
      zoom: 11,
      center: center
    });
    var marker, info, iconBase = '../assets/32.png';
    //สร้าง marker จากโรงพยาบาลที่มีใน database
    //ดึงข้อมูลจาก hospitalplace.php ข้อมูลขะเป็นรูปแบบ json
    $.getJSON( base_url+"hospitalplace.php", function( jsonObj ) {
      //*** loop
      $.each(jsonObj.data, function(i, item){
        marker = new google.maps.Marker({
           // ปักหมุดตาม location ของโรงพยาบาล
           position: new google.maps.LatLng(item.hospital_latitude, item.hospital_logitude),
           map: maps,
           //title ของโรงพยาบาล คือชื่อ
           title: item.hospital_name,
           icon: iconBase
        });
         //ข้อมูลต่างๆของโรงพยาบาล
        info = new google.maps.InfoWindow();

        google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          info.setContent(`<b><i class="fa fa-hospital-o"></i> ${item.hospital_name}</b>
          </br> <i class="fa fa-info-circle"></i> ${item.hospital_address +" "+item.hospital_district +" "+ item.hospital_amphoe +" "+ item.hospital_province}
          </br> <i class="fa fa-phone"></i> ${item.hospital_phone}`);
          info.open(maps, marker);
        }
        })(marker, i));

      }); // loop

   });
  }

//ฟังก์ชั่นการดึงค่าข้อมูลโรงพยาบาลจาก backend
function getDonation() {
  $.getJSON( base_url+"hospitalplace.php", function( response ) {
    //*** loop
    $.each(response.data, function(i, item){
      let mapurl = `https://www.google.co.th/maps/place/@${item.hospital_latitude},${item.hospital_logitude},17.5z`;
      //กำหนดรูปแบบของข้อมูลที่จะแสดงในหน้าเว็บ
      let data = `
       <div class="col-lg-4 mr-bottom-20">
        <div class="card">
         <img class="card-img-top" src="${item.hospital_img}" style="height:180px" alt="Card image cap">
          <div class="card-body" style="height:150px">
            <h6><i class="fa fa-hospital-o"> </i>${" "+item.hospital_name}</h6>
            <label><i class="fa fa-location-arrow" aria-hidden="true"></i>${" "+item.hospital_address}</label>
            <label>${item.hospital_district +" "+ item.hospital_amphoe +" "+ item.hospital_province +" "+ item.hospital_zipcode}</label>
            <br>
            <label><i class="fa fa-phone"> </i>${" "+ item.hospital_phone}</label>
          </div>
          <div class="col-12 text-center mr-bottom-20">
            <a href="${mapurl}" target="_blank" role="button" class="btn btn-outline-success" name="gonavigation">แผนที่</a>
          </div>
        </div>
        </div>
      `;
      //นำข้อมูลไปแสดงในแท็ก ที่มี id = hospitaldata
      $('#hospitaldata').append(data);
  });
});
}

//ดึงโฟล์ไฟลืโดยใช้ id ของคนที่ login
function getProfile(id) {
  $.getJSON(`${base_url}profile.php?userid=${id}`, function( response ) {
     let item = response.data;
     //รูปแบบขแงข้อมูลที่จะเอาไปแสดงบนหน้าเว็บ
     let data = `<div class="col-8 mr-top-20">
         <div class="row">
         <div class="col-12 mr-bottom-20 text-center">
         ${ item.picture !== null || item.picture !== "" ?
          `<img class="" src="${item.picture}" style="width:200px;">`:
          `<img class="" src="https://cdn1.iconfinder.com/data/icons/freeline/32/account_friend_human_man_member_person_profile_user_users-256.png" style="width:200px;">`
        }
           <br>
           <br>
         </div>
         <div class="col-6 mr-bottom-20">
           <h5><i class="fa fa-user"></i> ชื่อ ${item.title + item.firstname}</h5>
         </div>
         <div class="col-6 mr-bottom-20">
           <h5>นามสกุล ${item.lastname}</h5>
         </div>
         <div class="col-12 mr-bottom-20">
           <h5><i class="fa fa-id-card"></i> หมายเลขบัตรประจำตัวประชาชน ${item.id_card}</h5>
         </div>
         <div class="col-6 mr-bottom-20">
           <h5><i class="fa fa-venus-mars"></i> เพศ ${item.sex}</h5>
         </div>
         <div class="col-6 mr-bottom-20">
           <h5><i class="fa fa-birthday-cake"></i> วันเกิด ${item.birthday}</h5>
         </div>
         <div class="col-12 mr-bottom-20">
           <h5><i class="fa fa-heart"></i> กรุ๊ปเลือด ${item.blood_type}</h5>
           <br>
           <hr>
         </div>
         <div class="col-12 mr-bottom-20">
           <h5><i class="fa fa-home"></i> ที่อยู่ ${item.address}</h5>
         </div>
         <div class="col-6 mr-bottom-20">
           <h5><i class="fa fa-info-circle"></i> ตำบล ${item.district}</h5>
         </div>
         <div class="col-6 mr-bottom-20">
           <h5><i class="fa fa-info-circle"></i> อำเภอ ${item.amphoe}</h5>
         </div>
         <div class="col-6 mr-bottom-20">
           <h5><i class="fa fa-info-circle"></i> จังหวัด ${item.province}</h5>
         </div>
         <div class="col-6 mr-bottom-20">
           <h5><i class="fa fa-info-circle"></i> รหัสไปรษณีย์ ${item.zipcode}</h5>
         </div>
         <div class="col-12 mr-bottom-20">
         <hr>
         <br>
           <h5><i class="fa fa-phone"></i> เบอร์โทรศัพท์ ${item.phone}</h5>
         </div>
         <div class="col-12 mr-bottom-20">
           <h5><i class="fa fa-facebook-official"></i> เฟสบุ๊ค <a href="${item.facebook}" target="_blank">${item.facebook}</a></h5>
         </div>
         <div class="col-12 mr-bottom-20">
           <h5><i class="fa fa-paper-plane"></i> อีเมล ${item.email}</h5>
         </div>
         <div class="col-12 text-center mr-top-20 mr-bottom-20">
         <button class="btn btn-lg btn-success" onClick="alert('ยังไม่สามารถแก้ไขข้อมูลได้')">แก้ไขข้อมูล</button>
         </div>
         </div>
       </div>`;
       $('#profile').append(data);
     });

}

//ยังไม่เสร็จ
function editProfile(id) {
  $.getJSON(`${base_url}profile.php?userid=${id}`, function( response ) {
     let item = response.data;
     let data = `<div class="col-8 mr-top-50">
         <div class="row">
         <div class="col-6 mr-bottom-20">
           <h5><i class="fa fa-user"></i> ชื่อ ${item.title + item.firstname}</h5><input type="text" class="form-input">
         </div>
         <div class="col-6 mr-bottom-20">
           <h5>นามสกุล ${item.lastname}</h5>
         </div>
         <div class="col-12 mr-bottom-20">
           <h5><i class="fa fa-id-card"></i> หมายเลขบัตรประจำตัวประชาชน ${item.id_card}</h5>
         </div>
         <div class="col-6 mr-bottom-20">
           <h5><i class="fa fa-venus-mars"></i> เพศ ${item.sex}</h5>
         </div>
         <div class="col-6 mr-bottom-20">
           <h5><i class="fa fa-birthday-cake"></i> วันเกิด ${item.birthday}</h5>
         </div>
         <div class="col-12 mr-bottom-20">
           <h5><i class="fa fa-heart"></i> กรุ๊ปเลือด ${item.blood_type}</h5>
           <br>
           <hr>
         </div>
         <div class="col-12 mr-bottom-20">
           <h5><i class="fa fa-home"></i> ที่อยู่ ${item.address}</h5>
         </div>
         <div class="col-6 mr-bottom-20">
           <h5><i class="fa fa-info-circle"></i> ตำบล ${item.district}</h5>
         </div>
         <div class="col-6 mr-bottom-20">
           <h5><i class="fa fa-info-circle"></i> อำเภอ ${item.amphoe}</h5>
         </div>
         <div class="col-6 mr-bottom-20">
           <h5><i class="fa fa-info-circle"></i> จังหวัด ${item.province}</h5>
         </div>
         <div class="col-6 mr-bottom-20">
           <h5><i class="fa fa-info-circle"></i> รหัสไปรษณีย์ ${item.zipcode}</h5>
         </div>
         <div class="col-12 mr-bottom-20">
         <hr>
         <br>
           <h5><i class="fa fa-phone"></i> เบอร์โทรศัพท์ ${item.phone}</h5>
         </div>
         <div class="col-12 mr-bottom-20">
           <h5><i class="fa fa-facebook-official"></i> เฟสบุ๊ค <a href="${item.facebook}" target="_blank">${item.facebook}</a></h5>
         </div>
         <div class="col-12 mr-bottom-20">
           <h5><i class="fa fa-paper-plane"></i> อีเมล ${item.email}</h5>
         </div>
         <div class="col-12 text-center mr-top-20 mr-bottom-20">
         <button class="btn btn-lg btn-success">แก้ไขข้อมูล</button>
         </div>
         </div>
       </div>`;
       $('#profile').append(data);
     });
}

//ฟังก์ชั่นดึงชื่อโรงพยาบาลทั้งหมดมาแสดง
function getHospitalName(){
  $.getJSON( base_url+"hospitalplace.php", function( response ) {
    //*** loop
    $.each(response.data, function(i, item){
        let data = `<option value="${item.hospital_id}">${item.hospital_name}</option>`;
        //เขียนตัวแปร data ลงในในแท็กที่มี id = hospitalname
        $('#hospitalname').append(data);
    });
  });
}

//ฟังก์ชั่นการกดในหน้า bloodfrom โดยเมื่อคลิกที่ขอเลือดให้ตัวเองจะเรียกฟังก์ชั่น bloodFroMe(id); โดยใช้ id ของคน login เพื่อดึงข้อมูลของตัวเองมา fill ใน form
function bloodForm(id){
  $("#myform").hide();
  $("#myhide").click(function(){
    $("#myform").hide()
    $("#myhide").removeClass();
    $("#myhide").addClass( "btn btn-success active" )
    $("#myshow").removeClass();
    $("#myshow").addClass( "btn btn-secondary active" );
    bloodFroMe(id);
  });
  //ถ้าคลิกที่ขอโลหิตให้ผู้อื่นก็จะเรียกฟังก์ชั่น bloodForOther(); เพื่อสร้าง from เปล่าที่ไม่มีข้อมูลมาให้กรอก
  $("#myshow").click(function(){
    $("#myform").show();
    $("#myshow").removeClass();
    $("#myshow").addClass( "btn btn-success active" );
    $("#myhide").removeClass();
    $("#myhide").addClass( "btn btn-secondary");
    bloodForOther();
  });

  //ฟังก์ชั่น เมื่อมีการเปลี่ยนโรงพยาบาล ในหน้า bloodfrom.php เมื่อมีการเปลี่ยนโรงพยาบาลให้ fill เบอร์โทรโรงพยาบาลที่เลือกอัตโนมัติ
  $("#hospitalname").change(function(){
    let hospital_id = $("#hospitalname").val();
    $.getJSON(`../../backend/service/main/hospital.php?id=${hospital_id}`, function( response ) {
      //*** loop
    if (response.success === true) {
      let data = response.data.hospital_phone;
      $('#hospitalphone').val(data);
    } else {
      $('#hospitalphone').val('');
    }

    });

  });
}

//ฟังก์ชั่นการดึงข้อมูลของตัวเองมาลงใน form ในหน้า bloodfrom.php อัตโนมัติ
function bloodFroMe(id){
  $.getJSON(`${base_url}profile.php?userid=${id}`, function( response ) {
  let item = response.data;
  let data = `<div class="row mr-top-20">
    <div class="col-lg-2 col-md-12">
      <label for="">คำนำหน้า</label>
      <input type="text" name="" class="form-control" value="${item.title}"  disabled>
      <input type="hidden" name="title" value="${item.title}">
    </div>
    <div class="col-lg-5 col-md-12">
      <label for="">ชื่อ</label>
      <input type="text" name="" class="form-control" placeholder="ชื่อจริง" value="${item.firstname}"  disabled>
      <input type="hidden" name="firstname"  value="${item.firstname}">
    </div>
    <div class="col-lg-5 col-md-12">
      <label for="">นามสกุล</label>
      <input type="text" name="" class="form-control" placeholder="นามสกุล" value="${item.lastname}"  disabled>
      <input type="hidden" name="lastname" value="${item.lastname}" >
    </div>
  </div>
  <div class="row mr-top-20">
    <div class="col-lg-6 col-md-12">
      <label for="">เพศ</label>
      <input type="text" class="form-control" name="" value="${item.sex}"  disabled>
      <input type="hidden" name="sex" value="${item.sex}">
    </div>
  </div>
  <div class="row mr-top-20">
    <div class="col-lg-6 col-md-12">
      <label for="">กรุ๊ปเลือด</label>
        <input type="text" class="form-control" name="" value="${item.blood_type}"  disabled>
        <input type="hidden" name="bloodtype" value="${item.blood_type}">
    </div>
  </div>
    <div><br><hr></div>
  <!------------------------การติดต่อ--------------------------------------------------!>
  <div class="contact">

  <div class="row mr-top-20">
  <div class="col-lg-4 col-md-12">
    <label for="">เบอร์โทรศัพท์</label>
      <input type="text" class="form-control" name="" value="${item.phone}"  disabled>
      <input type="hidden" name="phone" id="phone" value="${item.phone}">
  </div>

  <div class="col-lg-4 col-md-12">
    <label for="">อีเมล</label>
      <input type="text" class="form-control" name="" value="${item.email}"  disabled>
      <input type="hidden" name="email" id="email" value="${item.email}">
  </div>
  <div class="col-lg-4 col-md-12">
    <label for="">เฟสบุ๊ค</label>
      <input type="text" class="form-control" name="" value="${item.facebook}"  disabled>
      <input type="hidden" name="facebook" id="facebook" value="${item.facebook}">
  </div>
  </div>
  </div>
  <div><br><hr></div>
  <!-----------------------------------------ที่อยู่------------------------------------------------------!>
  <div id="auto_address">
  <div class="row mr-top-20">
    <div class="col-lg-12 col-md-12">
      <label for="">ที่อยู่</label>
        <input type="text" class="form-control" name="" value="${item.address}"  disabled>
        <input type="hidden" name="address" value="${item.address}">
    </div>
  </div>
  <div class="row mr-top-20">
    <div class="col-lg-3 col-md-12">
      <label for="">ตำบล</label>
        <input type="text" class="form-control" name="" value="${item.district}"  disabled>
        <input type="hidden" name="district" id="district" value="${item.district}">
    </div>
    <div class="col-lg-3 col-md-12">
      <label for="">อำเภอ</label>
        <input type="text" class="form-control" name="" value="${item.amphoe}"  disabled>
        <input type="hidden" name="amphoe" id="amphoe" value="${item.amphoe}">
    </div>
    <div class="col-lg-3 col-md-12">
      <label for="">จังหวัด</label>
        <input type="text" class="form-control" name="" value="${item.province}"  disabled>
        <input type="hidden" name="province" id="province" value="${item.province}">
    </div>
    <div class="col-lg-3 col-md-12">
      <label for="">รหัสไปรษณีย์</label>
        <input type="text" class="form-control" name="" value="${item.zipcode}"  disabled>
        <input type="hidden" name="zipcode" id="zipcode" value="${item.zipcode}">
        <br>
    </div>
    <script>
     let address = {address:"${item.address}",district:"${item.district}",amphoe:"${item.amphoe}",province:"${item.province}",zipcode:"${item.zipcode}"}
    </script>
  </div>
  </div>
  <div><br><br></div>
  <p class="text-center">*หมายเหตุ หากข้อมูลของคุณไม่ถูกต้องคุณสามารถเปลี่ยนได้โดยการคลิ๊กที่แก้ไขข้อมูลส่วนตัว</p>
  <div class="col-lg-12 text-center"><button type="button" class="btn btn-outline-warning" onclick="changeAddress()">แก้ไขข้อมูลส่วนตัว</button></div>
  `;

  $("#autofill").html(data);
});
}

function changeAddress() {
  console.log(address)
  $('#auto_address').html(`
    <div class="row mr-top-20">
      <div class="col-lg-12 col-md-12">
        <label for="">ที่อยู่</label>
          <input type="text" class="form-control" name="address" id="address" value="${address.address}" >

      </div>
    </div>
    <div class="row mr-top-20">
      <div class="col-lg-3 col-md-12">
        <label for="">ตำบล</label>
          <input type="text" class="form-control" name="district" id="district" value="${address.district}" >
      </div>
      <div class="col-lg-3 col-md-12">
        <label for="">อำเภอ</label>
          <input type="text" class="form-control" name="amphoe" id="amphoe" value="${address.amphoe}" >

      </div>
      <div class="col-lg-3 col-md-12">
        <label for="">จังหวัด</label>
          <input type="text" class="form-control" name="province" id="province" value="${address.province}"  >

      </div>
      <div class="col-lg-3 col-md-12">
        <label for="">รหัสไปรษณีย์</label>
          <input type="text" class="form-control" name="zipcode" id="zipcode" value="${address.zipcode}">

          <br>
      </div>
    </div>
    <script>
    //ฟักง์ชั่นการ fill ตำบล อำเภอ จังหวัด รหัสไปรษณีย์อัตโนมิต
     $.Thailand({
        database: '../thailand/database/db.json', // path หรือ url ไปยัง database
        $district: $('#district'), // input ของตำบล
        $amphoe: $('#amphoe'), // input ของอำเภอ
        $province: $('#province'), // input ของจังหวัด
        $zipcode: $('#zipcode'), // input ของรหัสไปรษณีย์
    });
    </script>

    `)
}

//ฟังก์ชั่นสร้างฟอร์มเปล่าๆ ในหน้า bloodfrom.php เมื่อเลือกร้องขอโลหิจให้ผู้อื่น เพื่อให้กรอกข้อมูล
function bloodForOther() {
  let data = `<div class="row mr-top-20">
    <div class="col-lg-2 col-md-12">
      <label for="">คำนำหน้า</label>
      <select class="form-control" name="title">
        <option value="นาย">นาย</option>
        <option value="นาง">นาง</option>
        <option value="นางสาว">นางสาว</option>
      </select>
    </div>
    <div class="col-lg-5 col-md-12">
      <label for="">ชื่อ</label>
      <input type="text" name="firstname" class="form-control" placeholder="ชื่อจริง" required>
    </div>
    <div class="col-lg-5 col-md-12">
      <label for="">นามสกุล</label>
      <input type="text" name="lastname" class="form-control" placeholder="นามสกุล" required>
    </div>
  </div>
  <div class="row mr-top-20">
    <div class="col-lg-6 col-md-12">
      <label for="">เพศ</label>
      <select name="sex" class="form-control" id="sex" required>
        <option value="male">ชาย</option>
        <option value="female">หญิง</option>
      </select>
    </div>
  </div>
  <div class="row mr-top-20">
  <div class="col-lg-6 col-md-12">
    <label for="">กรุ๊ปเลือด</label>
    <select name="bloodtype" class="form-control" id="bloodtype" >
      <option value="A Rh+">A Rh+</option>
      <option  value="A Rh-">A Rh-</option>
      <option value="B Rh+">B Rh+</option>
      <option  value="B Rh-">B Rh-</option>
      <option value="AB Rh+">AB Rh+</option>
      <option  value="AB Rh-">AB Rh-</option>
      <option value="O Rh+">O Rh+</option>
      <option  value="O Rh-">O Rh-</option>
    </select>
    <br>
  </div>
    </div>
  </div>
  <div><hr></div>
<!------------------------การติดต่อ--------------------------------------------------!>
<div class="contact">

<div class="row mr-top-20">
<div class="col-lg-4 col-md-12">
  <label for="">เบอร์โทรศัพท์</label>
    <input type="text" class="form-control" name="phone" value="" >
</div>

<div class="col-lg-4 col-md-12">
  <label for="">อีเมล</label>
    <input type="text" class="form-control" name="email" value=""  >
</div>
<div class="col-lg-4 col-md-12">
  <label for="">เฟสบุ๊ค</label>
    <input type="text" class="form-control" name="facebook" value="facebook">
</div>
</div>
</div>
<div><br><hr></div>
 <!--------------------------------------------------------------------!>
 <div id="auto_address">
 <div class="row mr-top-20">
   <div class="col-lg-12 col-md-12">
     <label for="">ที่อยู่</label>
       <input type="text" class="form-control" name="address" id="address" value="" >

   </div>
 </div>
 <div class="row mr-top-20">
   <div class="col-lg-3 col-md-12">
     <label for="">ตำบล</label>
       <input type="text" class="form-control" name="district" id="district" value="" >
   </div>
   <div class="col-lg-3 col-md-12">
     <label for="">อำเภอ</label>
       <input type="text" class="form-control" name="amphoe" id="amphoe" value="" >

   </div>
   <div class="col-lg-3 col-md-12">
     <label for="">จังหวัด</label>
       <input type="text" class="form-control" name="province" id="province" value=""  >

   </div>
   <div class="col-lg-3 col-md-12">
     <label for="">รหัสไปรษณีย์</label>
       <input type="text" class="form-control" name="zipcode" id="zipcode" value="">

       <br>
   </div>
 </div>
 <script>
 //ฟักง์ชั่นการ fill ตำบล อำเภอ จังหวัด รหัสไปรษณีย์อัตโนมิต
  $.Thailand({
     database: '../thailand/database/db.json', // path หรือ url ไปยัง database
     $district: $('#district'), // input ของตำบล
     $amphoe: $('#amphoe'), // input ของอำเภอ
     $province: $('#province'), // input ของจังหวัด
     $zipcode: $('#zipcode'), // input ของรหัสไปรษณีย์
 });
 </script>
 </div>
  `;
  $("#autofill").html(data);
}


//ฟังก์ชั่นสร้างฟอร์มเปล่าๆ ในหน้า bloodfrom.php เมื่อเลือกร้องขอโลหิจให้ผู้อื่น เพื่อให้กรอกข้อมูล
function editPost(id) {
  $.getJSON(`${base_url}getpost.php?id=${id}`, function( response ) {
  let item = response.data;
  let title = ["นาย","นาง","นางสาว"];
  let sex = ["ชาย","หญิง"];
  let blood = ["A Rh+","A Rh-","B Rh+","B Rh-","AB Rh+","AB Rh-","O Rh+","O Rh-"];
  let time_delete = ["7","15","30","0"]

  let data = `<div class="row mr-top-20">
    <div class="col-lg-2 col-md-12">
      <label for="">คำนำหน้า</label>
      <select class="form-control" id="title" name="title">
      </select>
    </div>
    <div class="col-lg-5 col-md-12">
      <label for="">ชื่อ</label>
      <input type="text" name="firstname" class="form-control" placeholder="ชื่อจริง" value="${item.post_profile.firstname}" required>
    </div>
    <div class="col-lg-5 col-md-12">
      <label for="">นามสกุล</label>
      <input type="text" name="lastname" class="form-control" placeholder="นามสกุล"  value="${item.post_profile.lastname}" required>
    </div>
  </div>
  <div class="row mr-top-20">
    <div class="col-lg-6 col-md-12">
      <label for="">เพศ</label>
      <select name="sex" class="form-control" id="sex" required>

      </select>
    </div>
  </div>
  <div class="row mr-top-20">
  <div class="col-lg-6 col-md-12">
    <label for="">กรุ๊ปเลือด</label>
    <select name="bloodtype" class="form-control" id="blood" >

    </select>
    <br>
  </div>
    </div>
  </div>
  <div><hr></div>
<!------------------------การติดต่อ--------------------------------------------------!>
<div class="contact">

<div class="row mr-top-20">
<div class="col-lg-4 col-md-12">
  <label for="">เบอร์โทรศัพท์</label>
    <input type="text" class="form-control" name="phone" value="${item.post_profile.phone}" >
</div>

<div class="col-lg-4 col-md-12">
  <label for="">อีเมล</label>
    <input type="text" class="form-control" name="email" value="${item.post_profile.email}"  >
</div>
<div class="col-lg-4 col-md-12">
  <label for="">เฟสบุ๊ค</label>
    <input type="text" class="form-control" name="facebook" value="${item.post_profile.facebook}">
</div>
</div>
</div>
<div><br><hr></div>
 <!--------------------------------------------------------------------!>
 <div id="auto_address">
 <div class="row mr-top-20">
   <div class="col-lg-12 col-md-12">
     <label for="">ที่อยู่</label>
       <input type="text" class="form-control" name="address" id="address" value="${item.post_profile.address.address}" >

   </div>
 </div>
 <div class="row mr-top-20">
   <div class="col-lg-3 col-md-12">
     <label for="">ตำบล</label>
       <input type="text" class="form-control" name="district" id="district" value="${item.post_profile.address.district}" >
   </div>
   <div class="col-lg-3 col-md-12">
     <label for="">อำเภอ</label>
       <input type="text" class="form-control" name="amphoe" id="amphoe" value="${item.post_profile.address.amphoe}" >

   </div>
   <div class="col-lg-3 col-md-12">
     <label for="">จังหวัด</label>
       <input type="text" class="form-control" name="province" id="province" value="${item.post_profile.address.province}"  >

   </div>
   <div class="col-lg-3 col-md-12">
     <label for="">รหัสไปรษณีย์</label>
       <input type="text" class="form-control" name="zipcode" id="zipcode" value="${item.post_profile.address.zipcode}">

       <br>
   </div>
 </div>
 <script>
 //ฟักง์ชั่นการ fill ตำบล อำเภอ จังหวัด รหัสไปรษณีย์อัตโนมิต
  $.Thailand({
     database: '../thailand/database/db.json', // path หรือ url ไปยัง database
     $district: $('#district'), // input ของตำบล
     $amphoe: $('#amphoe'), // input ของอำเภอ
     $province: $('#province'), // input ของจังหวัด
     $zipcode: $('#zipcode'), // input ของรหัสไปรษณีย์
 });
 </script>
 </div>
 <br>
 <hr>
 <div class="row mr-top-20">
   <div class="col-lg-6 col-md-12">
     <label for="">โรงพยบาล</label>
     <select class="form-control" name="hospital_id" id="hospital">
     </select>
   </div>
   <div class="col-lg-6 col-md-12">
     <label for="">เบอร์โทรศัพท์โรงพยาบาล</label>
     <input type="text" name="hospitalphone" id="hospitalphone" class="form-control" value="${item.hospital.hospital_phone}" placeholder="เบอร์โทรศัพท์โรงพยาบาล" disabled>
   </div>
 </div>
 <div class="row mr-top-20">
   <div class="col-12">
       <label for="">สาเหตุที่ขอรับโลหิต</label>
       <textarea class="form-control" name="casedescription" rows="3" placeholder="ระบุสาเหตุที่คุณต้องการขอรับบริจาคโลหิต เช่น อุบัติเหตุ หรือ อื่นๆ" required>${item.case_description}</textarea>
   </div>
 </div>
 <div class="row mr-top-20">
   <div class="col-12">
       <label for="">ตั้งเวลาลบโพส</label>
       <select class="form-control" id="time_delete" name="time_delete">
       </select>
   </div>
 </div>
 <input type="hidden" name="post_id" value="${item.post_id}">
 <input type="hidden" name="profile_id" value="${item.post_profile.profile_id}">
  `;
  $("#autofill").html(data);
  $.each(title,function(i,v){
    if(v == item.post_profile.title){
        $("#title").append($(`<option selected></option>`).attr("value",v).text(v));
      } else {
          $("#title").append($(`<option ></option>`).attr("value",v).text(v));
      }
    });

    $.each(sex,function(i,v){
      if(v == item.post_profile.sex){
          $("#sex").append($(`<option selected></option>`).attr("value",v).text(v));
        } else {
            $("#sex").append($(`<option ></option>`).attr("value",v).text(v));
        }
      });

      $.each(blood,function(i,v){
        if(v == item.post_profile.blood_type){
            $("#blood").append($(`<option selected></option>`).attr("value",v).text(v));
          } else {
              $("#blood").append($(`<option ></option>`).attr("value",v).text(v));
          }
        });

        $.getJSON(`${base_url}hospitalplace.php`, function( response ) {
          let hospital = response.data;
          $.each(hospital,function(i,v){
            console.log(v.hospital_id)
            if(v.hospital_id == item.hospital.hospital_id){
                $("#hospital").append($(`<option selected></option>`).attr("value",v.hospital_id).text(v.hospital_name));
              } else {
                console.log(v.hospital_id)
                    $("#hospital").append($(`<option ></option>`).attr("value",v.hospital_id).text(v.hospital_name));
              }
            });
        });

        $.each(time_delete,function(i,v){
          if(v == item.post_profile.time_delete){
            if (v === "0"){
                  $("#time_delete").append($(`<option selected></option>`).attr("value",v).text("กำหนดเอง"));
            } else if (v == "30") {
                $("#time_delete").append($(`<option selected></option>`).attr("value",v).text("1 เดือน"));
            } else {
                $("#time_delete").append($(`<option selected></option>`).attr("value",v).text(v + " วัน"));
            }
          } else {
                if (v === "0"){
                      $("#time_delete").append($(`<option ></option>`).attr("value",v).text("กำหนดเอง"));
                } else if (v == "30") {
                    $("#time_delete").append($(`<option ></option>`).attr("value",v).text("1 เดือน"));
                } else {
                    $("#time_delete").append($(`<option ></option>`).attr("value",v).text(v + " วัน"));
                }

            }
        });

        //ฟังก์ชั่น เมื่อมีการเปลี่ยนโรงพยาบาล ในหน้า bloodfrom.php เมื่อมีการเปลี่ยนโรงพยาบาลให้ fill เบอร์โทรโรงพยาบาลที่เลือกอัตโนมัติ
        $("#hospital").change(function(){
          let hospital_id = $("#hospital").val();
          $.getJSON(`../../backend/service/main/hospital.php?id=${hospital_id}`, function( response ) {
            //*** loop
          if (response.success === true) {
            let data = response.data.hospital_phone;
            $('#hospitalphone').val(data);
          } else {
            $('#hospitalphone').val('');
          }

          });

        });


});
}

function getHospital() {
  $.getJSON(`${base_url}hospitalplace.php`, function( response ) {
    var hp = response.data;
    console.log(hp)
    return hp;
  });
}

//ฟังก์ชั่นการดึงข้อมูลของคนที่มาขอโลหิต ในหน้า bloodlist.php
function bloodList() {
  $.getJSON( base_url+"getpost.php?id=all", function( response ) {
    //*** loop
    $.each(response.data, function(i, item){
      let data = `<div class="col-lg-4 col-md-6 mr-bottom-20">
        <div class="card" >
          <div class="card-body">
            <h4 class="card-title red-blood-color"> ${item.post_profile.title + item.post_profile.firstname +" "+ item.post_profile.lastname}</h4>
            <hr>
            <p class="card-text"><i class="fa fa-heart" aria-hidden="true"></i> กรุ๊ปเลือด: ${item.post_profile.blood_type}</p>
            <p class="card-text"><i class="fa fa-hospital-o" aria-hidden="true"></i> โรงพยาบาล: ${item.hospital.hospital_name}</p>
            <p class="card-text"><i class="fa fa-info-circle" aria-hidden="true"></i> สาเหตุที่ขอบริจาคเลือด: ${item.case_description}</p>
            <p class="card-text"><i class="fa fa-info-circle" aria-hidden="true"></i> วันที่โพส: ${item.created_at}</p>
            <hr>
            <div class="text-right">
              <a role="button" href="./blooddescription.php?bloodid=${item.post_id}" class="btn btn-outline-success card-link">ดูข้อมูล</a>
            <!--  <div class="fb-share-button" data-href="http://localhost:8080/bloodforlife/frontend/pages/blooddescription.php?bloodid=${item.post_id}" data-layout="button_count" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="http://localhost:8080/bloodforlife/frontend/pages/blooddescription.php?bloodid=${item.post_id}">แชร์</a></div> !-->
          </div>
          </div>
        </div>
      </div>`;
      //เขียนข้อมูลลงในแท็กที่มี id = bloodlist
      $("#bloodlist").append(data);
    });
  });
}

//ฟังก์ชั่นการดึงข้อมูลของผู้ป่วย โดยใช้ id ของผู้ป่วย ในการดึง เพื่อแสดงข้อมูลส่วนตัวของผู้ป่วย ในหน้า blooddescription.php
function getblood(id) {
  $.getJSON(`${base_url}getpost.php?id=${id}`, function( response ) {
    let item = response.data
    //เมื่อดึงสำเร็จในสร้างแผนที่
      initMapBlood(item.hospital.hospital_latitude,item.hospital.hospital_logitude)
      $("#username").html(`${item.post_profile.title+" "+item.post_profile.firstname+" "+item.post_profile.lastname}`);
      $("#bloodtype").html(`<i class="fa fa-heart" aria-hidden="true"></i> กรุ๊ปเลือด: ${item.post_profile.blood_type}`);
      $("#phone").html(`<i class="fa fa-phone-square" aria-hidden="true"></i> เบอร์ติดต่อ: ${item.post_profile.phone}`);
      $("#email").html(`<i class="fa fa-envelope" aria-hidden="true"></i> อีเมล: ${item.post_profile.email}`);
      $("#facebook").html(`<i class="fa fa-facebook-official" aria-hidden="true"></i> เฟสบุ๊ค: <a href="${item.post_profile.facebook}" target="_blank" role="button" class="btn btn-outline-primary">facebook</a>`);
      $("#hospitalname").html(`<i class="fa fa-hospital-o" aria-hidden="true"></i> โรงพยาบาล: ${item.hospital.hospital_name}`);
      $("#hospitalphone").html(`<i class="fa fa-phone" aria-hidden="true"></i> เบอร์โทรโรงพยาบาล: ${item.hospital.hospital_phone}`);
      $("#casedescription").html(`<i class="fa fa-info-circle" aria-hidden="true"></i> สาเหตุที่ต้องขอโลหิต: ${item.case_description}`);
      $("#date").html(`<i class="fa fa-info-circle" aria-hidden="true"></i> วันที่โพส: ${item.created_at}`);

  });
}

//ฟังก์ชั่นการสร้างแผนที่ โรงพยาบาลที่ผู้ป่วยต้องการโลหิต
function initMapBlood(alat,alng) {
  //ดึงข้อมูลโรงพยาบาลโดยใช้ ชื่อ เพื่อจะเอาค่า lat long เพื่อฟังก์หมุดในแผนที่
    var uluru = {lat: Number(alat), lng: Number(alng)};
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 16,
      center: uluru
    });
    var marker = new google.maps.Marker({
      position: uluru,
      map: map
    });

}

function facebookLogin(){

  var bFbStatus = false;
  var fbID = "";
  var fbName = "";
  var fbEmail = "";

  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1292037427567316',
      cookie     : true,
      xfbml      : true,
      version    : 'v2.11'
    });
    FB.AppEvents.logPageView();
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));


function statusChangeCallback(response)
{

		if(bFbStatus == false)
		{
			fbID = response.authResponse.userID;

			  if (response.status == 'connected') {
				getCurrentUserInfo(response)
			  } else {
				FB.login(function(response) {
				  if (response.authResponse){
					getCurrentUserInfo(response)
				  } else {
					console.log('Auth cancelled.')
				  }
				}, { scope: 'email' });
			  }
		}


		bFbStatus = true;
}


    function getCurrentUserInfo() {
      FB.api('/me?fields=name,email', function(userInfo) {

		  fbName = userInfo.name;
		  fbEmail = userInfo.email;

			alert(fbID);
			alert(fbName);
			alert(fbEmail);


      });
    }

function checkLoginState() {
  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });
}
}


function getMyPost(id){
  $.getJSON(`${base_url}getpost.php?user_id=${id}`, function( response ) {
    if (response.success == true){
      //*** loop
      $.each(response.data, function(i, item){
        let data = `<div class="col-lg-6 col-md-12 mr-bottom-20">
          <div class="card" >
            <div class="card-body">
              <h4 class="card-title red-blood-color"> ${item.post_profile.title + item.post_profile.firstname +" "+ item.post_profile.lastname}</h4>
              <hr>
              <p class="card-text"><i class="fa fa-heart" aria-hidden="true"></i> กรุ๊ปเลือด: ${item.post_profile.blood_type}</p>
              <p class="card-text"><i class="fa fa-hospital-o" aria-hidden="true"></i> โรงพยาบาล: ${item.hospital.hospital_name}</p>
              <p class="card-text"><i class="fa fa-info-circle" aria-hidden="true"></i> สาเหตุที่ขอบริจาคเลือด: ${item.case_description}</p>
              <p class="card-text"><i class="fa fa-info-circle" aria-hidden="true"></i> วันที่โพส: ${item.created_at}</p>
              <hr>
              <div class="text-center">
                <a class="btn btn-success" role="button" href="./management.php?postid=${item.post_id}" class="card-link">จัดการโพส</a>
            </div>
            </div>
          </div>
        </div>`;
        //เขียนข้อมูลลงในแท็กที่มี id = bloodlist
        $("#mypost").append(data);
      });
  } else {
      let data = `<div class="col-lg-6 col-md-12 mr-bottom-50">
      <div class="alert alert-warning" role="alert">
          ยังไม่มีโพส
      </div>
      </div>`
      $("#mypost").html(data);
  }
  });
}


function checkCardId() {
  let idcard = $('#idcard').val();
  if (idcard.length == 13){
    let checkid = checkID(idcard);
    if (checkid == true){
    $.getJSON( base_url+"checkcardid.php?card_id="+idcard, function( response ) {
          if (response.success == true) {
            $("#idcard").removeClass( "is-invalid" )
          $('#invalid-cardid').html("")
        } else {
          $("#idcard").addClass( "is-invalid" )
          $('#invalid-cardid').html("ไม่สามารถใช้หมายเลขบัตรประชาชนนี้ได้")
        }
      });
    } else {
      $("#idcard").addClass( "is-invalid" )
      $('#invalid-cardid').html("หมายเลขบัตรประชาชนไม่ถูกต้อง้")
    }

  } else {
    $("#idcard").addClass( "is-invalid" )
    $('#invalid-cardid').html("กรุณากรอกหมายเลขบัตรประชาชนให้ครบ 13 หลัก")
  }
}


function checkID(id) {
    if(id.length != 13) return false;
    for(i=0, sum=0; i < 12; i++)
        sum += parseFloat(id.charAt(i))*(13-i);
    if((11-sum%11)%10!=parseFloat(id.charAt(12)))
        return false;
    return true;
}


function checkEmail() {
  let email = $('#email').val();
    let checkmail = validEmail(email);
    if (checkmail == true){
    $.getJSON( base_url+"checkemail.php?email="+email, function( response ) {
          if (response.success == true) {
            $("#email").removeClass( "is-invalid" )
          $('#invalid-email').html("")
        } else {
          $("#email").addClass( "is-invalid" )
          $('#invalid-email').html("ไม่สามารถใช้อีเมลนี้ได้")
        }
      });
    } else {
      $("#email").addClass( "is-invalid" )
      $('#invalid-email').html("อีเมลไม่ถูกต้อง")
    }

}

function validEmail(email) {
  let re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}

function checkEqualPassword(){
  let checkPasswork = $('#checkPasswork').val();
  let password = $('#password').val();
  if (checkPasswork != password){
    $("#checkPasswork").addClass( "is-invalid");
    $('#invalid-password').html('รหัสผ่านไม่ตรงกัน');
  } else {
    $("#checkPasswork").removeClass( "is-invalid" );
    $('#invalid-password').html('');
  }
}

function checkForm() {
  let username = $('#username').val();
  let password = $('#password').val();
  let checkpassword = $('#checkPasswork').val();
  let idcard = $('#idcard').val();
  let firstname = $('#firstname').val();
  let lastname = $('#lastname').val();
  let bloodtype = $('#bloodtype').val() ;
  let address = $('#address').val();
  let district = $('#district').val();
  let amphoe = $('#amphoe').val();
  let province = $('#province').val();
  let zipcode = $('#zipcode').val();
  let phone = $('#phone').val();
  let email = $('#email').val();
  let facebook = $('#facebook').val();

if (username == "" || password == "" || checkpassword == "" || idcard == "" || firstname == "" || lastname == "" || bloodtype == 0 || address == "" || district == "" || amphoe == "" || province == "" || zipcode == "" || phone == "" || email == "" || facebook == "" ){

 if ( $('#username').val() == "" ) {
        $("#username").addClass( "is-invalid" )
        $('#invalid-username').html("กรุณากรอกชื่อผู้ใช้")
 } else {
        $("#username").removeClass( "is-invalid" )
        $('#invalid-username').html("")
 }

 if ( $('#password').val() == "" ) {
    $("#password").addClass( "is-invalid" )
    $('#invalid-apassword').html("กรุณากรอกรหัสผ่าน")
} else {
    $("#password").removeClass( "is-invalid" )
    $('#invalid-password').html("")
}

if ( $('#checkPasswork').val() == "" ) {
    $("#checkPasswork").addClass( "is-invalid" )
    $('#invalid-password').html("กรุณากรอกการยืนยันรหัสผ่าน")
} else {
    $("#checkPasswork").removeClass( "is-invalid" )
    $('#invalid-password').html("")
}

 if ( $('#idcard').val() == "" ) {
      $("#idcard").addClass( "is-invalid" )
      $('#invalid-idcard').html("กรุณากรอกรหัสประจำตัวประชาชน")
 } else {
      $("#idcard").removeClass( "is-invalid" )
      $('#invalid-idcard').html("")
 }
 if ( $('#firstname').val() == "") {
      $("#firstname").addClass( "is-invalid" )
      $('#invalid-firstname').html("กรุณากรอกชื่อ")
 } else {
      $("#firstname").removeClass( "is-invalid" )
      $('#invalid-firstname').html("")
 }
 if ( $('#lastname').val() == ""){
      $("#lastnam").addClass( "is-invalid" )
      $('#invalid-lastnam').html("กรุณากรอกนามสกุล")
 } else {
      $("#lastname").removeClass( "is-invalid" )
      $('#invalid-lastname').html("")
 }

 if ( $('#bloodtype').val() == 0){
      $("#bloodtype").addClass( "is-invalid" )
      $('#invalid-bloodtype').html("กรุณาเลือกหมู่เลือด")
 } else {
      $("#bloodtype").removeClass( "is-invalid" )
      $('#invalid-bloodtype').html("")
 }

 if ( $('#address').val() == ""){
      $("#address").addClass( "is-invalid" )
      $('#invalid-address').html("กรุณากรอกที่อยู่")
 } else {
      $("#address").removeClass( "is-invalid" )
      $('#invalid-address').html("")
 }

 if ( $('#district').val() == ""){
      $("#district").addClass( "is-invalid" )
      $('#invalid-district').html("กรุณากรอกตำบล")
 } else {
      $("#district").removeClass( "is-invalid" )
      $('#invalid-district').html("")
 }
 if ( $('#amphoe').val() == ""){
      $("#amphoe").addClass( "is-invalid" )
      $('#invalid-amphoe').html("กรุณากรอกอำเภอ")
 } else {
      $("#amphoe").removeClass( "is-invalid" )
      $('#invalid-amphoe').html("")
 }
 if ( $('#province').val() == ""){
      $("#province").addClass( "is-invalid" )
      $('#invalid-province').html("กรุณากรอกจังหวัด")
 } else {
      $("province").removeClass( "is-invalid" )
      $('#invalid-province').html("")
 }
 if ( $('#zipcode').val() == ""){
      $("#zipcode").addClass( "is-invalid" )
      $('#invalid-zipcode').html("กรุณากรอกรหัสไปรษณีย์")
 } else {
      $("#zipcode").removeClass( "is-invalid" )
      $('#invalid-zipcode').html("")
 }

 if ( $('#phone').val() == ""){
      $("#phone").addClass( "is-invalid" )
      $('#invalid-phone').html("กรุณากรอกเบอร์โทรศัพท์")
 } else {
      $("#phone").removeClass( "is-invalid" )
      $('#invalid-phone').html("")
 }

 if ( $('#email').val() == ""){
      $("#email").addClass( "is-invalid" )
      $('#invalid-email').html("กรุณากรอกอีเมล")
 } else {
      $("#email").removeClass( "is-invalid" )
      $('#invalid-email').html("")
 }

 if ( $('#facebook').val() == ""){
    $("#facebook").addClass( "is-invalid" )
    $('#invalid-facebook').html("กรุณากรอกเฟสบุ๊คของคุณ")
} else {
    $("#facebook").removeClass( "is-invalid" )
    $('#invalid-email').html("")
}
  return false
} else {
  return true
}
}



function checkFacebookForm() {
  let idcard = $('#idcard').val();
  let firstname = $('#firstname').val();
  let lastname = $('#lastname').val();
  let bloodtype = $('#bloodtype').val() ;
  let address = $('#address').val();
  let district = $('#district').val();
  let amphoe = $('#amphoe').val();
  let province = $('#province').val();
  let zipcode = $('#zipcode').val();
  let phone = $('#phone').val();
  let email = $('#email').val();

if (idcard == "" || firstname == "" || lastname == "" || bloodtype == 0 || address == "" || district == "" || amphoe == "" || province == "" || zipcode == "" || phone == "" || email == "" || facebook == "" ){


 if ( $('#idcard').val() == "" ) {
      $("#idcard").addClass( "is-invalid" )
      $('#invalid-idcard').html("กรุณากรอกรหัสประจำตัวประชาชน")
 } else {
      $("#idcard").removeClass( "is-invalid" )
      $('#invalid-idcard').html("")
 }
 if ( $('#firstname').val() == "") {
      $("#firstname").addClass( "is-invalid" )
      $('#invalid-firstname').html("กรุณากรอกชื่อ")
 } else {
      $("#firstname").removeClass( "is-invalid" )
      $('#invalid-firstname').html("")
 }
 if ( $('#lastname').val() == ""){
      $("#lastnam").addClass( "is-invalid" )
      $('#invalid-lastnam').html("กรุณากรอกนามสกุล")
 } else {
      $("#lastname").removeClass( "is-invalid" )
      $('#invalid-lastname').html("")
 }

 if ( $('#bloodtype').val() == 0){
      $("#bloodtype").addClass( "is-invalid" )
      $('#invalid-bloodtype').html("กรุณาเลือกหมู่เลือด")
 } else {
      $("#bloodtype").removeClass( "is-invalid" )
      $('#invalid-bloodtype').html("")
 }

 if ( $('#address').val() == ""){
      $("#address").addClass( "is-invalid" )
      $('#invalid-address').html("กรุณากรอกที่อยู่")
 } else {
      $("#address").removeClass( "is-invalid" )
      $('#invalid-address').html("")
 }

 if ( $('#district').val() == ""){
      $("#district").addClass( "is-invalid" )
      $('#invalid-district').html("กรุณากรอกตำบล")
 } else {
      $("#district").removeClass( "is-invalid" )
      $('#invalid-district').html("")
 }
 if ( $('#amphoe').val() == ""){
      $("#amphoe").addClass( "is-invalid" )
      $('#invalid-amphoe').html("กรุณากรอกอำเภอ")
 } else {
      $("#amphoe").removeClass( "is-invalid" )
      $('#invalid-amphoe').html("")
 }
 if ( $('#province').val() == ""){
      $("#province").addClass( "is-invalid" )
      $('#invalid-province').html("กรุณากรอกจังหวัด")
 } else {
      $("province").removeClass( "is-invalid" )
      $('#invalid-province').html("")
 }
 if ( $('#zipcode').val() == ""){
      $("#zipcode").addClass( "is-invalid" )
      $('#invalid-zipcode').html("กรุณากรอกรหัสไปรษณีย์")
 } else {
      $("#zipcode").removeClass( "is-invalid" )
      $('#invalid-zipcode').html("")
 }

 if ( $('#phone').val() == ""){
      $("#phone").addClass( "is-invalid" )
      $('#invalid-phone').html("กรุณากรอกเบอร์โทรศัพท์")
 } else {
      $("#phone").removeClass( "is-invalid" )
      $('#invalid-phone').html("")
 }

 if ( $('#email').val() == ""){
      $("#email").addClass( "is-invalid" )
      $('#invalid-email').html("กรุณากรอกอีเมล")
 } else {
      $("#email").removeClass( "is-invalid" )
      $('#invalid-email').html("")
 }

  return false
} else {
  return true
}
}


//ฟังก์ชั่นการดึงค่าข้อมูลโรงพยาบาลจาก backend
function sendEmail(id) {
  alert("กำลังส่งอีเมล กรุณารอสักครู่......")
  $.getJSON( base_url+"sendemail.php?post_id="+id, function( response ) {
    if (response.success == true){
      alert("ส่งอีเมลเรียบร้อย")
    } else {
      alert("ส่งอีเมลไม่สำเร็จ")
    }

});
}


function getNewsbyId(id){
$.getJSON( base_url+"getnews.php?id="+id, function( response ) {
     let item = response.data;
     $("#news").html(`
          <div class="card text-center">
           <div class="card-header text-left">
            <h4> [  ${checkNresType(item.type)} ] ${item.topic} </h4>
           </div>
           <div class="card-body">
              <img src="${base_uploads}/${item.img_full}" style="width:100%" alt="">
             <br>
             <br>
             ${item.detail}

           </div>
           <div class="card-footer text-muted">

           </div>
           </div>
           <br>
           <br>
    `)
});
}


function getNews(type){
$.getJSON( base_url+"getnews.php?id=all&type="+type, function( response ) {
     let item = response.data;
  $.each(item,function(i,data){
     let dthtml = data.detail;
     var div = document.createElement("div");
         div.innerHTML = dthtml.replace(/\&nbsp;/g, '');
     var dttext = div.textContent.replace(/\&nbsp;/g, '') || div.innerText.replace(/\&nbsp;/g, '') || "";

     $("#news-data").append(`
       <div class="col-6 mr-bottom-20">
         <div class="card">
           <h4 class="card-header">${data.topic.substr(0, 50)}</h4>
           <div class="card-body">
             <img src="../../backend/uploads/${data.img_preview}" style="width:100%;height:200px" >
             <p class="card-text">${dttext.substr(0, 100)}</p>
             <a href="../admin/viewnews.php?id=${data.news_id}" class="btn btn-primary">อ่านต่อ</a>
           </div>
         </div>
       </div>
    `)

});
});

function getImgSlide(){
  $.getJSON("../../backend/service/main/getnews.php?id=all", function( response ) {
       let item = response.data;
    $.each(item,function(i,data){
      if (data.slid_on == 1){
       $("img_slide").append(`
           <div><img class="d-block w-100 img-fluid" src="../../backend/uploads/${data.img_full}" style="" alt="First slide"></div>
       `)
     }
     });
   });
}

function getImg() {

}

}



function deletePostTime() {
  $.getJSON("../../backend/service/main/deleteposttime.php", function( response ) {
           console.log(response);
  });
}
