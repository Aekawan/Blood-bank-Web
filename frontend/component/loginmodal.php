<?php
function loingModal() {
?>
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="logModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-body">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
        <h5 class="modal-title text-center red-blood-color mr-top-10">ลงชื่อเข้าใช้</h5>
        <div class="col-12 mr-bottom-30" style="border-bottom: 5px solid #B71C1C !important; ">
        </div>
        <div class="col-12 text-center">
           <div class="fb-login-button" data-max-rows="1" data-size="large" data-button-type="login_with" data-show-faces="false" data-auto-logout-link="false" data-use-continue-as="true" scope="public_profile,email"
           onlogin="checkLoginState();"></div>
           <form action="../../backend/service/main/check.php" method="post" name="frmMain" id="frmMain">
	            <input type="hidden" id="hdnFbID" name="facebookid">
	             <input type="hidden" id="hdnName" name="facebookname">
               <input type="hidden" id="hdnFirstname" name="facebookfirstname">
               <input type="hidden" id="hdnLastname" name="facebooklastname">
	              <input type="hidden" id="hdnEmail" name="facebookemail">
                <input type="hidden" id="hdnPicture" name="facebookpicture">
                <input type="hidden" id="gender" name="facebookgender">

           </form>
        </div>
        <div class="col-12 text-center">
          <br>
          <div class="strike">
            <span>หรือ</span>
          </div>
          <br>
        </div>
      <form action="../../backend/service/main/login.php" method="post">
        <div class="form-group">
          <label for="inputUsername">ชื่อผู้ใช้</label>
          <input type="text" name="username" class="form-control" id="inputUsername"  placeholder="ชื่อผู้ใช้ เช่น bloodman2017">
        </div>
        <div class="form-group">
          <label for="inputPassword">รหัสผ่าน</label>
          <input type="password" name="password" class="form-control" id="inputPassword" placeholder="รหัสผ่าน 8 ตัวขึ้นไป">
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-lg btn-red-blood">เข้าสู่ระบบ</button>
        </div>
      </form>
      <div class="text-center mr-top-10">
        <a href="#">ลืมรหัสผ่าน?</a>
      </div>
    </div>
    <div class="modal-footer">
      ยังไม่ได้ลงทะเบียน?&nbsp;<a href="./register.php" role="button" class="btn btn-outline-success">ลงทะเบียนฟรี</a>
    </div>
  </div>
</div>
</div>
<?php
}
 ?>
