<?php
include 'loginmodal.php';

function headerRander($title) {
    ?>
      <title><?php echo $title; ?></title>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
      <!-- สไตส์ที่สร้างขึ้นมากเอง -->
      <link rel="stylesheet" href="../css/style.css">
      <!-- font -->
      <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
      <!-- Add the slick-theme.css if you want default styling -->
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css"/>
  <!-- Add the slick-theme.css if you want default styling -->
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css"/>
      <link rel="stylesheet" href="../thailand/dist/jquery.Thailand.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="../js/facebookLogin.js" charset="utf-8"></script>
    <?php
  }


function navbarRander() {
  ?>
  <nav class="navbar navbar-expand-lg navbar-light bg-white-color navbar-border fixed-top">
  <a class="navbar-brand" href="../../index.php"><img src="../assets/logo.png" style="width:200px" alt=""></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto mr-left-30">
      <?php if(isset($_SESSION['userid']) && $_SESSION['status'] == "admin") { ?>
        <li class="nav-item active">
          <a class="nav-link" href="../pages/home.php">หน้าแรก</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="../admin/dashboard.php">หน้าควบคุม</a>
        </li>
      <?php } else {?>
        <li class="nav-item active">
          <a class="nav-link" href="./home.php">หน้าแรก</a>
        </li>
      <li class="nav-item active">
        <a class="nav-link" href="./bloodlist.php">ผู้ที่ต้องการโลหิต</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="./bloodform.php">แบบฟอร์มร้องขอโลหิต</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="./donationplace.php">สถานที่บริจาคโลหิต</a>
      </li>
      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          เรียนรู้
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="./news.php">ข่าวประชาสัมพันธ์</a>
          <a class="dropdown-item" href="./learning.php">ความรู้เกี่ยวกับโลหิต</a>
        </div>
      </li>
    <!--  <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          ช่วยเหลือ
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="./news.php">ขั้นตอนการบริจาคโลหิตให้ผู้ป่วย</a>
          <a class="dropdown-item" href="./learning.php">ขั้นตอนการขอรับบริจาคโลหิต</a>
        </div>
      </li> !-->
      <?php } ?>
    </ul>
     <?php if(!isset($_SESSION["username"])) {
       ?>
       <a role="button" href="#" class="btn btn-outline-success mr-sm-4" data-toggle="modal" data-target="#loginModal">เข้าสู่ระบบ</a>
       <a role="button" href="../pages/register.php" class="btn btn-danger btn-red-blood my-2 my-sm-0">สมัครสมาชิก</a>
       <?php
     } else {
       ?>
       <ul class="navbar-nav">
       <li class="nav-item dropdown active">
         <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           <?php echo "ยินดีต้อนรับคุณ ".$_SESSION["username"]; ?>
         </a>
         <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
             <?php if(isset($_SESSION['userid']) && $_SESSION['status'] == "admin") { ?>
               <a class="dropdown-item" href="./profile.php">โปรไฟล์</a>
               <a class="dropdown-item" href="../../backend/service/main/logout.php">ออกจากระบบ</a>
            <?php } else { ?>
           <a class="dropdown-item" href="./profile.php">โปรไฟล์</a>
           <a class="dropdown-item" href="./mypost.php">โพสของฉัน</a>
           <a class="dropdown-item" href="../../backend/service/main/logout.php">ออกจากระบบ</a>
             <?php } ?>
         </div>
       </li>
     </ul>
       <?php
     } ?>

  </div>
</nav>
<?php echo loingModal(); ?>
  <?php
}

?>
