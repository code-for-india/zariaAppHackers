<?php
    header("content-type: text/xml");
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
    if (!$_SESSION['incident_info']) {
    }
?>

<Response>
    <Message> 
        WELCOME to Zaria Incident Report System
        Reply with the relevant option(s):
        1 - Eve Teasing
        2 - Voyerism
        3 - Acid-Violence
        4 - Stalking
        5 - Rape
        6 - Disrobing
        7 - Domestic Violence
        8 - Marital Rape
        9 - Other
    </Message>
</Response>
    
