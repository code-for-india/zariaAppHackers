<?php
    $people = array(
        "+16028422598"=>"Curious George",
        );

        if (!$name = $people[$_REQUEST['From']]) {
            $name = "Monkey";
        }
        
        header("content-type: text/xml");
        echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n"
?>

<Response>
    <Message><?php echo $name ?>, thanks for the message! </Message>
</Response>
