<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    //recupere les donnees du formulaire
$prenom = htmlspecialchars($_POST['prenom']);
$mail = htmlspecialchars($_POST['email']);
$message = htmlspecialchars($_POST['message']);


$to = "rigalrigal2014@outlook.fr";
$subject = "Nouveau message de $prenom";
$body = "Nom: $prenom\nEmail: $email\n\nMessage:\n$message";

$headers = "From: no-reply@lesitedebruno.com\r\n";
$headers .= "Reply-To: $email\r\n";


if (mail($to, $subject, $body, $headers)) {
    echo "Votre message a été envoyé avec succés.";
    
}else{
    echo "Une erreur s'est produite. Veuillez réessayer plus tard.";
}

}

?>