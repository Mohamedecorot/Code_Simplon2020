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
        <input type="text" name="nom" placeholder="entrez votre nom">
        <input type="email" name="email" placeholder="entrez email">
        <textarea name="message" cols="60" rows="6" placeholder="entrez votre message"></textarea>
        <!-- cette ligne permet de donner un identifiant invisible au formulaire -->
        <input type="hidden" name="identifiantFormulaire" value="create">
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