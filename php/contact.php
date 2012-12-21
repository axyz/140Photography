<?php
if(isset($_POST['submit'])) {

//Check to make sure that the name field is not empty
if(trim($_POST['yourName']) == '') {
  $hasError = true;
} else {
  $yourName = trim($_POST['yourName']);
}

//Check to make sure sure that a valid email address is submitted
if(trim($_POST['yourEmail']) == '') {
  $hasError = true;
} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['yourEmail']))) {
  $hasError = true;
} else {
  $yourEmail = trim($_POST['yourEmail']);
}

//Check to make sure comments were entered
if(trim($_POST['message']) == '') {
  $hasError = true;
} else {
  if(function_exists('stripslashes')) {
    $message = stripslashes(trim($_POST['message']));
  } else {
    $message = trim($_POST['message']);
  }
}

//If there is no error, send the email
if(!isset($hasError)) {
  $emailTo = '140photography@gmail.com'; // Put your own email address here
  $body = "Name: $yourName \n\nEmail: $yourEmail \n\nSubject: $yourName \n\nComments:\n $message";
  $headers = 'From: My Site <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $yourEmail;
  mail($emailTo, $yourName, $body, $headers);
  $emailSent = true;
  }
}
?>