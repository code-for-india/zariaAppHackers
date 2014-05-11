<<<<<<< HEAD
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
=======
<?php
 
    // start the session
    session_start();
 
    // get the session varible if it exists
    $counter = $_SESSION['counter'];
 	
 	$post_info = $_REQUEST['Body'];
 	$_SESSION['test'] = 'testing var';
    // output the counter response
    header("content-type: text/xml");
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
?>
<Response>
    <Message statusCallback="http://zariyahack1729.appspot.com/response_1.php"> neil is here <?php echo $post_info; ?> </Message>
>>>>>>> 244bd81c3f808360b304dc6fd00587aa9cfdcd2b
</Response>