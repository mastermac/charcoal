<?php
if(isset($_POST['email'])) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "aneeban10@gmail.com";
    $email_subject = "Enquiry";
 
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
 
 
    // validation expected data exists
    if(!isset($_POST['name']) ||
        !isset($_POST['stadd']) ||
        !isset($_POST['zipcode']) ||
        !isset($_POST['city']) ||
        !isset($_POST['country']) ||
        !isset($_POST['email']) ||
        !isset($_POST['tel'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
    
    $name = $_POST['name']; // required
    $stadd = $_POST['stadd']; // required
    $zipcode = $_POST['zipcode']; // required
    $city = $_POST['city']; // not required
    $country = $_POST['country']; // required
    $email = $_POST['email']; // required
    $tel = $_POST['tel']; // required
    
    $email_message = "Form details below.\n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
    
    $email_message .= "Name: ".clean_string($name)."\n";
    $email_message .= "Street Address: ".clean_string($stadd)."\n";
    $email_message .= "Zipcode: ".clean_string($zipcode)."\n";
    $email_message .= "City: ".clean_string($city)."\n";
    $email_message .= "Country: ".clean_string($country)."\n";
    $email_message .= "Email: ".clean_string($email)."\n";
    $email_message .= "Telephone: ".clean_string($tel)."\n";
 
    // create email headers
    $headers = 'From: '.$email."\r\n".
            'Reply-To: '.$email."\r\n" .
            'X-Mailer: PHP/' . phpversion();
    @mail($email_to, $email_subject, $email_message, $headers);  
    ?>
 
    <!-- include your own success html here -->
 
    Thank you for contacting us. We will be in touch with you very soon.
 
<?php
}
?>