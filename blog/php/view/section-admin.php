
<section id="section-articles">
    <h2>soumettre un nouvel article</h2>
    <form action="#section-articles" method="POST">
    <input type="text" name="titre" required placeholder="entrez le titre de l'article">
    <input type="text" name="datePublication" required placeholder="entrez la date de l'article">
    <input type="text" name="categorie" required placeholder="entrez la catégorie de l'article">
    <input type="text" name="image" required placeholder="choisir l'image de l'article">
    <textarea name="contenu" cols="60" rows="6" required placeholder="entrez l'article"></textarea>
    <button type="submit">envoyer votre message</button>
    <div class="confirmation">
        <?php require_once "php/controller/form-articles.php" ?>
    </div>
    </form>
</section>


<section id="section-articles">
    <h2>supprimer un article</h2>
    <form action="#section-articles" method="POST">
    <input type="text" name="titre" required placeholder="entrez le titre de l'article à supprimer">
    <button type="submit">envoyer votre message</button>
    <div class="confirmation">
        <?php require_once "php/controller/form-articles.php" ?>
    </div>
    </form>

    
</section>
