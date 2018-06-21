let base_url = "../../backend/service/main/";
let base_uploads = "../../backend/uploads/"

function getPost(){
$.getJSON( base_url+"getpost.php?id=all", function( response ) {
   $.each(response.data,function(i,data){
     $("#post-data").append(`
       <tr>
       <td>${i+1}</td>
       <td>${data.post_profile.firstname}</td>
       <td>${data.post_profile.lastname}</td>
       <td>${data.post_profile.blood_type}</td>
       <td>${data.hospital.hospital_name}</td>
       <td>${data.hospital.hospital_phone}</td>
       <td>${data.created_at}</td>
       <td><a role="button" class="btn btn-success" href="./postdetail.php?id=${data.post_id}">ดูโพส</a></td>
       <tr>`)
   })

});
}

function getUser(status){
$.getJSON( base_url+"getuser.php?status="+status, function( response ) {
   $.each(response.data,function(i,data){
     $("#post-data").append(`
       <tr>
       <td>${i+1}</td>
       <td>${data.user_username}</td>
       <td>${data.user_detail.firstname !=null ? data.user_detail.firstname : "" }</td>
       <td>${data.user_detail.lastname}</td>
       <td>${data.user_detail.sex}</td>
       <td>${data.user_detail.blood_type}</td>
       <td>${data.user_detail.user_address.district}</td>
       <td>${data.user_detail.user_address.amphoe}</td>
       <td>${data.user_detail.user_address.province}</td>
       <td>${data.user_provider}</td>
       <td><a role="button" class="btn btn-success" href="./userdetail.php?id=${data.user_id}">ดู</a>
       <a role="button" class="btn btn-warning" href="./edituser.php?id=${data.user_id}">แก้ไข</a>
       <a role="button" class="btn btn-danger" href="./deletedetail.php?id=${data.user_id}">ลบ</a>
       </td>
       <tr>`)
   })

});
}

function getEditProfile(id) {
  $.getJSON(`${base_url}profile.php?userid=${id}`, function( response ) {
    let item = response.data;
    $("#idcard").val(item.id_card)
    $("#firstname").val(item.firstname)
    $("#lastname").val(item.lastname)
    $("#address").val(item.address)
    $("#district").val(item.district)
    $("#amphoe").val(item.amphoe)
    $("#province").val(item.province)
    $("#zipcode").val(item.zipcode)
    $("#email").val(item.email)
    $("#facebook").val(item.facebook)
    $("#phone").val(item.phone)

  });
}



function getNewsbyId(id){
$.getJSON( base_url+"getnews.php?id="+id, function( response ) {
     let item = response.data;
     $("#news-header").html(`<h4> [  ${checkNresType(item.type)} ] ${item.topic} </h4>`)
     $("#news-body").html(`<img src="${base_uploads}/${item.img_full}" style="" alt=""> <br><br> ${item.detail}`)
});
}

function getEditNewsbyId(id){
$.getJSON( base_url+"getnews.php?id="+id, function( response ) {
     let item = response.data;
     $("#topic").val(`${item.topic}`)
     $("#editor").html(`${item.detail}`)
     $("#imgPreview").attr( "src", `${base_uploads}${item.img_preview}` );
     $("#imgFull").attr( "src", `${base_uploads}${item.img_full}` );
     if ( item.slid_on == 1){
         $("#slid_on").attr('checked',true);
         $("#slid_on").val(1)
     } else {
         $("#slid_on").val(0)
     }
});
}


function getNews(type,page){
$.getJSON( base_url+"getnews.php?id=all&type="+type, function( response ) {
     let item = response.data;
  $.each(item,function(i,data){
     let dthtml = data.detail;
     var div = document.createElement("div");
         div.innerHTML = dthtml.replace(/\&nbsp;/g, '');
     var dttext = div.textContent.replace(/\&nbsp;/g, '') || div.innerText.replace(/\&nbsp;/g, '') || "";


     $("#news-data").append(`
       <tr>
       <td>${i+1}</td>
       <td>${checkNresType(data.type)}</td>
       <td>${data.topic.substr(0, 50)}</td>
      <!-- <td>${dttext.substr(0, 50)}</td> !-->
       <td>${data.slid_on == 0 ? "ไม่แสดง" : "แสดง"}</td>
       <td>${data.created_at}</td>
       <td><a role="button" class="btn btn-success" href="./viewnews.php?id=${data.news_id}">ดู</a>
       <a role="button" class="btn btn-warning" href="./editarticle.php?id=${data.news_id}">แก้ไข</a>
       <a role="button" class="btn btn-danger" href="../../backend/service/main/deletenews.php?id=${data.news_id}&page=${page}">ลบ</a>
       </td>
       <tr>
    `)

});
});

}

function getHospital(){
$.getJSON( base_url+"hospitalplace.php", function( response ) {
   $.each(response.data,function(i,data){
     $("#post-data").append(`
       <tr>
       <td>${i+1}</td>
       <td>${data.hospital_name}</td>
       <td>${data.hospital_district}</td>
       <td>${data.hospital_amphoe}</td>
       <td>${data.hospital_province}</td>
       <td>${data.hospital_zipcode}</td>
       <td>${data.hospital_phone}</td>
       <td><a role="button" class="btn btn-success" href="./postdetail.php?id=${data.post_id}">ดู</a></td>
       <tr>`)
   });
});
}



function checkNresType(type){
  if (type == 1){
    $res = "ข่าวประชาสัมพันธ์"
  } else if (type==2){
    $res = "ความรู้เกี่ยวกับโลหิต"
  } else if (type=3){
    $res = "ช่วยเหลือ"
  } else {
    $res = "อื่นๆ"
  }
  return $res
}
