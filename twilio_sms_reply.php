<? require 'Services/Twilio.php';
    include 'credentials.php';
    #$client = new Services_Twilio_Twiml();
    $client = new Services_Twilio($AccountSid, $AuthToken);
    $call = $client->account->sms_messages->create(
    $fromNumber, // From this number
    $toNumber, // Send to this number
    'i just changed the test message!!');
    print $call->length;
    print $call->sid;
    //print $response;
