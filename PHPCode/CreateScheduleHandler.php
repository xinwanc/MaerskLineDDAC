<?php
$CheckSame = array();
//When create schedule button is clicked
if(isset($_POST['Create'])){
    //Get Chosen Vessel Name
    $VesselName= checkinput($_POST['VesselName']);
    //Get Chosen Harbor
    $Harbor = checkinput($_POST['Harbor']);
    //Get Chosen Terminal
    $Terminal = checkinput($_POST['Terminal']);
    //Get Chosen Estimated Date Departure
    $EstimatedDateDeparture = checkinput($_POST['EstimatedDateDeparture']);
    //Get Chosen Estimated Time Departure
    $EstimatedTimeDeparture = checkinput($_POST['EstimatedTimeDeparture']);
    //Get Chosen Estimated Date Arrival
     $EstimatedDateArrival = checkinput($_POST['EstimatedDateArrival']);
    //Get Chosen Estimated Time Arrival
    $EstimatedTimeArrival = checkinput($_POST['EstimatedTimeArrival']);
     //Get Chosen Space Available
     $GetChosenSpaceAvailable = checkinput($_POST['SpaceAvailable']);
     
    $NewDepartureDate= new DateTime($EstimatedDateDeparture);
    $FinalDepartureDate = mysqli_real_escape_string($loginconnect,$NewDepartureDate->format('Y-m-d'));
    $NewArrivalDate= new DateTime($EstimatedDateArrival); 
    $FinalArrivalDate = mysqli_real_escape_string($loginconnect,$NewArrivalDate->format('Y-m-d'));
    //Check the schedule exist already or not
    $CheckDetailsExist= mysqli_query($loginconnect, "Select* from vesselschedule where VesselName='$VesselName'and Harbor='$Harbor' and Terminal='$Terminal' and EstimatedDateDeparture='$FinalDepartureDate' and EstimatedTimeDeparture='$EstimatedTimeDeparture' and EstimatedDateArrival='$FinalArrivalDate'and EstimatedTimeArrival='$EstimatedTimeArrival' and SpaceAvailable='$GetChosenSpaceAvailable'");
    $CheckNumRows = mysqli_num_rows($CheckDetailsExist);
    if ($CheckNumRows==1){
        //vessel schedule are same and existed
        array_push($CheckSame, "The details have been added<br>");
    }
    else{
        //if vessel schedule not exist
        //Get the current date
        $CheckCurrentDate = mysqli_query($loginconnect, "SELECT CURDATE()");
        $DisplayCurrentDate = mysqli_fetch_array($CheckCurrentDate, MYSQLI_ASSOC);
        $CurrentDate = $DisplayCurrentDate['CURDATE()'];
        //if date of departure same or before current date
        if($FinalDepartureDate<=$CurrentDate){
            array_push($CheckSame, "Date Problem<br>");
        }
        else{
            //if arrival date same as departure date
            if($FinalArrivalDate<= $FinalDepartureDate){
                 array_push($CheckSame, "Final Arrival Date cannot same as or before departure date<br>");
            }
        }
    }
    
    if(empty($CheckSame)){
     //Store into database
     //Set Status of Schedule Active
     $SaveToDatabase = mysqli_query($loginconnect,"INSERT INTO vesselschedule(VesselName,Harbor,Terminal,EstimatedDateDeparture,EstimatedTimeDeparture,EstimatedDateArrival,EstimatedTimeArrival,SpaceAvailable,Status,CreatedBy) VALUES ('$VesselName','$Harbor','$Terminal','$FinalDepartureDate','$EstimatedTimeDeparture','$FinalArrivalDate','$EstimatedTimeArrival','$GetChosenSpaceAvailable','A','$currentAdminID')");
     //CreateSuccess
     if($SaveToDatabase){
          echo'<script>
            alert("You have successfully created a vessel schedule");
            window.location.href=\'CreateSchedule.php\';
            </script>';
     }
     else{
         echo mysqli_errno($loginconnect);
     }
    }
}

function checkinput($input){
    $NewInput = trim(stripcslashes($input));
    return $NewInput;
}


