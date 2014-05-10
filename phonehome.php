<?php

// @start snippet
/* Define Menu */
session_start();
$_SESSION['test'] = 'hellofdsa';
$web = array();
$web['default'] = array('receptionist','filereport', 'about', 'duck');
//$web['location'] = array('receptionist','east-bay', 'san-jose', 'marin');

/* Get the menu node, index, and url */
$node = $_REQUEST['node'];
$index = (int) $_REQUEST['Digits'];
$url = 'http://'.dirname($_SERVER["SERVER_NAME"].$_SERVER['PHP_SELF']).'/phonehome.php';

/* Check to make sure index is valid */
if(isset($web[$node]) || count($web[$node]) >= $index && !is_null($_REQUEST['Digits']))
	$destination = $web[$node][$index];
else
	$destination = NULL;
// @end snippet

// @start snippet
/* Render TwiML */
header("content-type: text/xml");
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?><Response>\n";
switch($destination) {
	case 'filereport': ?>
		<Gather action="<?php echo 'http://' . dirname($_SERVER["SERVER_NAME"] .  $_SERVER['PHP_SELF']) . '/phone_report_1.php'; ?>" method='GET' numDigits="1">
			<Say voice="alice" language ="en-IN">Please enter 1 to file a report.</Say>
		</Gather>
		<?php break;
	case 'about': ?>
		<Gather action="<?php echo 'http://' . dirname($_SERVER["SERVER_NAME"] .  $_SERVER['PHP_SELF']) . '/processZipForClinic.php'; ?>" method='GET' numDigits="5">
			<Say>Wrong answer bro.</Say>
		</Gather>
		<?php 
	case 'receptionist'; ?>
		<Say>Please wait while we connect you</Say>
		<Dial>4252833462</Dial>
		<?php break;
	default: ?>
		<Gather action="<?php echo 'http://' . dirname($_SERVER["SERVER_NAME"] .  $_SERVER['PHP_SELF']) . '/phonehome.php?node=default'; ?>" numDigits="1">
			<Say voice="alice" language ="en-IN">Hello and welcome to the Zariya Help Line.</Say>
			<Say voice="alice" language ="en-IN">To file an anonymous report, press 1</Say>
			<Say voice="alice" language ="en-IN">To learn more about us, press 2</Say>
			<Say voice="alice" language ="en-IN">To speak to a receptionist, press 0</Say>
		</Gather>
		<?php
		break;
}
// @end snippet

// @start snippet
if($destination && $destination != 'receptionist') { ?>
	<Pause/>
	<Say>Main Menu</Say>
	<Redirect><?php echo 'http://' . dirname($_SERVER["SERVER_NAME"] .  $_SERVER['PHP_SELF']) . '/phonehome.php' ?></Redirect>
<?php }
// @end snippet

?>

</Response>
