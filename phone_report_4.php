<?php
    header('Content-type: text/xml');
    echo '<?xml version="1.0" encoding="UTF-8"?>';
 
    echo '<Response>';
    session_start();
    # @start snippet
    $incidentTypes = array('EVE_TEASING', 'VOYEURISM', 'ACID_VIOLENCE', 'STALKING', 'RAPE', 'DISROBING', 'DOMESTIC_VIOLENCE', 'MARITAL_RAPE', 'OTHER_INCIDENT');
    $user_pushed = (int) $_REQUEST['Digits'];
    $_SESSION['incidentType'] = $incidentTypes[$user_pushed-1];
    # @end snippet
    //$testing = $_SESSION['test'];
    if (($user_pushed >= 1) || ($user_pushed <=9))
    {
        ?>

        
        <Gather action="<?php echo 'http://' . dirname($_SERVER["SERVER_NAME"] .  $_SERVER['PHP_SELF']) . '/phone_report_5.php'; ?>" method='GET' numDigits="1">
        <?php
        echo '<Say>Where did the incident take place?</Say>';
        echo '<Say>If it was nearby, press 1.</Say>';
        echo '<Say>To manually enter your postal code, press 2.</Say>';
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