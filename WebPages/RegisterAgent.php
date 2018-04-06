<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php
    include '../PHPCode/AdminLoginSession.php';
    require '../PHPCode/RegisterAgentHandler.php';
?>

<html>
    <head>
        <title>Register Agent</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Easy Admin Panel Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
 <link href="../css/userpanelcss/bootstrap.min.css" rel='stylesheet' type='text/css' />
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
    </head>
    <body class="sign-in-up">
      <section>
			<div style="background-color: white;" id="page-wrapper" class="sign-in-wrapper">
				<div class="graphs">
					<div class="sign-up">
						<h3>Register The Agents!</h3>
						<h5>Personal Information</h5>
                                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                                                    <div class="sign-u">
							<div class="sign-up1">
								<h4>First Name* :</h4>
							</div>
							<div class="sign-up2">
									<input type="text" name="Register_FirstName" placeholder=" " value="<?php if (!empty($_POST['Register_FirstName'])) echo $FirstName;?>" required />
                                                                  <p class="creating"><?php if(in_array("FName only allow alphabets and spaces<br>", $ErrorArray)) echo "Please key in alphabets only"; ?></p>
								
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="sign-u">
							<div class="sign-up1">
								<h4>Last Name* :</h4>
							</div>
							<div class="sign-up2">
								
									<input type="text" name="Register_LastName" placeholder=" " value="<?php if (!empty($_POST['Register_LastName'])) echo $LastName;?>" required/>
                                                                         <p class="creating"><?php if(in_array("LName only allow alphabets and spaces<br>", $ErrorArray)) echo "Please key in alphabets only"; ?></p>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="sign-u">
							<div class="sign-up1">
								<h4>Email Address* :</h4>
							</div>
							<div class="sign-up2">
								
									<input type="text" name="Register_Email" placeholder=" " value="<?php if (!empty($_POST['Register_Email'])) echo $Email;?>" required/>
                                                                         <p class="creating"><?php if(in_array("Email Format Is Wrong<br>", $ErrorArray)) echo "Email format is wrong"; 
                                                    else if (in_array("Email Already Exist<br>", $ErrorArray))echo "Email Exist";?></p>
								
							</div>
							<div class="clearfix"> </div>
						</div>
						<h6>Login Credentials</h6>
                                                <div class="sign-u">
							<div class="sign-up1">
								<h4>Username* :</h4>
							</div>
							<div class="sign-up2">
								
									<input type="text" name="Register_UserName" placeholder=" " value="<?php if (!empty($_POST['Register_UserName'])) echo $UserName;?>" required/>
                                                                         <p class="creating"><?php if(in_array("Username only allow alphabenumeric characters<br>", $ErrorArray)) echo "Only alphabenumeric characters allowed"; 
                                                    else if (in_array("Username Already Exist<br>", $ErrorArray))echo "Username has exist";?></p>
								
							</div>
							<div class="clearfix"> </div>
						</div>
                                                <div class="sign-u">
							<div class="sign-up1">
								<h4>Password* :</h4>
							</div>
							<div class="sign-up2">
								
									<input type="password" name="Register_Password" placeholder=" " required/>
								
							</div> 
                                             
							<div class="clearfix"> </div>
						</div>
						<div class="sign-u">
							<div class="sign-up1">
								<h4>Confirm Password* :</h4>
							</div>
							<div class="sign-up2">
								
									<input type="password" name="Register_ConfirmPassword" placeholder=" " required/>
                                                                        <p class="creating"><?php if(in_array("Password not match<br>", $ErrorArray)) echo "Password Not Match"; else if(in_array("Password only allow alphabenumeric characters<br>", $ErrorArray)) echo "Only alphanumeric characters allowed";?></p>
							
							</div>
                                                   
							<div class="clearfix"> </div>
						</div>
						
							<div class="sub_home_left">
                                                            <p class="creating"><?php if(in_array("The details have been added<br>", $ErrorArray)) echo "The agent has been registered";?></p>
							    <input type="submit" name="Register_Button" value="Register">
							</div>
                                                

							<div class="sub_home_right">
                                                            <p>Go Back to <a href="AdminDashboardUI.php">Home</a></p>
							</div>
							<div class="clearfix"> </div>
                                                
                                                
                                                </form>
						
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
