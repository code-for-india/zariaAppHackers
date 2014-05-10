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

        
        <Gather>
        <?php
        echo '<Say>You in the 3rd file now dog.</Say>';
        echo '<Say>'.$testing.'</Say>';
        echo '<Say>If yes, press 1. </Say>';
        echo '<Say>If no, press 2. </Say>';
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