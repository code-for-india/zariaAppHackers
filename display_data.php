<?php
    header("content-type: text/xml");
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
?>

<Response>
    <Message> 
        <?php 
            if(isset($_SESSION['post_string']))
                echo "post string is ". $_SESSION['post_string'];?>
    </Message>
</Response>
    

