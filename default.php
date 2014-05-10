<?php
    include 'credentials.php';
    session_start();
    $MessageSid = $_REQUEST['MessageSid'];
    $sms_content = $_REQUEST['Body'];
    

    switch ($sms_content) {
        case('0'):
            $redirect_file = '/redirect_0.php';
            break;
        case('1'):
            $redirect_file = '/redirect_1.php';
            break;
        default:
            $redirect_file = '/';
    }

    //header("content-type: text/xml");
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n"
?>

<Response>
    <Redirect method="POST">
        ../redirect_0.php
    </Redirect>
</Response>
    
