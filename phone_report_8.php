<?php
    header('Content-type: text/xml');
    echo '<?xml version="1.0" encoding="UTF-8"?>';
 
    echo '<Response>';
    session_start();
    # @start snippet
    $user_pushed = (int) $_REQUEST['Digits'];
   $_SESSION['day'] = $user_pushed;
    # @end snippet
    $testing = $_SESSION['test'];
    if (($user_pushed))
    {
        ?>
        
        <Gather>
        <?php
        echo '<Say>All ur data comin up bro:</Say>';
        echo '<Say>'.$_SESSION['postalCode'].'</Say>';

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