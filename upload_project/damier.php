<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
        function dessinerDamier ($nombredecase)
            {
                for ($i=0;$i<$nombredecase;$i++){
                    echo "<tr>";
                    for ($j=0;$j<$nombredecase;$j++){
                        if (($i+$j)%2==0)
                            echo "X";
                        else
                            echo "0";
                    }
                echo "<br />\n";

                }
            }

        dessinerDamier(1);
    ?>

<script>
// petit jeu JS

class Personnage {
  constructor(nom, sante, force) {
    this.nom = nom;
    this.sante = sante;
    this.force = force;
    this.xp = 0; // Toujours 0 au début
  }
  // Attaque une cible
  attaquer(cible) {
    if (this.sante > 0) {
      const degats = this.force;
      console.log(
        `${this.nom} attaque ${
          cible.nom
        } et lui inflige ${degats} points de dégâts`
      );
      cible.sante -= degats;
      if (cible.sante > 0) {
        console.log(`${cible.nom} a encore ${cible.sante} points de vie`);
      } else {
        cible.sante = 0;
        const bonusXP = 10;
        console.log(
          `${this.nom} a tué ${
            cible.nom
          } et gagne ${bonusXP} points d'expérience`
        );
        this.xp += bonusXP;
      }
    } else {
      console.log(
        `${this.nom} n'a plus de points de vie et ne pas pas attaquer`
      );
    }
  }
  // Renvoie la description du personnage
  decrire() {
    return `${this.nom} a ${this.sante} points de vie, ${
      this.force
    } en force et ${this.xp} points d'expérience`;
  }
}

const aurora = new Personnage("Aurora", 150, 25);
const glacius = new Personnage("Glacius", 130, 30);

console.log("Bienvenue dans ce jeu d'aventure ! Voici nos courageux héros :");
console.log(aurora.decrire());
console.log(glacius.decrire());

const monstre = new Personnage("ZogZog", 40, 20);
console.log(`Un affreux monstre arrive : il s'appelle ${monstre.nom}`);

monstre.attaquer(aurora);
monstre.attaquer(glacius);
aurora.attaquer(monstre);
glacius.attaquer(monstre);

console.log(aurora.decrire());
console.log(glacius.decrire());
</script>
</body>
</html>
