<?php
 require '../PHPCode/AgentSystemLogin.php';
?>
<html>
    <head>
    <title>Agent Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Easy Admin Panel Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
 <link href="../css/userpanelcss//bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="../css/userpanelcss/style.css" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="../css/userpanelcss/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<!-- lined-icons -->
<link rel="stylesheet" href="../css/userpanelcss/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->
<!-- chart -->
<script src="../js/userjs/Chart.js"></script>
<!-- //chart -->
<!--animate-->
<link href="../css/userpanelcss/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="../js/userjs/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
<!----webfonts--->
<link href='//fonts.googleapis.com/css?family=Cabin:400,400italic,500,500italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
<!---//webfonts---> 
 <!-- Meters graphs -->
 <script src="../js/userjs/jquery-1.10.2.min.js"></script>
<!-- Placed js at the end of the document so the pages load faster -->
    </head>
    <body class="sign-in-up">
    <section>
			<div id="page-wrapper" class="sign-in-wrapper">
				<div class="graphs">
					<div class="sign-in-form">
						<div class="sign-in-form-top">
                                                    <p><span style="color:darkblue;">Sign In As Agent</span></p>
						</div>
						<div class="signin">
							<div class="signin-rit">
                                                            <p><a href="../index.php">Return Home</a> </p>
								<div class="clearfix"> </div>
							</div>
							<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
							<div class="log-input">
								<div class="log-input-left">
								   <input type="text" class="user" placeholder="Your Username" required="" name="Username"/>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="log-input">
								<div class="log-input-left">
								   <input type="password" class="lock" placeholder="Password" required="" name="Password"/>
								</div>
                                                            <p class="creating"><?php if(in_array("Username or password is wrong<br>", $errorarray1)) echo "Sorry,your username or password is wrong or the account is not exist. Please double check.";?></p>
								<div class="clearfix"> </div>
							</div>
							<input type="submit" name="Agent_Login" value="Login">
						</form>	 
						</div>
					</div>
				</div>
			</div>
	</section>
	
        <script src="../js/userjs/jquery.nicescroll.js"></script>
        <script src="../js/userjs/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="../js/userjs/bootstrap.min.js"></script>
</body>
</html>

