<?php
session_start();
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include './main.service.php';
include '../function.service.php';


// หา วันที่ย้อนหลังไป 7 วันค
$DateSevenDay = date("Y-m-d", mktime(date("H")+0, date("i")+0, date("s")+0, date("m")+0 , date("d")-7, date("Y")+0));

$resSevenDay = deletePostTime($DateSevenDay,7);

// หา วันที่ย้อนหลังไป 15 วัน
$DateFifteenDay = date("Y-m-d", mktime(date("H")+0, date("i")+0, date("s")+0, date("m")+0 , date("d")-15, date("Y")+0));
$resFifteenDay  = deletePostTime($DateFifteenDay,15);

// หา วันที่ย้อนหลังไป 30 วัน
$DateThirtyDay = date("Y-m-d", mktime(date("H")+0, date("i")+0, date("s")+0, date("m")+0 , date("d")-30, date("Y")+0));
$resThirtyDay  = deletePostTime($DateThirtyDay,30);

if ($resSevenDay == true && $resFifteenDay  == true && $DateThirtyDay == true){
  $res = res_success(true);
} else {
  $res = res_error(404);
}
sendJson(true);

?>
