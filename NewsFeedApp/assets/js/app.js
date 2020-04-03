//ma clé d'api : 09ca7ae5bff5485d907185f1f3997b98

// FORMULAIRE DE RECHERCHE
// BLOQUER LE FORMULAIRE CLASSIQUE
var baliseForm  = document.querySelector(".search");
var valeurEntree = document.querySelector("input[name=recherche]");

baliseForm.addEventListener("submit", function(event){
    // POUR BLOQUER L'ENVOI DU FORMULAIRE
    event.preventDefault();

    // ON DOIT RECUPERER LE TEXTE SAISI
    var texteSaisi = valeurEntree.value;
    // DEBUG
    //console.log(texteSaisi);

    // formData PERMET DE RAJOUTER DES INFORMATIONS SUPPLEMENTAIRES A ENVOYER VERS PHP
    //formData = new FormData();
    // ON VA AJOUTER LE TEXTE SAISI
    //formData.append("recherche", texteSaisi);
        
    fetch(
        "https://newsapi.org/v2/top-headlines?q=" + texteSaisi +"&apiKey=09ca7ae5bff5485d907185f1f3997b98"
      )
    .then(function(reponse) {
        return reponse.json();
    })
    .then(function(objetJSON) {
        // DEBUG
        //console.log(objetJSON);
        
        var listeJSON   = document.querySelector(".listeJSON");
        articleTrouve = objetJSON.articles;
        console.log(objetJSON);
        listeJSON.innerHTML = "";
        //console.log(articleTrouve);

        listeJSON.innerHTML = "";
        var nbrResultatTrouve = objetJSON.totalResults;

        if (nbrResultatTrouve === 0) 
            {
                console.log(nbrResultatTrouve);
                alert ("pas d'article trouvé");
            }
        else
            {
            for(var i=0; i < articleTrouve.length; i++)
                {
                    listeJSON.innerHTML +=       `
                        <article class="$categorie">
                            <h3>${articleTrouve[i].title}</h3>
                            <div class="apercu">
                                <img
                                    src="${articleTrouve[i].urlToImage}" 
                                    alt="photo de l'article indisponible"
                                    height="150px" 
                                    width="150px" 
                                />
                                <p>${articleTrouve[i].description}</p>
                            </div>
                            <a href="${articleTrouve[i].url}">Lire l'article complet</a>
                        </article>
                    `
                }
            }
    });

});
