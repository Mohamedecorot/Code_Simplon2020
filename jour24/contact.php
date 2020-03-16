<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>contact</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<section id="contact">
    <h2>Formulaire de contact</h2>
    <form id="create" action="#section-contact" method="POST">
        <input type="text" name="nom" required placeholder="entrez votre nom et prénom">
        <input type="email" name="email" required placeholder="entrez email">
        <textarea name="message" cols="60" rows="6" required placeholder="entrez votre message"></textarea>
        <button type="submit">envoyer votre message</button>
        <div class="confirmation">
            <?php 
$identifiantFormulaire = $_REQUEST["identifiantFormulaire"] ?? "";
if ($identifiantFormulaire == "create")
{
    require "filtreformulaire.php"; 
}        
            ?>
        </div>
    </form>
</section>
</body>
</html>