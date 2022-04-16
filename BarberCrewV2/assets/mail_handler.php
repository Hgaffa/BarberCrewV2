<?php



if($_POST) {

    $visitor_name = "";

    $visitor_email = "";

    $email_title = "";

    $visitor_message = "";

    $email_body = "<div>";



    if(isset($_POST['name'])) {

        $visitor_name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);

        $email_body .= "<div>

                           <label><b>Visitor Name:</b></label>&nbsp;<span>".$visitor_name."</span>

                        </div>";

    }



    if(isset($_POST['email'])) {

        $visitor_email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['email']);

        $visitor_email = filter_var($visitor_email, FILTER_VALIDATE_EMAIL);

        $email_body .= "<div>

                           <label><b>Visitor Email:</b></label>&nbsp;<span>".$visitor_email."</span>

                        </div>";

    }



    if(isset($_POST['subject'])) {

        $email_title = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);

        $email_body .= "<div>

                           <label><b>Reason For Contacting Us:</b></label>&nbsp;<span>".$email_title."</span>

                        </div>";

    }



    if(isset($_POST['phone'])) {

        $concerned_department = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);

        $email_body .= "<div>

                           <label><b>Phone Number:</b></label>&nbsp;<span>".$concerned_department."</span>

                        </div>";

    }



    if(isset($_POST['message'])) {

        $visitor_message = htmlspecialchars($_POST['message']);

        $email_body .= "<div>

                           <label><b>Visitor Message:</b></label>

                           <div>".$visitor_message."</div>

                        </div>";

    }



    $recipient = "info@barbercrew.co.uk";



    $email_body .= "</div>";

    $headers  = 'MIME-Version: 1.0' . "\r\n"

    .'Content-type: text/html; charset=iso-8859-1' . "\r\n"

    .'From: <contact@barbercrew.co.uk>' . "\r\n";



    if(mail($recipient, $email_title, $email_body, $headers)) {

      header("location:/../index.html"); // your current page

    } else {

      header("location:/../index.html"); // your current page

    }



} else {

    echo '<p>Something went wrong</p>';

}

?>

