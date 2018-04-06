<?php
$ValidateBooking = array();
//Get Vessel ID
if(isset($_GET['bookid'])){
    //find the details of the vessel schedule
    $FindDetails = mysqli_escape_string($loginconnect, $_GET['bookid']);
    $FindLa = mysqli_query($loginconnect, "Select* from vesselschedule where ID='$FindDetails'");
    //check the date of departure is earlier or same as current date or not
    $DisplayRow = mysqli_fetch_array($FindLa,MYSQLI_ASSOC);
    //Get the current date
    $CheckCurrentDate = mysqli_query($loginconnect, "SELECT CURDATE()");
    $DisplayCurrentDate = mysqli_fetch_array($CheckCurrentDate, MYSQLI_ASSOC);
     $CurrentDate = $DisplayCurrentDate['CURDATE()'];
     //if the departure date of the vessel is same or before as the current date, agent is not allowed to book the schedule
     if($DisplayRow['EstimatedDateDeparture']<=$CurrentDate){
        echo '<script>
            alert("You are not allowed to book the vessel which the departure date is over or on today.");
            window.location.href=\'AgentViewVesselSchedule.php\';
        </script>';
    }
    else{
        //if departure date is later than current date
        //if the space available is 0
        if($DisplayRow['SpaceAvailable']==0){
             echo '<script>
            alert("Sorry, the vessel schedule is fully booked");
            window.location.href=\'AgentViewVesselSchedule.php\';
        </script>';
        }
        else{
            //if the date is after current date and there are space available    
            $ID = $DisplayRow['ID'];   
            $VesselName = $DisplayRow['VesselName'];  
            $Harbor = $DisplayRow['Harbor'];   
            $Terminal = $DisplayRow['Terminal'];   
            $EstimatedDateDeparture= $DisplayRow['EstimatedDateDeparture'];
            $EstimatedTimeDeparture = $DisplayRow['EstimatedTimeDeparture'];  
            $EstimatedDateArrival= $DisplayRow['EstimatedDateArrival'];
            $EstimatedTimeArrival= $DisplayRow['EstimatedTimeArrival'];
            $SpaceAvailable= $DisplayRow['SpaceAvailable'];
        }
    }
}

//When the Book button is clicked
if(isset($_POST['BookVessel'])){
    //Get Chosen Company Name
    $CompanyName= checkinput($_POST['CompanyName']);
    //Get Chosen Company Contact
    $CompanyContact = checkinput($_POST['CompanyContact']);
    //Get Chosen Company Email 
    $CompanyEmail = checkinput($_POST['CompanyEmail']);
    //Get Chosen Compan Address
    $CompanyAddress = checkinput($_POST['CompanyAddress']);
    //Get Chosen Item Name
    $ItemName = checkinput($_POST['ItemName']);
    //Get Chosen Item Weight
    $ItemWeight = checkinput($_POST['ItemWeight']);
    //Get Chosen Cargo Capacity
    $CargoCapacity = checkinput($_POST['CargoCapacity']);
    //Get Space Availability
    $SpaceAvailable = checkinput($_POST['SpaceAvailable']);
    //check the details has already added
     $CheckDetailsExist= mysqli_query($loginconnect, "Select* from booking where CompanyName='$CompanyName'and CompanyContactNumber='$CompanyContact' and CompanyEmail='$CompanyEmail' and CompanyAddress='$CompanyAddress'and ItemName='$ItemName'and ItemWeight='$ItemWeight' and NumberofCargoCapacity='$CargoCapacity' and VesselScheduleID='$ID'");
    $CheckNumRows = mysqli_num_rows($CheckDetailsExist);
     if($CheckNumRows==1){
        //The vessel schedule has been booked for the customer and item
        array_push($ValidateBooking, "The details have been added<br>");
    }
    else{
        //if the vessel schedule has not booked for the customer and item
        //Make sure company contact only have 10 numbers
        if(!preg_match('/^[0-9]{2}-[0-9]{8}$/i', $CompanyContact)){
                array_push($ValidateBooking, "Contact number format is invalid<br>");
            }
            else{
                //Check whether the contact number provided has existed in database or not
                $CheckExist = mysqli_query($loginconnect, "SELECT * FROM booking WHERE CompanyContactNumber='$CompanyContact'");
                $RowsResult = mysqli_num_rows($CheckExist);
                //if exist
                if ($RowsResult>=1){
                    //check if the company contact number belongs to the same company name that inputted
                    $loginrowmou =mysqli_fetch_array($CheckExist,MYSQLI_ASSOC);
                    $CompanyNameCheck = $loginrowmou['CompanyName'];
                    if($CompanyName!=$CompanyNameCheck){
                        //if the company name which input same contact number is not belong to the company name holds the contact number
                        array_push($ValidateBooking, "Contact Number Already Exist<br>");
                    }

                }
            }
         //Check if email exist for another company
         $CheckEmail = mysqli_query($loginconnect, "SELECT * FROM booking WHERE CompanyEmail='$CompanyEmail'");
         $RowsResult1 = mysqli_num_rows($CheckEmail);
         //if exist
                if ($RowsResult1>=1){
                    //check if the company same
                    $loginrowmou1 =mysqli_fetch_array($CheckEmail,MYSQLI_ASSOC);
                    $CompanyNameCheck1 = $loginrowmou1['CompanyName'];
                    if($CompanyName!=$CompanyNameCheck1){
                        //if the company name which input same email is not belong to the company name holds the contact number
                        array_push($ValidateBooking, "Email Already Exist<br>");
                    }

                }
         //Check if the cargo capacity got more than the maximum capacity allowed 
         //convert space available to int
        $FinalSpaceAvailability = (int)$SpaceAvailable;
        if($CargoCapacity>$FinalSpaceAvailability){
            //if cargo capacity inputted more than space availability
            array_push($ValidateBooking, "Cargo Space Too Much<br>");
        }
    }
    if(empty($ValidateBooking)){
        //Save into database
        $SaveToDatabase = mysqli_query($loginconnect,"INSERT INTO booking(CompanyName,CompanyContactNumber,CompanyEmail,CompanyAddress,ItemName,ItemWeight,NumberofCargoCapacity,VesselScheduleID,BookedBy) VALUES ('$CompanyName','$CompanyContact','$CompanyEmail','$CompanyAddress','$ItemName','$ItemWeight','$CargoCapacity','$ID','$CurrentAgentID')");
        //Update the space availability
        $ComputeAvailableSpace = $FinalSpaceAvailability - $CargoCapacity;
        //Store the space availability
        $UpdateSpaceAvailability = mysqli_query($loginconnect, "UPDATE vesselschedule SET SpaceAvailable='$ComputeAvailableSpace' WHERE ID='$ID'") ;
        
        if($SaveToDatabase&&$UpdateSpaceAvailability){
            echo'<script>
            alert("You have successfully booked the vessel");
            window.location.href=\'AgentViewConfirmedBooking.php\';
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

