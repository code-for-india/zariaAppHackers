<?php
    include 'credentials.php';
    $MessageSid = $_REQUEST['MessageSid'];

    session_start();
/*
    1. User sends a message and gets options about incident list
    2. User sends the incident ids and is directed to date and time
    3. User sends date and time and is directed to Location
    4. User sends the Location info and is directed to person details page
    5. User sends person details and is directed to additional info page
    6. The data is posted to the database and goodbye message is sent.
*/
    
    if(isset($_SESSION['views']))
        $_SESSION['views']=$_SESSION['views']+1;
    else {
        $_SESSION['views']=1;
        $_SESSION['post_string'] = array();
    }
    //$sms_content = $_REQUEST['Body'];

    switch($_SESSION['views']) {
        case(1):
            $redirect_file = "../incident_options.php";
            $_SESSION['post_string']['incidentList'] = $_REQUEST['Body'];
            break;
        case(2):
            $redirect_file = "../date_time_details.php";
            $_SESSION['post_string']['date'] = $_REQUEST['Body'];
            break;
        case(3):
            $redirect_file = "../location_data.php";
            $_SESSION['post_string']['location'] = $_REQUEST['Body'];
            break;
        case(4):
            $redirect_file = "../person_details.php";
            $_SESSION['post_string']['person'] = $_REQUEST['Body'];
            break;
        case(5):
            $redirect_file = "../additional_info.php";
            $_SESSION['post_string']['comments'] = $_REQUEST['Body'];
            break;
        default:
            if(isset($_SESSION['views']))
              unset($_SESSION['views']);
            $redirect_file = "default.php";
            echo "<Response>\n";
            echo "<Message statusCallback=\"helloworld.php\">\n";
            //echo "$redirect_file \n" ;
            echo "This is a THE END!!\n";
            var_dump($_SESSION['post_string']);
            echo "</Message>\n";
            echo "</Response>";
            exit;
            break;
    }


    header("content-type: text/xml");
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";

?>

<Response>
    <Redirect>
        <?php echo $redirect_file; ?>
    </Redirect>
</Response>
