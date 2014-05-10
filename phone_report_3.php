<?php
    header('Content-type: text/xml');
    echo '<?xml version="1.0" encoding="UTF-8"?>';
 
    echo '<Response>';
    session_start();
    # @start snippet
    $user_pushed = (int) $_REQUEST['Digits'];
    $_SESSION['knowsAttacker'] = $user_pushed;
    if($user_pushed ==1){
        $_SESSION['knowsAttacker'] = 'Y';
    }
    if($user_pushed ==2){
        $_SESSION['knowsAttacker']= 'N';
    }
    # @end snippet
    $testing = $_SESSION['test'];
    if (($user_pushed == 1) || ($user_pushed ==2))
    {
        ?>

        
        <Gather action="<?php echo 'http://' . dirname($_SERVER["SERVER_NAME"] .  $_SERVER['PHP_SELF']) . '/phone_report_4.php'; ?>" method='GET' numDigits="1">
        <?php
        echo '<Say>What type of incident are you reporting?</Say>';
        echo '<Say>For Eve Teasing, press 1. </Say>';
        echo '<Say>For voyeurism, press 2. </Say>';
        echo '<Say>For acid violence, press 3. </Say>';
        echo '<Say>For stalking, press 4. </Say>';
        echo '<Say>For rape, press 5. </Say>';
        echo '<Say>For disrobing, press 6. </Say>';
        echo '<Say>For domestic violence, press 7. </Say>';
        echo '<Say>For marital rape, press 8. </Say>';
        echo '<Say>For other, press 9. </Say>';

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