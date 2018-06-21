
var bFbStatus = false;
var fbID = "";
var fbName = "";
var fbEmail = "";

window.fbAsyncInit = function() {
  FB.init({
    appId      : '1292037427567316',
    cookie     : true,
    xfbml      : true,
    version    : 'v2.11'
  });
  FB.AppEvents.logPageView();
};

(function(d, s, id){
   var js, fjs = d.getElementsByTagName(s)[0];
   if (d.getElementById(id)) {return;}
   js = d.createElement(s); js.id = id;
   js.src = "//connect.facebook.net/th_TH/sdk.js";
   fjs.parentNode.insertBefore(js, fjs);
 }(document, 'script', 'facebook-jssdk'));


function statusChangeCallback(response)
{

  if(bFbStatus == false)
  {
    fbID = response.authResponse.userID;

      if (response.status == 'connected') {
      getCurrentUserInfo(response)
      } else {
      FB.login(function(response) {
        if (response.authResponse){
        getCurrentUserInfo(response)
        } else {
        console.log('Auth cancelled.')
        }
      }, { scope: 'email,user_birthday' });
      }
  }


  bFbStatus = true;
}


  function getCurrentUserInfo() {
    FB.api('/me?fields=name,first_name,last_name,email,picture.width(400).height(400),gender', function(userInfo) {
    console.log(userInfo)
      $("#hdnFbID").val(userInfo.id);
			$("#hdnName ").val(userInfo.name);
      $("#hdnFirstname").val(userInfo.first_name);
      $("#hdnLastname").val(userInfo.last_name)
			$("#hdnEmail").val(userInfo.email);
      $("#hdnPicture").val(userInfo.picture.data.url);
      $("#gender").val(userInfo.gender);
			$("#frmMain").submit();
    });
  }

function checkLoginState() {
FB.getLoginStatus(function(response) {
  statusChangeCallback(response);
});
}
