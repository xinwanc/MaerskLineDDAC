<?php
include '../PHPCode/AgentLoginSession.php';
include '../PHPCode/BookVessel.php';
?>

<html>

<head>
	<title>Vessel Booking </title>
	<!-- Meta tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="application/x-javascript">
		addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); }
	</script>
	<!-- Meta tags -->
	<!--stylesheets-->
        <link href="../css/Vesselcss/style.css" rel='stylesheet' type='text/css' media="all">
	<!--//style sheet end here-->
	<!-- Calendar -->
        <link rel="stylesheet" href="../css/Vesselcss/jquery-ui.css" />
	<!-- //Calendar -->
        <link href="../css/Vesselcss/wickedpicker.css" rel="stylesheet" type='text/css' media="all" />
	<!-- Time-script-CSS -->

	<link href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
</head>

<body>
	<h1 class="header-w3ls">Vessel Booking Form</h1>
	<div class="appointment-w3">
		<form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']);?>" method="post">
			<div class="information">
				<h3>Vessel Schedule Information</h3>
				<div class="main">

					<div class="form-left-w3l">
                                            <label style="font-size: 20px;">Vessel Name:</label>
                                            <input style="margin-top: 10px;"type="text" value="<?php echo $VesselName; ?>" readonly="">
					</div>
					<div class="form-right-w3ls">
					<label style="font-size: 20px;">Harbor:</label>
                                            <input style="margin-top: 10px;"type="text" value="<?php echo $Harbor; ?>" readonly="">
					</div>
				</div>
				<div class="main">
                                    <div class="form-left-w3l">
                                            <label style="font-size: 20px;">Terminal:</label>
                                            <input style="margin-top: 10px;"type="text" value="<?php echo $Terminal; ?>" readonly="">
					</div>
					<div class="form-right-w3ls">
					<label style="font-size: 20px;">Estimated Date Departure:</label>
                                            <input style="margin-top: 10px;"type="text" value="<?php echo $EstimatedDateDeparture; ?>" readonly="">
					</div>
				</div>
				<div class="main">
					<div class="form-left-w3l">
                                            <label style="font-size: 20px;">Estimated Time Departure:</label>
                                            <input style="margin-top: 10px;"type="text" value="<?php echo $EstimatedTimeDeparture; ?>" readonly="">
					</div>
                                    <div class="form-right-w3ls">
					<label style="font-size: 20px;">Estimated Date Arrival:</label>
                                            <input style="margin-top: 10px;"type="text" value="<?php echo $EstimatedDateArrival; ?>" readonly="">
					</div>
				</div>
				<div class="main">
                                    <div class="form-left-w3l">
                                            <label style="font-size: 20px;">Estimated Time Arrival:</label>
                                            <input style="margin-top: 10px;"type="text" value="<?php echo $EstimatedTimeArrival; ?>" readonly="">
					</div>
                                     <div class="form-right-w3ls">
					<label style="font-size: 20px;">Space Available:</label>
                                            <input style="margin-top: 10px;"type="text" value="<?php echo $SpaceAvailable; ?>" name="SpaceAvailable" readonly="">
					</div>
				</div>
			</div>
                    <div class="personal">
				<h2>Customer Details</h2>
				<div class="main">
					<div class="form-left-w3l">
                                                <label style="font-size: 20px;">Company Name:</label>
                                                <input style="margin-top: 10px;" type="text" class="top-up" value="<?php if(!empty($CompanyName)) echo $CompanyName;?>"name="CompanyName" required="">
					</div>
					<div class="form-right-w3ls ">
                                            <label style="font-size: 20px;">Company Contact Number:</label>
						<input style="margin-top: 10px;" type="text" class="top-up" value="<?php if(!empty($CompanyContact)) echo $CompanyContact;?>" name="CompanyContact" required="">
                                                <p class="creating" style="margin-top:-20px;"><?php if(in_array("Contact number format is invalid<br>", $ValidateBooking)) echo "The contact number format is invalid, the format should be like 03-12345780"; else if(in_array("Contact Number Already Exist<br>", $ValidateBooking)) echo "The contact number has been existed for another customer";?></p>
						<div class="clearfix"></div>
					</div>

				</div>
				<div class="main">
					<div class="form-left-w3l">
                                                 <label style="font-size: 20px;">Company Email:</label>
						<input style="margin-top: 10px;" value="<?php if(!empty($CompanyEmail)) echo $CompanyEmail;?>" type="email" name="CompanyEmail" required="">
                                                <p class="creating" style="margin-top:-20px;"><?php if(in_array("Email Already Exist<br>", $ValidateBooking)) echo "The email has existed for another customer";?></p>
					</div>
					<div class="form-right-w3ls ">
                                               <label style="font-size: 20px;">Company Address:</label>
						<input style="margin-top: 10px;" value="<?php if(!empty($CompanyAddress)) echo $CompanyAddress;?>" type="text" class="top-up" name="CompanyAddress" required="">
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			<div class="passport">
				<h3>Item Details</h3>
				<div class="main">
					<div class="form-left-w3l">
                                                <label style="font-size: 20px;">Item Name:</label>
						<input style="margin-top: 10px;" type="text" value="<?php if(!empty($ItemName)) echo $ItemName;?>" name="ItemName" required="">
					</div>
					<div class="form-right-w3ls">
						<label style="font-size: 20px;">Item Weight(Measured in Kg):</label>
                                                <input style="margin-top: 10px;" type="number" step="0.1" value="<?php if(!empty($ItemWeight)) echo $ItemWeight;?>" name="ItemWeight" required="" min="1">
                                                <div class="clearfix"></div>
					</div>
				</div>
                                <div class="main">
                                    <div class="form-left-w3l">
                                                <label style="font-size: 20px;">Number of Cargo Capacity:</label>
                                                <input style="margin-top: 10px;" type="number" name="CargoCapacity" value="<?php if(!empty($CargoCapacity)) echo $CargoCapacity;?>" required="" min="1" required="">
                                                <p class="creating" style="margin-top:-20px; color: red;"><?php if(in_array("Cargo Space Too Much<br>", $ValidateBooking)) echo "Your cargo space exceed. Please re-enter";?></p>
					</div>
                                </div>
			</div>
			<div class="btnn">
                            <p class="creating" style="color: red;"><?php if(in_array("The details have been added<br>", $ValidateBooking)) echo "You have already registered the customer and item for this vessel schedule";?></p>
				<input type="submit" value="Book" name="BookVessel">
			</div>
                    
		</form>
            <div class="sub_home_right">
                <p>Go Back to <a href="AgentDashboardUI.php">Home</a></p>
            </div>
	</div>
	<!-- js -->
        <script type='text/javascript' src='../js/BookVesseljs/jquery-2.2.3.min.js'></script>
	<!-- //js -->
	<!-- Calendar -->
        <script src="../js/BookVesseljs/jquery-ui.js"></script>
	<script>
		$(function () {
			$("#datepicker,#datepicker1,#datepicker2,#datepicker3").datepicker();
		});
	</script>
	<!-- //Calendar -->
	<!-- Time -->
        <script type="text/javascript" src="../js/BookVesseljs/wickedpicker.js"></script>
	<script type="text/javascript">
		$('.timepicker,.timepicker1').wickedpicker({ twentyFour: false });
	</script>
	<!-- //Time -->

</body>

</html>
