<?php
require_once 'Paginator.php';

$limit = ( isset( $_GET['limit'] ) ) ? $_GET['limit'] : 5; 
$page = ( isset( $_GET['page'] ) ) ? $_GET['page'] : 1; //starting page
$links = ( isset( $_GET['page'] ) ) ? $_GET['page'] : 7; 
$query ="SELECT booking.BookingID,booking.CompanyName,booking.CompanyContactNumber,booking.CompanyEmail,booking.CompanyAddress,booking.ItemName,booking.ItemWeight,booking.NumberofCargoCapacity, vesselschedule.VesselName,vesselschedule.Harbor,vesselschedule.Terminal,vesselschedule.EstimatedDateDeparture,vesselschedule.EstimatedTimeDeparture,vesselschedule.EstimatedDateArrival,vesselschedule.EstimatedTimeArrival FROM booking INNER JOIN vesselschedule ON booking.VesselScheduleID = vesselschedule.ID WHERE booking.BookedBy ='$CurrentAgentID'";
$paginator = new Paginator($loginconnect, $query);
$results = $paginator->getData($limit, $page);

