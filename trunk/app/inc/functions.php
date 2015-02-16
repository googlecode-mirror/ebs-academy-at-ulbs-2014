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

function sendEmail($subject, $body, $from, $to) {
	require_once APP_PATH . 'helpers/PHPMailer-master/class.phpmailer.php';
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->SMTPDebug = 1;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';
        $mail->Host = 'tls://smtp.gmail.com';
        $mail->Port = '465';
        $mail->isMail(true);
        $mail->Username = 'icontiu@gmail.com';
        $mail->Password = 'pass';
        $mail->setFrom($from);
        $mail->Subject =$subject;
        $mail->Body = $body;
        $mail->addAddress($to);

        if ($mail->send()) {

          return true;
        } else {

           return false;
        }
}


