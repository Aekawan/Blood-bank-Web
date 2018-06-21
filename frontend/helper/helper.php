<?php
function genNewID($uid)
{
  $uidlength = strlen((string)$uid);
  if ($uidlength == 1){
    $new_uid = "BFL000000".$uid;
  }else if ($uidlength == 2) {
    $new_uid = "BFL00000".$uid;
  }else if ($uidlength == 3) {
    $new_uid = "BFL0000".$uid;
  }else if ($uidlength == 4) {
    $new_uid = "BFL000".$uid;
  }else if ($uidlength == 5) {
    $new_uid = "BFL00".$uid;
  }else if ($uidlength == 6) {
    $new_uid = "BFL0".$uid;
  }else if ($uidlength == 7) {
    $new_uid = "BFL".$uid;
  }else {
    $new_uid = null;
  }
  return $new_uid;
}



$thai_day_arr=array("อาทิตย์","จันทร์","อังคาร","พุธ","พฤหัสบดี","ศุกร์","เสาร์");
$thai_month_arr=array(
    "0"=>"",
    "1"=>"มกราคม",
    "2"=>"กุมภาพันธ์",
    "3"=>"มีนาคม",
    "4"=>"เมษายน",
    "5"=>"พฤษภาคม",
    "6"=>"มิถุนายน",
    "7"=>"กรกฎาคม",
    "8"=>"สิงหาคม",
    "9"=>"กันยายน",
    "10"=>"ตุลาคม",
    "11"=>"พฤศจิกายน",
    "12"=>"ธันวาคม"
);

function thai_date($time){
    global $thai_day_arr,$thai_month_arr;
    $thai_date_return="วัน".$thai_day_arr[date("w",$time)];
    $thai_date_return.= " ที่ ".date("j",$time);
    $thai_date_return.=" เดือน".$thai_month_arr[date("n",$time)];
    $thai_date_return.= " พ.ศ.".(date("Yํ",$time)+543);
    $thai_date_return.= "  ".date("H:i",$time)." น.";
    return $thai_date_return;
}






?>
