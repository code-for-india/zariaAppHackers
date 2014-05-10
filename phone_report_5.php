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
        ?>

        
        <Gather>
        <?php
        echo '<Say>Where did the incident take place?</Say>';
        echo '<Say>If it was nearby, press 1.</Say>';
        echo '<Say>To manually enter your postal code, press 2.</Say>';
        echo '</Gather>';
    }
     if (($user_pushed == 2))
    {
        ?>

        
        <Gather>
        <?php
        echo '<Say>Please enter the postal code where the incident took place?</Say>';
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