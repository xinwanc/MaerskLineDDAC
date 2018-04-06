<?php
require_once 'Paginator.php';
if(isset($_GET['vesselid'])){
    $FindBookings = mysqli_escape_string($loginconnect, $_GET['vesselid']);
    $limit = ( isset( $_GET['limit'] ) ) ? $_GET['limit'] : 5; 
$page = ( isset( $_GET['page'] ) ) ? $_GET['page'] : 1; //starting page
$links = ( isset( $_GET['page'] ) ) ? $_GET['page'] : 7; 

$query = "Select* from booking where VesselScheduleID='$FindBookings' ORDER BY BookingID";
$paginator = new Paginator($loginconnect, $query);
$results = $paginator->getData($limit, $page);
}

