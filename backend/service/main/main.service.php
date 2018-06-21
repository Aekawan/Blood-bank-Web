<?php
//รวมฟังก์ชั่นต่างๆที่ใช้ในการ update insert delete
include '../../database/config.php';

//ฟังก์ชั่นดึงข้อมูลโรงพยาบลา
function getHospital() {
    global $conn;

    $sql = "SELECT * FROM hospital";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $source_array = array();
        while($row = mysqli_fetch_assoc($result)) {
            extract($row);
            $source_item = array(
                "hospital_id" => $hospital_id,
                "hospital_name" => $hospital_name,
                "hospital_address" => $hospital_address,
                "hospital_district" => $hospital_district,
                "hospital_amphoe" => $hospital_amphoe,
                "hospital_province" => $hospital_province,
                "hospital_zipcode" => $hospital_zipcode,
                "hospital_latitude" => $hospital_latitude,
                "hospital_logitude" => $hospital_logitude,
                "hospital_phone" => $hospital_phone,
                "hospital_img" => $hospital_img
            );
            array_push($source_array,$source_item);
        }
        $res = $source_array;
    } else {
        $res = null;
    }
  return $res;
}

//ฟังก์ชั่นการสมัครสมาชิก
function postRegister($req) {
  global $conn;
  extract($req);

  $sql = "INSERT INTO user (user_id, facebook_id,user_username, user_password, user_provider, user_verify,user_status)
          VALUES (null, '$fid','$firstname', '$password', '$provider', '$verify', '$status')";

  if (mysqli_query($conn, $sql)) {
    $last_id = mysqli_insert_id($conn);
    $res = $last_id;
  } else {
    $res = null;
  }
  return $res;
}

//ฟังก์ชั่นการใส่ข้อมูลลงในตาราง userdetail
function postUserDetail($req) {
  global $conn;
  extract($req);

  $sql = "INSERT INTO user_detail (id,user_id,id_card,title,firstname, lastname,sex, birthday,blood_type,address,district,amphoe,province,zipcode,phone,facebook,email,picture)
          VALUES (null,'$user_id','$id_card','$title','$myfirstname', '$lastname','$sex', '$birthday','$bloodtype','$address','$district','$amphoe','$province','$zipcode','$phone','$facebook','$email','$picture')";

  if (mysqli_query($conn, $sql)) {
    $res = true;
  } else {
    $res = false;
  }
  return $res;
}

//ฟังก์ชั่นการ login
function goLogin($req) {
  global $conn;
  extract($req);

  $sql = "SELECT user_id,user_username,user_status FROM user WHERE user_username = '$username' AND user_password = '$password'";
  $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        extract($row);
        $source_item = compact("user_id","user_username","user_status");
        $res = $source_item;
    } else {
        $res = null;
    }
    return $res;
}

function postNews($req) {
  global $conn;
  extract($req);

  $sql = "INSERT INTO news (news_id,type,topic,detail,img_preview,img_full,slid_on)
          VALUES (null,'$type','$topic','$detail','$img_preview','$img_full','$slid_on')";
  if (mysqli_query($conn, $sql)) {
      $last_id = mysqli_insert_id($conn);
      $res = $last_id;
  } else {
      $res = mysqli_error($conn);
  }
  return $res;
}

function getNews($news_type){
  global $conn;
  if ($news_type == 99){
      $sql = "SELECT * FROM news";
  } else {
      $sql = "SELECT * FROM news WHERE type = '$news_type'";
  }

  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    $source_array = array();
    while($row = mysqli_fetch_assoc($result)) {
      extract($row);
      $source_item = compact("news_id","type","topic","detail","img_preview","img_full","slid_on","created_at","updated_at");
      array_push($source_array,$source_item);
    }
      $res = $source_array;
  } else {
      $res = null;
  }
  return $res;
}

function editNews($req) {
  global $conn;
  extract($req);

  if ($img_preview == 0 && $img_full ==0){
    $sql = "UPDATE news SET topic = '$topic', detail = '$detail', slid_on = '$slid_on' WHERE news_id = '$news_id'";
  } else if ($img_preview == 0) {
    $sql = "UPDATE news SET topic = '$topic', detail = '$detail',img_full = '$img_full',slid_on = '$slid_on' WHERE news_id = '$news_id'";
  } else if ($img_full ==0) {
    $sql = "UPDATE news SET topic = '$topic', detail = '$detail', img_preview = '$img_preview',slid_on = '$slid_on' WHERE news_id = '$news_id'";
  } else {
    $sql = "UPDATE news SET topic = '$topic', detail = '$detail', img_preview = '$img_preview',img_full = '$img_full',slid_on = '$slid_on' WHERE news_id = '$news_id'";
  }


  if (mysqli_query($conn, $sql)) {
      $res = true;
  } else {
      $res = null;
  }
  return $res;
}

function getNewsById($id,$news_type){
  global $conn;
  if ($news_type == 99){
      $sql = "SELECT * FROM news WHERE news_id = '$id'";
  } else {
     $sql = "SELECT * FROM news WHERE news_id = '$id' AND type = '$news_type'";
  }

  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      extract($row);
      $source_item = compact("news_id","type","topic","detail","img_preview","img_full","slid_on","created_at","updated_at");
      $res = $source_item;
  } else {
      $res = null;
  }
  return $res;
}

function deleteNews($id)
{
   global $conn;
   $sql = "DELETE FROM news WHERE news_id = '$id'";
   if (mysqli_query($conn, $sql)){
     $res = true;
   } else {
     $res = null;
   }
}

//ฟังก์ชั่นการดึงข้อมูล profile โดยใช้ userid
function getProfile($userid) {
  global $conn;

  $sql = "SELECT * FROM user_detail WHERE user_id = '$userid'";
  $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        extract($row);
        $source_item = compact("id","user_id","id_card","title","firstname","lastname","sex","birthday","blood_type","address","district","amphoe","province","zipcode","phone","facebook","email","picture");
        $res = $source_item;
    } else {
        $res = null;
    }
    return $res;
}

function getUser($status)
{
  global $conn;
  $sql = "SELECT * FROM user WHERE user_status = '$status'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
  $source_array = array();
  while($row = mysqli_fetch_assoc($result)) {
        extract($row);
        $user_detail = getUserDetail($user_id);
        $source_item = compact("user_id","user_username","user_provider","user_detail","created_at");

        array_push($source_array,$source_item);
      }
        $res = $source_array;
    } else {
        $res = null;
    }
    return $res;
}

function getUserById($id,$status)
{
  global $conn;
  $sql = "SELECT * FROM user WHERE user_id = '$id' AND user_status = '$status'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);
        extract($row);
        $user_detail = getUserDetail($user_id);

        $source_item = compact("user_id","user_username","user_provider","user_detail");

        $res =$source_item;
    } else {
        $res = null;
    }
    return $res;
}


function getUserDetail($id)
{
  global $conn;
  $sql = "SELECT * FROM user_detail WHERE user_id = '$id'";
  $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        extract($row);
        $user_address = compact("address","district","amphoe","province","zipcode");
        $source_item = compact("id","user_id","id_card","title","firstname","lastname","sex","birthday","blood_type","phone","facebook","email","picture","user_address");
        $res = $source_item;
    } else {
        $res = null;
    }
    return $res;
}

function editUser($req)
{
    global $conn;
    extract($req);
    $sql = "UPDATE user_detail SET id_card = '$id_card',title = '$title',firstname = '$myfirstname', lastname = '$lastname',sex = '$sex',
                                   birthday = '$birthday',blood_type = '$bloodtype', address = '$address',district = '$district',amphoe = '$amphoe',
                                   province = '$province',zipcode = '$zipcode',phone = '$phone',facebook = '$facebook',email = '$email'
            WHERE id = '$user_dt_id'";
    if (mysqli_query($conn, $sql)) {
        $res = true;
    } else {
        $res = null;
    }

    return $res;
}

//ฟังก์ชั่นการดึงค่าโรงพยาบาลโดใยใช้ชื่อโรงพยาบาล
function getHospitalByName($name) {
   global $conn;

    $sql = "SELECT * FROM hospital WHERE hospital_name = '$name'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            extract($row);
            $source_item = array(
                "hospital_id" => $hospital_id,
                "hospital_name" => $hospital_name,
                "hospital_address" => $hospital_address,
                "hospital_district" => $hospital_district,
                "hospital_amphoe" => $hospital_amphoe,
                "hospital_province" => $hospital_province,
                "hospital_zipcode" => $hospital_zipcode,
                "hospital_latitude" => $hospital_latitude,
                "hospital_logitude" => $hospital_logitude,
                "hospital_phone" => $hospital_phone,
                "hospital_img" => $hospital_img
            );
        $res = $source_item;
    } else {
        $res = null;
    }
  return $res;
}

//ฟังก์ชั่นการดึงค่าโรงพยาบาลโดใยใช้ชื่อโรงพยาบาล
function getHospitalById($id) {
   global $conn;

    $sql = "SELECT * FROM hospital WHERE hospital_id = '$id'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            extract($row);
            $source_item = array(
                "hospital_id" => $hospital_id,
                "hospital_name" => $hospital_name,
                "hospital_address" => $hospital_address,
                "hospital_district" => $hospital_district,
                "hospital_amphoe" => $hospital_amphoe,
                "hospital_province" => $hospital_province,
                "hospital_zipcode" => $hospital_zipcode,
                "hospital_latitude" => $hospital_latitude,
                "hospital_logitude" => $hospital_logitude,
                "hospital_phone" => $hospital_phone,
                "hospital_img" => $hospital_img
            );
        $res = $source_item;
    } else {
        $res = null;
    }
  return $res;
}

//ฟังก์ชั่นการ insert ข้อมูลลงตาราง blood_request คือตารางผู้ที่ต้องการโลหิตมาลงประกาศไว้
function postBloodRequest($req) {
  global $conn;
  extract($req);

  $sql = "INSERT INTO blood_request (blood_request_id,user_id,title,firstname, lastname,sex,blood_type,hospital_name,hospital_phone,case_description,time_delete,status)
          VALUES (null,'$userid','$title','$firstname', '$lastname','$sex','$bloodtype','$hospitalname','$hospitalphone','$casedescription','$time_delete','$status')";

  if (mysqli_query($conn, $sql)) {
    $res = true;
  } else {
    $res = false;
  }
  return $res;
}

//ฟังก์ชั่นการ insert ข้อมูลลงตาราง blood_request คือตารางผู้ที่ต้องการโลหิตมาลงประกาศไว้
function postBlood($req) {
  global $conn;
  extract($req);

  $profile = "INSERT INTO post_profile (profile_id,title,firstname, lastname,sex,blood_type,phone,email,facebook,address,district,amphoe,province,zipcode)
          VALUES (null,'$title','$firstname', '$lastname','$sex','$bloodtype','$phone','$email','$facebook','$address','$district','$amphoe','$province','$zipcode')";

  if (mysqli_query($conn, $profile)) {
      $profile_id = mysqli_insert_id($conn);
      $postblood = "INSERT INTO post (post_id,user_id,profile_id,hospital_id,case_description,time_delete,status)
              VALUES (null,'$userid','$profile_id','$hospital_id','$casedescription','$time_delete','$status')";
      if (mysqli_query($conn, $postblood)) {
        $post_id = mysqli_insert_id($conn);
        $res = getPostbyId($post_id);
      } else {
        $res = null;
      }

  } else {
    $res = false;
  }
  return $res;
}


//ฟังก์ชั่นการ insert ข้อมูลลงตาราง blood_request คือตารางผู้ที่ต้องการโลหิตมาลงประกาศไว้
function editPost($req) {
  global $conn;
  extract($req);

  $profile = "UPDATE post_profile SET title = '$title', firstname = '$firstname', lastname = '$lastname', sex = '$sex',
                                  blood_type = '$bloodtype', phone = '$phone', email = '$email', facebook = '$facebook',
                                  address = '$address', district = '$district',  amphoe = '$amphoe', province = '$amphoe', zipcode = '$zipcode'
                                  WHERE profile_id = '$post_id'";

  $postblood = "UPDATE post SET user_id = '$userid', profile_id = '$profile_id', hospital_id = '$hospital_id',
                             case_description = '$casedescription', time_delete = '$time_delete', status = '$status'
                            WHERE post_id = '$post_id'";

  if (mysqli_query($conn, $profile) && mysqli_query($conn, $postblood) ) {
        $res = getPostbyId($post_id);
  } else {
        $res = null;
  }

  return $res;
}


function deletePost($post_id,$user_id) {
    global $conn;
    $findpost = getPostbyId($post_id);

    $profile_id = $findpost['post_profile']['profile_id'];

    if ($findpost != null){

                  $post = "DELETE FROM post WHERE post_id = '$post_id'";
                  $post_profile = "DELETE FROM post_profile WHERE profile_id = '$profile_id'";

                  if (mysqli_query($conn, $post) && mysqli_query($conn, $post_profile)){
                    $res = true;

                  } else {
                    $res = null;
                  }
    } else {

      $res = null;

    }

    return $res;
}

function deletePostTime($date,$del){
global $conn;

$sql = "DELETE FROM post WHERE updated_at <= '$date' AND time_delete = '$del'";

if (mysqli_query($conn, $sql)){
  $res = true;

} else {
  $res = null;
}
}


function getPostbyId($id) {
  global $conn;

   $sql = "SELECT * FROM post WHERE post_id = '$id'";
   $result = mysqli_query($conn, $sql);
   if (mysqli_num_rows($result) > 0) {
           $row = mysqli_fetch_assoc($result);
           extract($row);
           $source_item = array(
               "post_id" => $post_id,
               "user_id" => $user_id,
               "post_profile" => gerPostProfilebyId($profile_id),
               "hospital" => getHospitalById($hospital_id),
               "case_description" => $case_description,
               "time_delete" => $time_delete,
               "status" => $status,
               "created_at" => $created_at,
               "updated_at" => $updated_at,
           );
       $res = $source_item;
   } else {
       $res = null;
   }
 return $res;

}

function gerPostProfilebyId($id='')
{
  global $conn;

   $sql = "SELECT * FROM post_profile WHERE profile_id = '$id'";
   $result = mysqli_query($conn, $sql);
   if (mysqli_num_rows($result) > 0) {
           $row = mysqli_fetch_assoc($result);
           extract($row);
           $source_item = array(
               "profile_id" => $profile_id,
               "title" => $title,
               "firstname" => $firstname,
               "lastname" => $lastname,
               "sex" => $sex,
               "blood_type" => $blood_type,
               "phone" => $phone,
               "email" => $email,
               "facebook" => $facebook,
               "address" => array(
                 "address" => $address,
                 "district" => $district,
                 "amphoe" => $amphoe,
                 "province" => $province,
                 "zipcode" => $zipcode
               ),
               "created_at" => $created_at,
               "updated_at" => $updated_at
           );
       $res = $source_item;
   } else {
       $res = null;
   }
 return $res;
}

function getPostbyUserId($user_id) {
  global $conn;

   $sql = "SELECT * FROM post WHERE user_id = '$user_id' ORDER BY  created_at DESC ";
   $result = mysqli_query($conn, $sql);
   if (mysqli_num_rows($result) > 0) {
     $source_array = array();
     while($row = mysqli_fetch_assoc($result)) {
           extract($row);
           $source_item = array(
               "post_id" => $post_id,
               "user_id" => $user_id,
               "post_profile" => gerPostProfilebyId($profile_id),
               "hospital" => getHospitalById($hospital_id),
               "case_description" => $case_description,
               "time_delete" => $time_delete,
               "status" => $status,
               "created_at" => $created_at,
               "updated_at" => $updated_at,
           );
           array_push($source_array,$source_item);
        }
       $res = $source_array;
   } else {
       $res = null;
   }
 return $res;

}


function getAllPost() {
  global $conn;
 
   $sql = "SELECT * FROM blood_request ORDER BY  created_at DESC ";
   $result = mysqli_query($conn, $sql);
   if (mysqli_num_rows($result) > 0) {
     $source_array = array();
     while($row = mysqli_fetch_assoc($result)) {
           extract($row);
           $source_item = array(
               "post_id" => $blood_request_id,
               "user_id" => $user_id,
               "post_profile" => getUserDetail(27),
               "hospital" => getHospitalById(3),
               "case_description" => $case_description,
               "time_delete" => $time_delete,
               "status" => $status,
               "created_at" => $created_at,
               "updated_at" => $update_at, 
           );
           array_push($source_array,$source_item);
        }
       $res = $source_array;
   } else {
       $res = null;
   }
 return $res;

}




//ฟังก์ชั่นการดึง bloodlist คือฟังก์ชั่นในการดึงข้อมูลของผู้ที่มาลงประกาศ
function getbloodList() {
  global $conn;
  $sql = "SELECT * FROM blood_request";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    $source_array = array();
    while($row = mysqli_fetch_assoc($result)) {
      extract($row);
      $source_item = array(
                "blood_request_id" => $blood_request_id,
                "user_id" => $user_id,
                "title" => $title,
                "firstname" => $firstname,
                "lastname" => $lastname,
                "sex" => $sex,
                "blood_type" => $blood_type,
                "hospital_name" => $hospital_name,
                "hospital_phone" => $hospital_phone,
                "case_description" => $case_description,
                "created_at" =>  DateThai($created_at)
      );
      array_push($source_array,$source_item);
      }
      $res = $source_array;
  } else {
      $res = null;
  }
  return $res;
}

//ฟังก์ชั่นการดึงข้อมูลผู้ที่มาลงประกาศหาโลหิตโดยใช้ id
function getbloodById($id) {
  global $conn;
  $sql = "SELECT * FROM blood_request WHERE blood_request_id = '$id'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      extract($row);
      $source_item = array(
                "blood_request_id" => $blood_request_id,
                "user_id" => $user_id,
                "title" => $title,
                "firstname" => $firstname,
                "lastname" => $lastname,
                "sex" => $sex,
                "blood_type" => $blood_type,
                "hospital_name" => $hospital_name,
                "hospital_phone" => $hospital_phone,
                "case_description" => $case_description,
                "created_at" =>  DateThai($created_at)
      );

      $res = $source_item;
  } else {
      $res = null;
  }
  return $res;
}

function goLoginWithFacebook($req) {
  global $conn;
  extract($req);

  $sql = "SELECT * FROM user WHERE facebook_id = '$fid'";
  $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        extract($row);
        $source_item = compact("user_id","facebook_id","user_username","user_status");
        $res = $source_item;
    } else {
        $res = null;
    }
    return $res;
}

function checkInfomation($id)
{
  global $conn;

  $sql = "SELECT * FROM user_detail WHERE user_id = '$id'";
  $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        extract($row);
        $res = true;
    } else {
        $res = false;
    }
    return $res;
}

function goRegisWithFacebook($req)
{
  global $conn;
  extract($req);
}


function checkCardId($id)
{
  global $conn;

  $sql = "SELECT * FROM user_detail WHERE id_card = '$id'";
  $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $res = true;
    } else {
        $res = false;
    }
    return $res;
}

function checkEmail($email)
{
  global $conn;

  $sql = "SELECT * FROM user_detail WHERE email = '$email'";
  $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $res = true;
    } else {
        $res = false;
    }
    return $res;
}


function getMyPost($id='')
{
  global $conn;
  $sql = "SELECT * FROM blood_request WHERE user_id = '$id'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    $source_array = array();
    while($row = mysqli_fetch_assoc($result)) {
      extract($row);
      $source_item = array(
                "blood_request_id" => $blood_request_id,
                "user_id" => $user_id,
                "title" => $title,
                "firstname" => $firstname,
                "lastname" => $lastname,
                "sex" => $sex,
                "blood_type" => $blood_type,
                "hospital_name" => $hospital_name,
                "hospital_phone" => $hospital_phone,
                "case_description" => $case_description,
                "time_delete" => $time_delete,
                "created_at" => DateThai($created_at)
      );
      array_push($source_array,$source_item);
      }
      $res = $source_array;
  } else {
      $res = null;
  }
  return $res;
}

function getEmail($bloodtype,$hospital_id)
{
   $district = getEmailByHospital($bloodtype,$hospital_id,"district");
   if ($district != null){
     $res = $district;
   } else {
     $amphoe = getEmailByHospital($bloodtype,$hospital_id,"amphoe");
     if ($amphoe != null){
       $res = $amphoe;
     } else {
       $province = getEmailByHospital($bloodtype,$hospital_id,"province");
       if($province != null){
         $res = $province;
       }else {
         $res = null;
       }
     }
   }
   return $res;
}

function getEmailByHospital($bloodtype,$hospital_id,$findby) {
  global $conn;

  $hospital = getHospitalById($hospital_id);

  if($findby == "district"){
      $data = findEmail($bloodtype,$findby,$hospital['hospital_district']);
      if($data != null){
        $res = $data;
      } else {
        $res = null;
      }
  } elseif ($findby == "amphoe") {
      $data = findEmail($bloodtype,$findby,$hospital['hospital_amphoe']);
      if($data != null){
        $res = $data;
      } else {
        $res = null;
      }
  } elseif ($findby == "province") {
      $data = findEmail($bloodtype,$findby,$hospital['hospital_province']);
      if($data != null){
        $res = $data;
      } else {
        $res = null;
      }
  } else {
    $res = null;
  }
  return $res;
}

function findEmail($bloodtype,$findby,$find_data)
{
  global $conn;
  if ($bloodtype == "A Rh+"){
      $sql = "SELECT * FROM user_detail WHERE blood_type = 'A Rh+' OR blood_type = 'A Rh-' and $findby = '$find_data' ";
  } else if ($bloodtype == "A Rh-") {
      $sql = "SELECT * FROM user_detail WHERE blood_type = 'A Rh+' OR blood_type = 'A Rh-' OR blood_type = 'AB Rh-' OR blood_type = 'AB Rh-' and $findby = '$find_data' ";
  } else if ($bloodtype == "B Rh+") {
      $sql = "SELECT * FROM user_detail WHERE blood_type = 'B Rh+' OR blood_type = 'AB Rh-' and $findby = '$find_data' ";
  } else if ($bloodtype == "B Rh-") {
      $sql = "SELECT * FROM user_detail WHERE blood_type = 'B Rh+' OR blood_type = 'B Rh-' OR blood_type = 'AB Rh-' OR blood_type = 'AB Rh-' and $findby = '$find_data' ";
  } else if ($bloodtype == "O Rh+") {
      $sql = "SELECT * FROM user_detail WHERE blood_type = 'O Rh+' OR blood_type = 'A Rh+' OR blood_type = 'B Rh+' OR blood_type = 'AB Rh+' and $findby = '$find_data' ";
  } else if ($bloodtype == "O Rh-") {
      $sql = "SELECT * FROM user_detail WHERE blood_type = 'O Rh+' OR blood_type = '0 Rh-' OR blood_type = 'B Rh+' OR blood_type = 'B Rh-' OR blood_type = 'AB Rh+' OR blood_type = 'AB Rh+' and $findby = '$find_data' ";
  } else if ($bloodtype == "AB Rh+") {
      $sql = "SELECT * FROM user_detail WHERE blood_type = 'AB Rh+' and $findby = '$find_data' ";
  } else if ($bloodtype == "AB Rh-") {
      $sql = "SELECT * FROM user_detail WHERE blood_type = 'AB Rh+' OR blood_type = 'AB Rh+' and $findby = '$find_data' ";
  }

  $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $source_array = array();
        while($row = mysqli_fetch_assoc($result)) {
        extract($row);
        $source_item = compact("id","user_id","id_card","title","firstname","lastname","sex","birthday","blood_type","address","district","amphoe","province","zipcode","phone","facebook","email","picture");
        array_push($source_array,$source_item);
        }
        $res = $source_array;
    } else {
       $res = null;

    }
    return $res;
}





/*helper*/

function DateThai($strDate)
	{
		$strYear = date("Y",strtotime($strDate))+543;
		$strMonth= date("n",strtotime($strDate));
		$strDay= date("j",strtotime($strDate));
		$strHour= date("H",strtotime($strDate));
		$strMinute= date("i",strtotime($strDate));
		$strSeconds= date("s",strtotime($strDate));
		$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
		$strMonthThai=$strMonthCut[$strMonth];
		return "$strDay $strMonthThai $strYear, $strHour:$strMinute";
}


?>
