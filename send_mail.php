<?php





use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP; 


require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';

if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] === "POST") {
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    if (!$email) {
        echo "Adresse e-mail invalide.";
        exit;
    }


    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'rigalbruno30@gmail.com'; // Remplace par ton adresse Gmail
        $mail->Password = '9326yez1334'; // Remplace par le mot de passe d'application
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('rigalbruno30@gmail.com', 'EROS LE SITE');
        $mail->addAddress('rigalbruno30@gmail.com'); // L'adresse de réception (la tienne)
        $mail->addReplyTo($email, $prenom); // Adresse pour répondre à l'expéditeur

        $mail->isHTML(false); // Envoi en texte brut
        $mail->Subject = "Nouveau message de $prenom";
        $mail->Body = "Nom: $prenom\nEmail de l'expéditeur: $email\n\nMessage:\n$message";

        $mail->send();
        echo "Votre message a été envoyé avec succès.";
    } catch (Exception $e) {
        echo "Erreur lors de l'envoi du message : ", $mail->ErrorInfo;
    }
}
?>



