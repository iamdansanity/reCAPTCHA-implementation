<?php
require_once 'dbh.inc.php';
require_once 'contact_model.inc.php';

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $fullName = $_POST['fullname'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $recaptcha_secret = "6LcvqEwqAAAAAH8sDF1KJDGzZScSlZQpocnR_gxX"; // The same as other PHP this is the SECRET KEY to be used
    $recaptcha_response = $_POST['g-recaptcha-response']; // If checkbox is clicked this is your response or the input u sent to the html


    $verify_response = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response); // This response means the file content is verifying if the response matched with secret key
        $response_data = json_decode($verify_response); //JSON ENCODE in PHP means it use to format in JSON Format.

    if ($response_data->success) { // If RESPONSE IS TRUE or SUCCESS the Login will be executed from Query.
        //echo "\nreCAPTCHA verified successfully!";
        insert_contact($pdo, $fullName, $email, $subject, $message);
        echo "\nSuccessfully Submitted";
    } else {
            // reCAPTCHA validation failed
            echo "reCAPTCHA verification failed. Please try again.";
            header('location: ../contact.php');
            exit();
    }

} else {
     // If not a POST request, redirect to the form page
     header("Location: ../contact.php");
     exit();
}