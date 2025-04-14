<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $message = htmlspecialchars($_POST['message']);

    // Définir l'adresse e-mail de destination
    $to = "walid.hadak@ellabts.com"; 
    $subject = "Nouveau message de $name";

    // Préparer le corps du message
    $message_body = "
    Nom : $name\n
    E-mail : $email\n
    Téléphone : $phone\n
    Message :\n
    $message
    ";

    // En-têtes de l'email
    $headers = "From: $email" . "\r\n" .
               "Reply-To: $email" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    // Envoyer l'e-mail
    if (mail($to, $subject, $message_body, $headers)) {
        echo "Votre message a été envoyé avec succès!";
    } else {
        echo "Une erreur est survenue. Veuillez réessayer.";
    }
}
?>
