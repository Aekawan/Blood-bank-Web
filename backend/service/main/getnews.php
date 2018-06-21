<?php
session_start();
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include './main.service.php';
include '../function.service.php';

$news_id = $_GET['id'];
$news_type = isset($_GET['type']) ? $_GET['type'] : 99 ;

if ($news_id == "all"){
  $data = getNews($news_type);
  if ($data != null){
        $res = res_success($data);
  } else {
       $res = res_error(404);
  }

} else {
    $data = getNewsById($news_id,$news_type);

    if ($data != null){
          $res = res_success($data);
    } else {
         $res = res_error(404);
    }
}


sendJson($res);
?>
