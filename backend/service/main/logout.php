<?php
//ล้างค่า session
session_start();
session_destroy();
//ไปยังหน้า home.php
header("location: ../../../frontend/pages/home.php");
 ?>
