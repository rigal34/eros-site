<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

// Vérification de la méthode de requête pour s'assurer que le formulaire a été soumis en POST
if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] === "POST") {

    // Récupère les données du formulaire
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $message = htmlspecialchars($_POST['message']);

    if (!$email) {
        echo "Adresse e-mail invalide.";
        exit;
    }

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.hostinger.com'; // Serveur SMTP
        $mail->SMTPAuth = true;
        $mail->Username = 'contact@lesitedebruno.com'; // Ton adresse e-mail
        $mail->Password = '9326@Aa1'; // Ton mot de passe e-mail
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Configuration de l’e-mail
        $mail->setFrom('contact@lesitedebruno.com', 'Le Site de Bruno');
        $mail->addAddress('contact@lesitedebruno.com');
        $mail->addReplyTo($email, $prenom);

        $mail->isHTML(false);
        $mail->Subject = "Nouveau message de $prenom";
        $mail->Body = "Nom: $prenom\nEmail: $email\n\nMessage:\n$message";

        // Envoi de l’e-mail
        $mail->send();
        echo "Votre message a été envoyé avec succès.";
    } catch (Exception $e) {
        echo "Erreur lors de l'envoi du message : " . $mail->ErrorInfo;
    }
} else {
    echo "Aucune soumission de formulaire détectée.";
}
?>









