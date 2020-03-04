
        <section>
            <h2>catalogue</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos cupiditate asperiores velit ipsa rerum iste explicabo sint amet vitae voluptatibus aperiam impedit placeat eveniet soluta libero, suscipit aspernatur expedita voluptate?</p>
            <img class = "imagePrincipale" src="assets/img/voiture.jpg" alt="image de voiture">
            <div class = "container">
<?php
$listeGalerie = glob("assets/img/galerie*.{jpg,jpeg,gif,png}", GLOB_BRACE);
foreach($listeGalerie as $image)
{
    echo 
<<<CODEHTML
    <img src="$image" alt="$image">
CODEHTML;
}
?>

            </div>
        </section>
    