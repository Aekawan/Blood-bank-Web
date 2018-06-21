<?php

include 'http_codes.inc.php';
//ถ้าไม่สำเร็จสำเร็จให้เรียกฟังก์ชั่นนี้
function res_error($code){
	$res = array(
		"success" => false,
		"message" => http_response($code),
		"data" => null,
	);
	return $res;
}
//ถ้าสำเร็จให้เรียกฟังก์ชั่นนี้
function res_success($result){
	$res = array(
		"success" => true,
		"message" => http_response(200),
		"data" => $result,
	);
	return $res;
}
//ฟังก์ชั่นการแปลงข้อมูลเป็น json
function sendJson($req){
	echo json_encode($req, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT );
}

?>