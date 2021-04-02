<?php
    require_once "g-config.php";

	// if (isset($_SESSION['access_token'])) {
	// 	header('Location: google_account.php');
	// 	exit();
	// }

	$loginURL = $gClient->createAuthUrl();
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<script src="https://apis.google.com/js/platform.js" async defer></script>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v6.0&appId=568880570363955&autoLogAppEvents=1"></script>
<meta name="google-signin-client_id" content="830702547783-8t0fq2spou9petddd7ibh6gqa9av56dr.apps.googleusercontent.com">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

<title>Login with Facebook</title>
<style>
span { clear:both; display:block; margin-bottom:30px; }
span a { font-weight:bold; color:#0099FF; }
.clearfix {
	clear:both;
}

.wrapperDiv {
    margin:0 auto;
	width:400px;
	background-color:#6495ed;
}

.login_image {
	display:block;
	margin:auto;
	position:absolute;
	top:0;
	right:0;
	bottom:0;
	left:0;
	height:100px;
	width:300px;
}
</style>
</head>

<?php include('config.php'); ?>
<?php include('oauth-user.php'); ?>

<body> 
	<div class="wrapperDiv">

		<?php
		//If no $accessToken is set then user should log in first
		if(isset($accessToken)) {
			if(isset($_SESSION['facebook_access_token'])){
				$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
			} else {
				// Put short-lived access token in session
				$_SESSION['facebook_access_token'] = (string) $accessToken;
				
				// The OAuth 2.0 client handler helps us manage access tokens
				$oAuth2Client = $fb->getOAuth2Client();
				
				if(!$accessToken->isLongLived()) {
					//Exchanges a short-lived access token for a long-lived one
					try {
						$accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
						$_SESSION['facebook_access_token'] = (string) $accessToken;
					} catch (Facebook\Exceptions\FacebookSDKException $e) {
						echo "<p>Error getting long-lived access token: " . $helper->getMessage() . "</p>\n\n";
						exit;
					}
				}			
			}
			
			// Redirect the user back to the same page if url has "code" parameter in query string
			if(isset($_GET['code'])){
				header('Location: ./');
			}
			
			
			// Getting user facebook profile info
			try {
				$profileRequest = $fb->get('/me?fields=name,first_name,last_name,email,link,gender,locale,picture');
				$fbUserData = $profileRequest->getGraphNode()->asArray();
				
				//Ceate an instance of the OauthUser class
				$oauth_user_obj = new OauthUser();
				$userData = $oauth_user_obj->verifyUser($fbUserData);
			} catch(FacebookResponseException $e) {
				echo 'Graph returned an error: ' . $e->getMessage();
				session_destroy();
				// Redirect user back to app login page
				header("Location: ./");
				exit;
			} catch(FacebookSDKException $e) {
				echo 'Facebook SDK returned an error: ' . $e->getMessage();
				session_destroy();
				// Redirect user back to app login page
				header("Location: ./");
				exit;
			}
		
		
			// Get logout url
			//$logoutURL = $helper->getLogoutUrl($accessToken, 'http://localhost/mit-demos/facebook-login/logout.php');
			
		
			
		} else {
			// Get login url
			$loginUrl = $helper->getLoginUrl($redirectUrl);
			echo '<a href="'.htmlspecialchars($loginUrl).'"><img class="login_image" src="fblogin-btn.png"></a>';
		}
	?>
	</div>
	<center>
	<?php
		include "login.php";
	?>
</body>
</html>


<script>
function onSignIn(googleUser) {
  var profile = googleUser.getBasicProfile();
  console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
  console.log('Name: ' + profile.getName());
  console.log('Image URL: ' + profile.getImageUrl());
  console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
}

</script>

<!-- 
<a href="#" onclick="signOut();">Sign out</a>
<script>
  function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
      console.log('User signed out.');
    });
  }
</script> -->