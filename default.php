<?php
    require('my_geo_code.php');
    session_start();
/*
    1. User sends a message and gets options about incident list
    2. User sends the incident ids and is directed to date and time
    3. User sends date and time and is directed to Location
    4. User sends the Location info and is directed to person details page
    5. User sends person details and is directed to additional info page
    6. The data is posted to the database and goodbye message is sent.
*/
     // start the session
    session_start();
    // get the session varible if it exists
    $counter = $_SESSION['counter'];
    // if it doesnt, set the default
    if(!strlen($counter)) {
    $counter = 0;
    }
    // increment it
    $counter++;
    // save it
    $_SESSION['counter'] = $counter;


    switch($_SESSION['counter']) {
        case(1):
    $redirect_file = "../incident_options.php";
            break;
        case(2):
            $_SESSION['post_string']['incidentList'] = $_REQUEST['Body'];
            $redirect_file = "../date_time_details.php";
            break;
        case(3):
            $_SESSION['post_string']['date'] = $_REQUEST['Body'];
            $redirect_file = "../location_data.php";
            break;
        case(4):
            $_SESSION['post_string']['location'] = $_REQUEST['Body'];
            $redirect_file = "../person_details.php";
            break;
        case(5):
            $_SESSION['post_string']['person'] = $_REQUEST['Body'];
            $redirect_file = "../additional_info.php";
            break;
        case(6):
            //$redirect_file = "default.php";
            $_SESSION['post_string']['comments'] = $_REQUEST['Body'];
            $loc_lat_long = get_geo_loc($_SESSION['post_string']['location']);
            if(isset($_SESSION['counter']))
              unset($_SESSION['counter']);
            echo "<Response>\n";
            echo "<Message statusCallback=\"helloworld.php\">\n";
            //echo "$redirect_file \n" ;
            $json_string = json_encode($_SESSION['post_string']);
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
