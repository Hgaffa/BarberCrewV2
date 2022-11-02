<?php

/**
 * This example shows sending a message using PHP's mail() function.
 */

//Import the PHPMailer class into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';


$nameSanitized;
$emailSanitized;
$phoneNumberSanitized;
$cvSanitized;

$body = "<div>";
$subject;

$toEmail = "info@barbercrew.co.uk";
$fromEmail = "applications@barbercrew.co.uk";
$cv;

//Check for POST request
if($_SERVER['REQUEST_METHOD'] === 'POST') {

    //Sanitize Vacancy Name
    if(isset($_POST['vacancyName'])) {

        $vacancy_name = filter_var($_POST['vacancyName'], FILTER_SANITIZE_STRING);

        $body .= "<div><label><b>Vacancy:</b></label>&nbsp;<span>".$vacancy_name."</span></div>";
        $subject = "Application for ".$vacancy_name." vacancy!";

    }

    //Sanitize First and Last Name
    if(isset($_POST['firstName']) && isset($_POST['lastName'])) {

        $visitor_firstname = filter_var($_POST['firstName'], FILTER_SANITIZE_STRING);

        $visitor_lastname = filter_var($_POST['lastName'], FILTER_SANITIZE_STRING);

        $nameSanitized = $visitor_firstname." ".$visitor_lastname;

        $body .= "<div><label><b>Name:</b></label>&nbsp;<span>".$nameSanitized."</span></div>";

    }

    //Sanitize Email
    if(isset($_POST['email'])) {

        $visitor_email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);

        $body .= "<div><label><b>Email:</b></label>&nbsp;<span>".$visitor_email."</span></div>";

    }

    //Sanitize Phone Number
    if(isset($_POST['number'])) {

        $visitor_number = filter_var($_POST['number'], FILTER_SANITIZE_STRING);

        $body .= "<div><label><b>Phone Number:</b></label>&nbsp;<span>".$visitor_number."</span></div>";

    }

    //Sanitize CV
    if(isset($_FILES["cvUpload"])){

        $filepath = $_FILES['cvUpload']['tmp_name'];
        $fileSize = filesize($filepath);
        $fileinfo = finfo_open(FILEINFO_MIME_TYPE);
        $filetype = finfo_file($fileinfo, $filepath);

        if ($fileSize > 0 && $fileSize < 3145728) {
            $allowedTypes = [
                'application/pdf' => 'pdf',
                'application/msword' => 'doc',
                'application/vnd.openxmlformats-officedocument.wordprocessingml.document' => 'docx'
                ];
        
                if (in_array($filetype, array_keys($allowedTypes))) {
                    $filename = basename($filepath);
                    $extension = $allowedTypes[$filetype];
                    $targetDirectory = __DIR__ . "/cvUploads"; // __DIR__ is the directory of the current PHP file
            
                    //upload new file
                    $newFilepath = $targetDirectory . "/" . "cv." . $extension;
            
                    try{
                        copy($filepath, $newFilepath);
            
                        unlink($filepath); // Delete the temp file
                
                        $cv = $newFilepath;
                    } catch(Exception $e){
                        console.log("File Error: " . $mail->ErrorInfo);
                    }
        
                }
        }

    } 

    $body .= "</div>";

    //Create a new PHPMailer instance
    $mail = new PHPMailer();
    //Set who the message is to be sent from
    $mail->setFrom($fromEmail, $nameSanitized);

    //Set who the message is to be sent to
    $mail->addAddress('info@barbercrew.co.uk', 'Barber Crew');

    $mail->isHTML(true);

    //Set the subject line
    $mail->Subject = $subject;

    //Set mail content
    $mailContent = $body;
    $mail->Body = $mailContent;

    //Attach an image file
    $mail->addAttachment($cv);

    //send the message, check for errors
    try {
        $mail->send();
        header("location:./careers.html");
        console.log("Application has been successfully submitted");
    } catch (Exception $e) {
        header("location:./careers.html"); 
        console.log("Mailer Error: " . $mail->ErrorInfo);
    }
}