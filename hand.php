<?php
$to = 'richardcomfort@gmail.com';
$subject = 'Email from your website.';
$name = $_POST['name'];
$headers = "From: $name\r\n\r\n";
$headers.='Content-type: text/plain; charset: utf-8';
$message = "Name: $name\r\n\r\n";
$email=filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL);
if($email){
    $headers.="\r\n\r\nReply_to: $email";
}
$message = "Town: ".$_POST['town']."\r\n\r\n";
$message.= "Message: ".$_POST['msg'];
$sent = mail($to,$subject,$message,$headers,'-f'.$to);
?>
<html>
    <head>
        <title></title>
        <meta http-equiv="refresh" content="20; URL='contact.htm'"/>
    </head>
    <body>
        <?php if(isset($sent) && $sent){?>
            <h1>Thank you for contacting us!</h1>
            <?php }else{?>
                <h1>The message was not sent! Please retry to send.</h1>
            <?php }?>
            <a href="contact.htm">Rentrez sur le site</a>
    </body>
</html>