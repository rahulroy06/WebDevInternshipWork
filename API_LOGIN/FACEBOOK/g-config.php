<?php
	session_start();
	require_once "GoogleAPI/vendor/autoload.php";
	$gClient = new Google_Client();
	$gClient->setClientId("830702547783-8t0fq2spou9petddd7ibh6gqa9av56dr.apps.googleusercontent.com");
	$gClient->setClientSecret("A7qS6zk-RoOpZbBvvcbyQAHy");
	$gClient->setApplicationName("CPI Login Tutorial");
	$gClient->setRedirectUri("http://localhost/GoogleLogin/g-callback.php");
	$gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");
?>
