<?php
    include 'credentials.php';
    $MessageSid = $_REQUEST['MessageSid'];
    $sms_content = $_REQUEST['Body'];

    session_start();
    /*
    //creating a session key with phonenumber
    if($sms_content == "hello") {
        session_start();
        $redirect_file = "../incident_options.php";
        $_SESSION['phNumber'] = $_REQUEST['From'];
        $_SESSION['stage'] = 'initial';
    } 
    */


    header("content-type: text/xml");
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
    echo "<Response>\n";
    echo "<Message statusCallback=\"person_details.php\">\n";
    //echo "$redirect_file \n" ;
    echo "This is a message2\n";
    echo "</Message>\n";
    echo "</Response>";

?>


