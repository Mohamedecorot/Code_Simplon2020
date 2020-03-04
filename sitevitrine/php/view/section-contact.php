
        <section id="section-contact">
            <h2>formulaire de contact</h2>
            <form action="#section-contact" method="POST">
                <input type="text" name="nom" required placeholder="entrez votre nom">
                <input type="email" name="email" required placeholder="entrez votre mail">
                <textarea name="message" cols="60" rows="6" required placeholder="entrez votre message"></textarea>
                <button type="submit">envoyez votre message</button>
                <div class="confirmation">
<?php
if (count($_REQUEST) > 0 )
{
    $nom = $_REQUEST ["nom"];
    $email = $_REQUEST ["email"];
    $message = $_REQUEST ["message"];
    $requeteSQL = 
<<<CODESQL

INSERT INTO contact 
(nom, email, message) 
VALUES 
('$nom', '$email', '$message');

CODESQL;

$pdo = new PDO("mysql:dbname=vitrine;host=localhost;charset=utf8;","root","");
echo "$requeteSQL";
$pdo->exec($requeteSQL);

}
?>
                </div>
            </form>
        </section>
    