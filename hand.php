<?php
$to = 'richardcomfort@gmail.com';
$subject = 'Email from your website.';
$name = $_POST['name'];
$headers = "MIME-Version: 1.0"."\r\n";
$headers .='Content-type: text/plain; charset: utf-8'."\r\n";
$headers .= "From: $name\r\n";
$message = "Name: $name\r\n\r\n";
$email=filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL);
if($email){
    $headers.="Reply_to: $email";
    $message.="Email: $email\r\n\r\n";
}
$message.= "Town: ".$_POST['town']."\r\n\r\n";
$message.= "Message: ".$_POST['msg'];
$sent = mail($to,$subject,$message,$headers,'-f'.$to);
?>
<html>
    <head>
        <title></title>
        <meta http-equiv="refresh" content="3; URL='contact.htm'"/>
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
