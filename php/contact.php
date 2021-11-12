<?php

if($_POST) {
    $visitor_name = "";
    $visitor_email = "";
    $visitor_company = "";

    if(isset($_POST['visitor_name'])) {
        $visitor_name = filter_var($_POST['visitor_name'], FILTER_SANITIZE_STRING);
    }

    if(isset($_POST['visitor_email'])) {
        $visitor_email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['visitor_email']);
        $visitor_email = filter_var($visitor_email, FILTER_VALIDATE_EMAIL) ;
    }

    else{
        $recipient = "contact@bob3rt.com";
    }

    $email_body .= "</div>";

    $headers = 'MIME-Version: 1.0' . "\r\n"
    .'Content-type: text/html; charset=utf-8' . "\r\n"
    .'From: ' . $visitor_email . "\r\n";

    if(mail($recipient, $visitor_name, $visitor_email)) {
        echo "<p>Thank you for contacting us, $visitor_name. You should receive a reply within the next 24-48 hours.</p>";
    } else {
        echo '<p>We are sorry but the email did not go through.</p>';
    }
} else {
    echo '<p>Something went wrong</p>';
}
?>