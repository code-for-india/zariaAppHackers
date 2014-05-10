<?php
    header('Content-type: text/xml');
    echo '<?xml version="1.0" encoding="UTF-8"?>';
 
    echo '<Response>';
    session_start();
    # @start snippet
    $user_pushed = (int) $_REQUEST['Digits'];
   $_SESSION['postalCode'] = $user_pushed;
    # @end snippet
    $testing = $_SESSION['test'];
    if (($user_pushed))
    {


        $geocode=file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address='.$user_pushed.'&sensor=false');
         
        $output= json_decode($geocode);
         
        (int) $lat = $output->results[0]->geometry->location->lat;
        (int) $long = $output->results[0]->geometry->location->lng;
         $_SESSION['latitude'] =  $lat;
         $_SESSION['longitude'] = $long;
        //echo '<Say>Latitude is: '.$lat.'and longitude is:'.$long.'</Say>';

        ?>
        
        <Gather action="<?php echo 'http://' . dirname($_SERVER["SERVER_NAME"] .  $_SERVER['PHP_SELF']) . '/phone_report_7.php'; ?>" method='GET' numDigits="2">
        <?php
        echo '<Say>Please enter the month that the incident took place.</Say>';
        echo '</Gather>';
    }
    
    else {
        // We'll implement the rest of the functionality in the 
        // following sections.
        echo "<Say>Please enter the month from 1 through 12 in 2 digit format.</Say>";
        echo '<Redirect>handle-incoming-call.php</Redirect>';
    }
 
    echo '</Response>';
?>