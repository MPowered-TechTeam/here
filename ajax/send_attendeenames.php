<?php
$uniqname = $_COOKIE['uniqname'];
$eventname = $_REQUEST['event'];
$messagebody = $_REQUEST['message'];

// multiple recipients
$to  = $uniqname . '@umich.edu';

// subject
$subject = 'Attendee Names for' . $eventname;

// message
$message = $messagebody;

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Additional headers
$headers .= 'To:' . $to . "\r\n";
$headers .= 'From: MPowered Tech Team <mpowered-techteam@umich.edu>' . "\r\n";

// Mail it
mail($to, $subject, $message, $headers);

echo "success message";
?>