<?php
    //include 'credentials.php';
    //session_start();
    //$MessageSid = $_REQUEST['MessageSid'];
    //$sms_content = $_REQUEST['MessageStatus'];
    

    header("content-type: text/xml");
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n"
?>

<Response>
    <Message> Your message sid is
        <?php
            //echo "message sid = $MessageSid\n";
            //echo "sms content = $sms_content\n";
        ?>
        Called the redirect 0 file!
    </Message>
</Response>
    
