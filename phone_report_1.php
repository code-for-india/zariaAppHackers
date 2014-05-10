<?php
    header('Content-type: text/xml');
    echo '<?xml version="1.0" encoding="UTF-8"?>';
 
    echo '<Response>';
    session_start();
    # @start snippet
    $user_pushed = (int) $_REQUEST['Digits'];
    # @end snippet
    $testing = $_SESSION['test'];
    if ($user_pushed == 1)
    {
        ?>

       
        <Gather action="<?php echo 'http://' . dirname($_SERVER["SERVER_NAME"] .  $_SERVER['PHP_SELF']) . '/phone_report_2.php'; ?>" method='GET' numDigits="1">
        <?php
        echo '<Say>Thank you. Please answer a few questions for us so we can file your report.</Say>';
     //   echo '<Say>'.$testing.'</Say>';
        echo '<Say>Who is reporting the incident?</Say>';
        echo '<Say>If you are a survivor, press 1. </Say>';
        echo '<Say>If you are a friend of a survivor, press 2. </Say>';
        echo '<Say>If you are a relative of a survivor, press 3. </Say>';
        echo '<Say>If you did not know the victim, press 4. </Say>';
        //$_SESSION['whoIsReporting'] = $_REQUEST['Digits'];
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