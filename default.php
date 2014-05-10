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
    else
        $_SESSION['views']=1;

    switch($_SESSION['views']) {
        case(1):
            $redirect_file = "../incident_options.php";
            break;
        case(2):
            $redirect_file = "../date_time_details.php";
            break;
        case(3):
            $redirect_file = "../location_data.php";
            break;
        case(4):
            $redirect_file = "../person_details.php";
            break;
        case(5):
            $redirect_file = "../additional_info.php";
            break;
        default:
            $redirect_file = "";
            break;
    }


    header("content-type: text/xml");
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
    /*
    echo "<Response>\n";
    echo "<Message statusCallback=\"date_time_details.php\">\n";
    //echo "$redirect_file \n" ;
    echo "This is a message1\n";
    echo "</Message>\n";
    echo "</Response>";
    */

?>

<Response>
    <Redirect>
        <?php echo $redirect_file; ?>
    </Redirect>
</Response>
