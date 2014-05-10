<?php
    header('Content-type: text/xml');
    echo '<?xml version="1.0" encoding="UTF-8"?>';
 
    echo '<Response>';
    session_start();
    # @start snippet
    $user_pushed = (int) $_REQUEST['Digits'];
   // $_SESSION['incidentLocation'] = $user_pushed;
    # @end snippet
    $testing = $_SESSION['test'];
    if (($user_pushed == 1))
    {
        //if user pushed 1, then incident occurred nearby. So use the postal code given by request header for location.

        ?>

        
        <Gather>
        <?php
        echo '<Say>Ok, so the incident occurred nearby</Say>';
        echo '</Gather>';
    }
     if (($user_pushed == 2))
    {

        
        ?>

        
        <Gather action="<?php echo 'http://' . dirname($_SERVER["SERVER_NAME"] .  $_SERVER['PHP_SELF']) . '/phone_report_6.php'; ?>" method='GET' numDigits="6">
        <?php

        echo '<Say>Please enter the 6 digit postal code where the incident took place?</Say>';
        echo '</Gather>';
    }
    else {
        // We'll implement the rest of the functionality in the 
        // following sections.
        echo "<Say>Sorry, I can't do that yet.</Say>";
        echo '<Redirect>handle-incoming-call.php</Redirect>';
    }
 
    echo '</Response>';
?>