<?php
    header('Content-type: text/xml');
    echo '<?xml version="1.0" encoding="UTF-8"?>';
 
    echo '<Response>';
    session_start();
    # @start snippet
    $user_pushed = (int) $_REQUEST['Digits'];
    # @end snippet
    //$testing = $_SESSION['test'];
    
    
    
    if ($user_pushed == 1)
    {
        ?>

       
        <Gather action="<?php echo 'http://' . dirname($_SERVER["SERVER_NAME"] .  $_SERVER['PHP_SELF']) . '/phone_report_2.php'; ?>" method='GET' numDigits="1">
        <?php
        echo '<Say voice="alice" language ="en-IN">Thank you. Please answer a few questions for us so we can file your report.</Say>';
     //   echo '<Say>'.$testing.'</Say>';
        echo '<Say voice="alice" language ="en-IN">Who is reporting the incident?</Say>';
        echo '<Say voice="alice" language ="en-IN">If you are a survivor, press 1. </Say>';
        echo '<Say voice="alice" language ="en-IN">If you are a friend of a survivor, press 2. </Say>';
        echo '<Say voice="alice" language ="en-IN">If you are a relative of a survivor, press 3. </Say>';
        echo '<Say voice="alice" language ="en-IN">If you did not know the victim, press 4. </Say>';
        echo '</Gather>';
    }
    else {
        // We'll implement the rest of the functionality in the 
        // following sections.
        echo '<Say voice="alice" language ="en-IN">Sorry, please select one of the available options.</Say>';
        echo '<Redirect>phone_report_1.php</Redirect>';
    }
 
    echo '</Response>';
?>