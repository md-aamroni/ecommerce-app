<?php

/**
 * Content  : SMTP Configurations
 * Date     : 
 * Feature  :
 */
date_default_timezone_set("Asia/Dhaka");

$GLOBALS['SMTPHOST'] = "mail.mediraj.com";
$GLOBALS['SMTPUSER'] = "admin@mediraj.com";
$GLOBALS['SMTPPORT'] = "465";
$GLOBALS['SMTPAUTH'] = "ssl";
$GLOBALS['SMTPPASS'] = "admin_mediraj_2021";



/**
 * Content  : Send Email Example
 * Date     : 
 * Feature  :
 */
// $to      = "aambusinessexecutive@gmail.com";
// $subject = "Database Backup";
// $message = "Please have a look of appliction database file up-to-date: " . date('D, j M Y, H:i a') . "\r\n\r\nThanks and Best Regards\r\nMediraj Admin";
// $from    = "admin@mediraj.com";
// $headers = "From:" . $from;

// mail($to, $subject, $message, $headers);