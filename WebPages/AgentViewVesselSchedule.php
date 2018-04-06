<?php
include '../PHPCode/AgentLoginSession.php';
include'../PHPCode/AgentViewScheduleHandler.php';
?>
<html>
    <head>
<title>Book Vessel</title>
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
<!-- font-awesome icons -->
<link rel="stylesheet" href="../css/font-awesome.min.css" />
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
        <body class="sticky-header left-side-collapsed"  onload="initMap()">
    <section>
   <!-- left side start-->
		<div class="left-side sticky-left-side">

			<!--logo and iconic logo start-->
			<div class="logo">
                            <h1><a href="AgentDashboardUI.php">Agent <span>Dashboard</span></a></h1>
			</div>
			<div class="logo-icon text-center">
                            <a href="AgentDashboardUI.php"><i class="lnr lnr-home"></i> </a>
			</div>

			<!--logo and iconic logo end-->
			<div class="left-side-inner">

				<!--sidebar nav start-->
					<ul class="nav nav-pills nav-stacked custom-nav">
                                            <li><a href="AgentDashboardUI.php"><i class="lnr lnr-power-switch"></i><span>Dashboard</span></a></li>
						<li><a href="AgentViewConfirmedBooking.php"><i class="lnr lnr-checkmark-circle"></i> <span>View Confirmed Booking</span></a></li>
                                                <li><a href="AgentViewVesselSchedule.php"><i class="lnr lnr-list"></i> <span>Book Vessel</span></a></li>
					</ul>
				<!--sidebar nav end-->
			</div>
		</div>
    <!-- left side end-->
    
    <!-- main content start-->
		<div class="main-content main-content4">
			<!-- header-starts -->
			<div class="header-section">
			 
			<!--toggle button start-->
			<a class="toggle-btn  menu-collapsed"><i class="fa fa-bars"></i></a>
			<!--toggle button end-->

			<!--notification menu start -->
			<div class="menu-right">
				<div class="user-panel-top">  	
					<div class="profile_details">		
						<ul>
							<li class="dropdown profile_details_drop">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
									<div class="profile_img">	
										<span style="background:url(../web1/images/1.jpg) no-repeat center"> </span> 
										 <div class="user-name">
											<p><?php echo $CurrentAgent;?><span>Agent</span></p>
										 </div>
										 <i style="margin-top:-25px; margin-left:5px;" class="lnr lnr-chevron-down"></i>
										 <i style="margin-top:-25px; margin-left:5px;" class="lnr lnr-chevron-up"></i>
										<div class="clearfix"></div>	
									</div>	
								</a>
								<ul class="dropdown-menu drp-mnu">
                                                                    <li> <a href="../PHPCode/AgentLogout.php" onclick="return confirm('Do you want to logout from the system?')"><i class="fa fa-sign-out"></i> Logout</a> </li>
								</ul>
							</li>
							<div class="clearfix"> </div>
						</ul>
					</div>		
				</div>
			</div>
			<!--notification menu end -->
			</div>
	<!-- //header-ends -->
			<div id="page-wrapper">
				<div class="graphs">
					<h3 class="blank1">View Vessel Schedule</h3>
					 <div class="xs tabls">
					   <div class="panel-body1">
					   <table class="table">
						 <thead>
							<tr>
							  <th>Vessel Name</th>
							  <th>Harbor</th>
							  <th>Terminal</th>
                                                          <th>Estimated Date Departure</th>
                                                          <th>Estimated Time Departure</th>
                                                          <th>Estimated Date Arrival</th>
                                                           <th>Estimated Time Arrival</th>
                                                          <th>Space Available</th>
                                                          <th>Action</th>
							</tr>
						  </thead>
						  <tbody>
							<?php
                                                        if (count($results->data)>=1){
                                                            for ($i=0;$i<count($results->data);$i++){
                                                                echo '<tr>';                  
                                                                echo '<td>'.$results->data[$i]['VesselName']. '</td>';               
                                                                echo '<td>'.$results->data[$i]['Harbor']. '</td>';               
                                                                echo '<td>'.$results->data[$i]['Terminal']. '</td>';                 
                                                                echo '<td>'.$results->data[$i]['EstimatedDateDeparture']. '</td>';
                                                                echo '<td>'.$results->data[$i]['EstimatedTimeDeparture']. '</td>';
                                                                echo '<td>'.$results->data[$i]['EstimatedDateArrival']. '</td>';
                                                                echo '<td>'.$results->data[$i]['EstimatedTimeArrival']. '</td>';
                                                                echo '<td>'.$results->data[$i]['SpaceAvailable']. '</td>';
                                                                echo '<td>
                                                                <a onclick="return confirm(\'Do you want to book this vessel?\')" href=
                                                                "MultiBookVesselStepsUI.php?bookid='.$results->data[$i]['ID'].'" class = "btn btn-danger">Book</a>
                                                                </td>'; 
                                                                echo'</tr>';  
                                                        }
                                                        }
                                                        else{
                                                            for ($i=0; $i<10; $i++){
                                                                echo '<tr>';
                                                                echo '<td></td>';               
                                                                echo '<td></td>';                
                                                                echo '<td></td>';                 
                                                                echo '<td></td>'; 
                                                                echo '<td></td>'; 
                                                                echo '<td></td>'; 
                                                                echo '<td></td>'; 
                                                                echo '<td></td>';
                                                                echo '<td></td>';
                                                                echo '</tr>';
                                                                }
                                                        }
                                                        ?>
						  </tbody>
						</table>
						</div>
                                               <?php 
                                                       if (count($results->data)>=1){
                                                           echo $paginator->createLinks($links,'pagination pagination-lg justify-content-center');
                                                       }
                                               ?>
					
						
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

