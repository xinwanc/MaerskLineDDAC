<?php
include '../PHPCode/AdminLoginSession.php';
include'../PHPCode/CreateScheduleHandler.php';
?>
<html lang="en">
<head>
<title>Create Schedule</title>
<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Classy Register Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Meta tag Keywords -->
<!-- css files -->
<link href="../css/CreateSchedule.css" rel="stylesheet" type="text/css" media="all">
<!-- Bootstrap Core CSS -->
 <link href="../css/userpanelcss/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- //css files -->
<!-- online-fonts -->
<link href="//fonts.googleapis.com/css?family=Cuprum:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext,vietnamese" rel="stylesheet">
<!--//online-fonts -->
</head>
<body>
<div class="header">
	<h1>Create Vessel Schedule</h1>
</div>
    <div class="w3-main" style="margin-bottom: 40px;">
	<!-- Main -->
	<div class="about-bottom main-agile book-form">
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
			<div class="form-date-w3-agileits">
				<label>Vessel Name</label>
                                <select name="VesselName" required="" style="color: #31b0d5; font-weight: bold;">
                                    <option value="ASIAN KING">ASIAN KING</option>
                                    <option value="MSC ATHOS">MSC ATHOS</option>											
                                    <option value="GLOVIS CENTURY">GLOVIS CENTURY</option>									
                                    <option value="SAN FRANCISCO BRIDGE">SAN FRANCISCO BRIDGE</option>										
                                    <option value="GREEN LAKE">GREEN LAKE</option>										
                                    <option value="DON CARLOS">DON CARLOS</option>										
                                    <option value="HEROIC ACE">HEROIC ACE</option>                                                                      
                                    <option value="EVER URSULA">EVER URSULA</option>                                                                                                                                           
                                    <option value="HYUNDAI VOYAGER">HYUNDAI VOYAGER</option>							
                                </select>
				<label>Harbor</label>										
                                <select name="Harbor" required="" style="color: #31b0d5; font-weight: bold;">											
                                    <option value="TAC">TAC</option>								
                                    <option value="SEA">SEA</option>									
                                </select>
				<label>Terminal</label>					
                                <select name="Terminal" required="" style="color: #31b0d5; font-weight: bold;">										
                                    <option value="WeycoLog">Weyco Log</option>										
                                    <option value="Terminal3">Terminal 3</option>										
                                    <option value="T18">T18</option>										
                                    <option value="T30">T30</option>										
                                    <option value="Terminal 7 A/B">Terminal 7 A/B</option>										
                                    <option value="TacomaContainerTerminalm">Tacoma Container Terminal</option>						
                                    <option value="BlairTerminal">Blair Terminal</option> 						
                                </select>
                                <label> Estimated Date Departure</label>
                                <input type="date" name="EstimatedDateDeparture" required="" style="color: #31b0d5; font-weight: bold;">
                                <p class="creating" style="margin-top:-20px;"><?php if(in_array("Date Problem<br>", $CheckSame)) echo "The departure should not be less than or equal to current date";?></p>
                                <label> Estimated Time Departure</label>
                                <input type="time" name="EstimatedTimeDeparture" required="" style="color: #31b0d5; font-weight: bold;">
				<label> Estimated Date Arrival</label>
                                <input type="date" name="EstimatedDateArrival" required="" style="color: #31b0d5; font-weight: bold;">
                                <p class="creating" style="margin-top:-20px;"><?php if(in_array("Final Arrival Date cannot same as or before departure date<br>", $CheckSame)) echo "The arrival date should not be same as or before departure date";?></p>
                                 <label> Estimated Time Arrival</label>
                                <input type="time" name="EstimatedTimeArrival" required="" style="color: #31b0d5; font-weight: bold;">
                                <label>Space Available</label>
                                <input type="number" name="SpaceAvailable" required="" min="1" max="18000" style="color: #31b0d5; font-weight: bold;">
                                <p class="notify" style="margin-top:-20px;"><?php echo "Remarks: You only can enter between 1 to 18,000 capacity";?></p>
                                <p class="creating"><?php if(in_array("The details have been added<br>", $CheckSame)) echo "The vessel schedule has been created";?></p>
			</div>
			<div class="make wow shake">
				  <input type="submit" class="btn btn-success btn-default" value="Create Schedule" name="Create">
                                  <a style="margin-top: 1.5em;" class="btn btn-success btn-default" href="AdminDashboardUI.php" role="button">Back</a>
                        </div>
		</form>
	</div>
	<!-- //Main -->
</div>
<!-- js-scripts-->
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<script type="text/javascript" src="../js/jquery-2.1.4.min.js"></script>
		<script>$(document).ready(function(c) {
		$('.alert-close').on('click', function(c){
			$('.main-agile').fadeOut('slow', function(c){
				$('.main-agile').remove();
			});
		});	  
	});
	</script>
<!-- //js-scripts-->
<!-- Bootstrap Core JavaScript -->
   <script src="../js/userjs/bootstrap.min.js"></script>
</body>
</html>
