<?php
/* check if the user is already logged in
* return bool
*/
function isUserLoggedIn() {
	if (!isset($_SESSION['uid'])) {
		redirect('main/login');
	}
}

function redirect($url,$alertmsg='') {
  header('Location: '.myUrl($url));
  exit;
}

function myUrl($url='',$fullurl=false) {
  $s=$fullurl ? WEB_DOMAIN : '';
  $s.=WEB_FOLDER.$url;
  return $s;
}

function getUserType() {
	return $_SESSION['user_type'];
}


