<?php
    include 'credentials.php';
    $MessageSid = $_REQUEST['MessageSid'];
    $sms_content = $_REQUEST['Body'];

    //creating a session key with phonenumber
    if($sms_content == "hello") {
        session_start();
        $redirect_file = "../incident_options.php";
        $_SESSION['phNumber'] = $_REQUEST['From'];
        $_SESSION['stage'] = 'initial';
    } 
    else {
        if(isset($_SESSION['phNumber'])) {
            switch($_SESSION['stage']) {
                case('initial'):
                    if(!isset($_SESSION['incident_info'])) {
                        $_SESSION['incident_info'] = $sms_content;
                        $_SESSION['stage'] = 'location';
                        $redirect_file = "../location_data.php";
                    }
                    break;

                case('location'):
                    if(!isset($_SESSION['location_info'])) {
                        $_SESSION['location_info'] = $sms_content;
                        $_SESSION['stage'] = 'person_details';
                        $redirect_file = "../person_details.php";
                    }
                    break;
                
                case('person_details'):
                    if(!isset($_SESSION['person_details_info'])) {
                        $_SESSION['person_details_info'] = $sms_content;
                        $_SESSION['stage'] = 'date_time';
                        $redirect_file = "../date_time_details.php";
                    }
                    break;

                case('date_time'):
                    if(!isset($_SESSION['date_time_info'])) {
                        $_SESSION['date_time_info'] = $sms_content;
                        $_SESSION['stage'] = 'additional_info';
                        $redirect_file = "additional_info.php";
                    }
                    break;

                case('additional_info'):
                    if(!isset($_SESSION['additional_info_details'])) {
                        $_SESSION['additional_info_details'] = $sms_content;
                        unset($_SESSION['phNumber']);
                        unset($_SESSION['stage']);
                    }
                    break;
            }
        }
    }


    if (isset($redirect_file)) {
    header("content-type: text/xml");
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
    echo "<Response>\n";
    echo "<Redirect method=\"POST\">\n";
    echo "$redirect_file \n" ;
    echo "</Redirect>\n";
    echo "</Response>";
    } else {
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
    echo "<Response>\n";
    echo "<Message>\n"
    echo "This is my response.\n"
    echo "</Message>\n"
    echo "</Response>";

    }

?>


