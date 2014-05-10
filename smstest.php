<?php
 
    // start the session
    session_start();
 
    // get the session varible if it exists
    $counter = $_SESSION['counter'];
 	
 	$post_info = $_REQUEST['Body'];
 	
    // output the counter response
    header("content-type: text/xml");
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
?>
<Response>
    <Sms> neil is here <?php echo $post_info; ?> </Sms>
</Response>