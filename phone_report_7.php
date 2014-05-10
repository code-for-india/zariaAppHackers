<?php
    header('Content-type: text/xml');
    echo '<?xml version="1.0" encoding="UTF-8"?>';
 
    echo '<Response>';
    session_start();
    # @start snippet
    $user_pushed = (int) $_REQUEST['Digits'];
   $_SESSION['month'] = $user_pushed;
    # @end snippet
    $testing = $_SESSION['test'];
    if (($user_pushed))
    {
        ?>
        
        <Gather action="<?php echo 'http://' . dirname($_SERVER["SERVER_NAME"] .  $_SERVER['PHP_SELF']) . '/phone_report_8.php'; ?>" method='GET' numDigits="2">
        <?php
        echo '<Say>Please enter the day that the incident took place.</Say>';
        echo '</Gather>';
    }
    
    else {
        // We'll implement the rest of the functionality in the 
        // following sections.
        echo "<Say>Please enter the day of the month using two digits.</Say>";
        echo '<Redirect>phone_report_7.php</Redirect>';
    }
 
    echo '</Response>';
?>