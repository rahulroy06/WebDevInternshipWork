<?php
session_start();
require_once __DIR__ . '/Facebook/autoload.php';
// Include required libraries
use Facebook\Facebook;
use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;

$redirectUrl   = 'http://localhost/API_LOGIN/FACEBOOK/'; //Callback URL  
//$permissions = array('email');  //Optional permissions

$fb = new Facebook([
  'app_id' => '568880570363955', // Replace fb_app_id with your app id
  'app_secret' => '2763e25fb26b2489e3b5c786ff0a250c',  // Replace fb_app_secret with your app secret key
  'default_graph_version' => 'v2.2',
  ]);

$helper = $fb->getRedirectLoginHelper();
if (isset($_GET['state'])) {
    $helper->getPersistentDataHandler()->set('state', $_GET['state']);
}

try {
	if(isset($_SESSION['facebook_access_token'])) {
		$accessToken = $_SESSION['facebook_access_token'];
	} else {
  		$accessToken = $helper->getAccessToken();
	}
}catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK error: ' . $e->getMessage();
  exit;
}


?>