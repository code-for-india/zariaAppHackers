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
    if (($user_pushed == 1))
    {
        ?>

        
        <Gather>
        <?php
        echo '<Say>Ok, so the incident occurred nearby</Say>';
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