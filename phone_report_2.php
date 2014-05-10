<?php
    header('Content-type: text/xml');
    echo '<?xml version="1.0" encoding="UTF-8"?>';
 
    echo '<Response>';
    session_start();
    # @start snippet
    $user_pushed = (int) $_REQUEST['Digits'];
    # @end snippet
   

   //Survivor, if pushed 1
    if (($user_pushed >= 1) && ($user_pushed <=4))
    {
            //if 1, whoIsReporting is victim, if 2: whoIsReporting is friend of survivor, etc
            $_SESSION['whoIsReporting'] = $user_pushed;
            $arr = array('SURVIVOR', 'FRIEND_OF_SURVIVOR', 'RELATIVE_OF_SURVIVOR', 'NOT_RELATED');
            $_SESSION['whoIsReporting'] = $arr[$user_pushed-1];
            
        ?>
        
        <Gather action="<?php echo 'http://' . dirname($_SERVER["SERVER_NAME"] .  $_SERVER['PHP_SELF']) . '/phone_report_3.php'; ?>" method='GET' numDigits="1">
        <?php
        echo '<Say> Do you know the attacker or assailant? </Say>';
        echo '<Say>'.$testing.'</Say>';
        echo '<Say>If yes, press 1. </Say>';
        echo '<Say>If no, press 2. </Say>';
        echo '</Gather>';
    }
    else {
        // We'll implement the rest of the functionality in the 
        // following sections.
        echo "<Say>Sorry, your selection was not between 1 and 4.</Say>";
        echo '<Redirect>handle-incoming-call.php</Redirect>';
    }
 
    echo '</Response>';
?>