console.log("JS CHARGE");

var listeImg = document.querySelectorAll(".container img");
for (var i=0; i < listeImg.length; i++)
{
    var imageCourante = listeImg[i];
    imageCourante.addEventListener("click",function(event){
        console.log ("le visiteur à cliqué sur l'image");
        console.log (event.target);
        var baliseCliquee = event.target;
        var urlImageCliquee = baliseCliquee.getAttribute ("src");
        var balisePrincipale = document.querySelector(".imagePrincipale")
        balisePrincipale.setAttribute("src", urlImageCliquee);

    }
    );
}