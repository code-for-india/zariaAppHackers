<?php
    require 'Services/Twilio.php';
    include 'credentials.php';
    $sms_text = $_POST['sms_text'];
    $client = new Services_Twilio($AccountSid, $AuthToken);
    $call = $client->account->sms_messages->create(
    $fromNumber, // From this number
    $toNumber, // Send to this number
    $sms_text);
?>

<html>
    <body>
        sent the sms text <?php echo $sms_text ?>
    </body>
</html>
