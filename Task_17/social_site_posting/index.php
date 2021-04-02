<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="jssocials.css" />
    <link rel="stylesheet" type="text/css" href="jssocials-theme-minima.css" />
</head>
<body style="background-image: url('img.jpg');background-size: cover;  text-align: center;">
 <div style="padding:20px;">
	<h2 style="color:red">GEXTON EDUCATION</h2>
	<p>Click on a social site button to share gexton link.</p>
 </div>
 <div id="share"></div>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="jssocials.min.js"></script>
    <script>
		jsSocials.shareStrategies["my_popup"] = function(args) {
		return $("<div>").click(function() {
            window.open(args.shareUrl, "MyShareWindow", 
                "width=800, height=600, location=1, resizeable=1, menubar=0, scrollbars=0, status=0, titlebar=0, toolbar=0");
        });
		};
	var linkurl= 'https://www.muet.edu.pk/'
        $("#share").jsSocials({
			url: linkurl,
			shareIn: "my_popup",
            shares: ["twitter", "facebook", "googleplus", "linkedin", "pinterest", "whatsapp"]
        });
    </script>
</body>
</html>