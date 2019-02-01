<?php
if(isset($_POST['email'])) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "marcellavanduyn@gmail.com";
    $email_subject = "Your email subject line";
 
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
 
 
    // validation expected data exists
    if(!isset($_POST['naam']) ||
        !isset($_POST['bedrijfsnaam']) ||
        !isset($_POST['email']) ||
        !isset($_POST['telefoon']) ||
        !isset($_POST['bericht'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
 
     
 
    $naam = $_POST['naam']; // required
    $bedrijfsnaam = $_POST['bedrijfsnaam']; // required
    $email = $_POST['email']; // required
    $telefoon = $_POST['telefoon']; // not required
    $bericht = $_POST['bericht']; // required
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$naam)) {
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }
 
  if(!preg_match($string_exp,$bedrijfsnaam)) {
    $error_message .= 'Bedrijfsnaam bruh.<br />';
  }
 
  if(strlen($bericht) < 2) {
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $email_message = "Form details below.\n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
     
 
    $email_message .= "Naam: ".clean_string($naam)."\n";
    $email_message .= "Email: ".clean_string($email)."\n";
    $email_message .= "Telefoon: ".clean_string($telefoon)."\n";
    $email_message .= "Bedrijfsnaam: ".clean_string($bedrijfsnaam)."\n";
    $email_message .= "Bericht: ".clean_string($bericht)."\n";
 
// create email headers
$headers = 'van: '.$email."\r\n".
'Reply-To: '.$email."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>
 
<!-- include your own success html here -->
 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>CeeCee | Contact</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="css/style-contact.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/ceecee-icon.png" type="image/png" sizes="16x16">
</head>

<body>
    <header>
        <div class="wrapper">
            <nav>
                <h1 class="logo">CeeCee</h1>
                <div id="burger-nav"></div>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="ceecee.html">CeeCee</a></li>
                    <li><a href="company.html">Connect Company</a></li>
                    <li><a href="contact.html">Contact</a></li>
                    <li><a href="https://www.facebook.com/CeeCeeEnschede" target="_blank" class="fa fa-facebook"></a>
                    <li><a href="https://twitter.com/CeeCee_Enschede" target="_blank" class="fa fa-twitter"></a></li>
                    <li><a href="http://www.linkedin.com/groups/CeeCee-Creatieve-Campus-Enschede-1886481/about" target="_blank" class="fa fa-linkedin"></a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div id="main-header">
        <div class="text-box">
            <span class="border">Connect company</span><br>
            <span class="border">Connect people</span><br>
        </div>
    </div>
    <div class="wrapper">
        <div class="main-title">
            <h1>THANK YOU! <br>WE ARE CONNECTED NOW!</h1>
        </div>
        
    </div>
    <footer>Copyright &copy; 2018 Good_Fellas Inc. Alle rechten voorbehouden.</footer>
</body>

<script src="js/scripts.js"></script>
</html>
 
<?php
 
}
?>