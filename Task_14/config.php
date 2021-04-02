<?php
     
    session_start();
    require_once "GoogleAPI/vendor/autoload.php";
    $g_Client = new Google_Client();
    $g_Client->setClientID("");
    $g_Client->setClientSecret("");
    $g_Client->setRedireetUrl("http://localhost/API_LOGIN/FACEBOOK//g-callback.php")
    $g_Client->setApplicationName("Google Login Page ")
?>