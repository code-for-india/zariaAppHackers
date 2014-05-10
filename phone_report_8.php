<?php
    header('Content-type: text/xml');
    echo '<?xml version="1.0" encoding="UTF-8"?>';
 
    echo '<Response>';
    session_start();
    # @start snippet
    $user_pushed = (int) $_REQUEST['Digits'];
   $_SESSION['day'] = $user_pushed;
    # @end snippet
   $_SESSION['dateString'] = '2014-'.$_SESSION['month'].'-'.$_SESSION['day'];
    //$testing = $_SESSION['test'];
   $dataArray = array('person'=>$_SESSION['whoIsReporting'], 'doYouKnow'=>$_SESSION['knowsAttacker'], 'firstTimeCrime'=>'X', 'incidentList'=>$_SESSION['incidentType'], 'otherIncidence'=>' ', 'location'=>$_SESSION['postalCode'], 'locationLat'=>$_SESSION['latitude'],'locationLng'=>$_SESSION['longitude'], 'incidentDate'=>$_SESSION['dateString'], 'incidentTime'=>$_SESSION['12:00'], 'firstName'=>'anonymous', 'lastName'=>'anonymous', 'email'=>'anonymous', 'number'=>'anonymous' );

   //echo '<Say>'.$dataArray.'</Say>';
    $jsonData =  json_encode($dataArray,true);

    if (($jsonData))
    {
       $response = http_post_fields('http://54.186.110.31/submitReport', $dataArray);
        ?>
        
        <Gather>
        <?php
        echo '<Say>Thank you for filing your report. Your data will remain anonymous. </Say>';
        //echo '<Say>'.$_SESSION['postalCode'].'</Say>';

        echo '</Gather>';
    }
    
    else {
        // We'll implement the rest of the functionality in the 
        // following sections.
        echo "<Say>Please enter the day of the month using two digits.</Say>";
        echo '<Redirect>phone_report_8.php</Redirect>'; 
    }
 
    echo '</Response>';
?>