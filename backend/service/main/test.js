
function checkForm(data) {
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

if (username == null || password == null || checkpassword == null || idcard == null || firstname == null || lastname == null || bloodtype == 0 || address == null || district == null || amphoe == null || province == null || zipcode == null || phone == null || email == null || facebook == null ){
  
 if ( $('#username').val() == null ) {
        $("#username").addClass( "is-invalid" )
        $('#invalid-username').html("กรุณากรอกชื่อผู้ใช้")
 } else {
        $("#username").removeClass( "is-invalid" )
        $('#invalid-username').html("")
 }

 if ( $('#password').val() == null ) {
    $("#password").addClass( "is-invalid" )
    $('#invalid-apassword').html("กรุณากรอกรหัสผ่าน")
} else {
    $("#password").removeClass( "is-invalid" )
    $('#invalid-password').html("")
}

if ( $('#checkPasswork').val() == null ) {
    $("#checkPasswork").addClass( "is-invalid" )
    $('#invalid-password').html("กรุณากรอกการยืนยันรหัสผ่าน")
} else {
    $("#checkPasswork").removeClass( "is-invalid" )
    $('#invalid-password').html("")
}

 if ( $('#idcard').val() == null ) {
      $("#idcard").addClass( "is-invalid" )
      $('#invalid-idcard').html("กรุณากรอกรหัสประจำตัวประชาชน")
 } else {
      $("#idcard").removeClass( "is-invalid" )
      $('#invalid-idcard').html("")
 }
 if ( $('#firstname').val() == null) {
      $("#firstname").addClass( "is-invalid" )
      $('#invalid-firstname').html("กรุณากรอกชื่อ")
 } else {
      $("#firstname").removeClass( "is-invalid" )
      $('#invalid-firstname').html("")
 }
 if ( $('#lastname').val() == null){
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

 if ( $('#address').val() == null){
      $("#address").addClass( "is-invalid" )
      $('#invalid-address').html("กรุณากรอกที่อยู่")
 } else {
      $("#address").removeClass( "is-invalid" )
      $('#invalid-address').html("")
 }

 if ( $('#district').val() == null){
      $("#district").addClass( "is-invalid" )
      $('#invalid-district').html("กรุณากรอกตำบล")
 } else {
      $("#district").removeClass( "is-invalid" )
      $('#invalid-district').html("")
 }
 if ( $('#amphoe').val() == null){
      $("#amphoe").addClass( "is-invalid" )
      $('#invalid-amphoe').html("กรุณากรอกอำเภอ")
 } else {
      $("#amphoe").removeClass( "is-invalid" )
      $('#invalid-amphoe').html("")
 }
 if ( $('#province').val() == null){
      $("#province").addClass( "is-invalid" )
      $('#invalid-province').html("กรุณากรอกจังหวัด")
 } else {
      $("province").removeClass( "is-invalid" )
      $('#invalid-province').html("")
 }
 if ( $('#zipcode').val() == null){
      $("#zipcode").addClass( "is-invalid" )
      $('#invalid-zipcode').html("กรุณากรอกรหัสไปรษณีย์")
 } else {
      $("#zipcode").removeClass( "is-invalid" )
      $('#invalid-zipcode').html("")
 }

 if ( $('#phone').val() == null){
      $("#phone").addClass( "is-invalid" )
      $('#invalid-phone').html("กรุณากรอกเบอร์โทรศัพท์")
 } else {
      $("#phone").removeClass( "is-invalid" )
      $('#invalid-phone').html("")
 }

 if ( $('#email').val() == null){
      $("#email").addClass( "is-invalid" )
      $('#invalid-email').html("กรุณากรอกอีเมล")
 } else {
      $("#email").removeClass( "is-invalid" )
      $('#invalid-email').html("")
 }

 if ( $('#facebook').val() == null){
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
