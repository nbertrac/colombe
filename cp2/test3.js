/*
Gestion des erreurs en JavaScrpt:
Trois grosses familles d'erreurs auxquelles on peut être confrontés:
1- Les erreurs de syntaxe: On en est assez protégés avec les éditeurs moderne.
2- Les erreurs compilation: surviennent lors de la traduction du code. (on les aime bien)
3- Les erreurs à l'exécution: les pires! difficile à prédire, difficile à deviner, peuvent
arriver alors qu'on pense que tout fonctionne bien depuis des mois!
Comment s'en protéger en les gérant?
*/

/*
Les objets Error
*/

// Créer lancer une Error:
throw Error("Quelque chose s'est mal passé!");

/*
Le mot clé throw permet de lever (ou lancer) une exception (exception = erreur),
Error() permet d'envoyer un message donnant des infos sur l'endroit où l'erreur s'est produite
Error() est une exception générique (générique = généraliste) mais il existe des Error plus
spécifique:
*/
/*
Quelques exemples d'Error plus spécifique
SyntaxeError();
TypeError();
ReferenceError();
RangeError();
*/

// Exemple, avec :
class Pokemon {
  constructor(name, type) {
    this.name = name;
    this.type = type;
  }
}

// je peux :
const pikachu = new Pokemon("Pikachu", "électrique");
// mais aussi:
const pikachuChelou = new Pokemon({ machin: false }, [1, 6, 1]);
// Sans qu'aucune erreur ne se produise!!!!

// Mais si je décide de tester le type des arguments passés au constructeur,
// et de lancer une exception:
class Pokemon2 {
  constructor(name, type) {
    if (typeof name != "string" || typeof type != "string") {
      throw TypeError("Les arguments passés doivent être du type 'string'");
    }
    this.name = name;
    this.type = type;
  }
}

// Alors on pourra:
const pikachu2 = new Pokemon2("Pikachu", "électrique");

// Mais pas faire ceci sans qu'une erreur se déclenche:
const pikachuChelou2 = new Pokemon2({machin:false}, [1,6,1]);
// Une exception est lancée et ma variable pikachuChelou2 n'est même pas créée!!!
// Le code s'arrête de s'exécuter! Aucune autre instruction suivante ne sera 
// exécutée si l'erreur n'a pas été gérée.
// Et il vaut mieux ça plutôt que (par exemple) se retrouver avec une base de donnée
// compromise!!!!

/*
Dans d'autres langages, si on appelle une fonction ou méthode qui peut déclencher des erreurs,
le langage nous oblige à gérer explicitement un éventuel cas d'erreur, mais pas en javascript!
On n'est pas oobligés!!! Cependant, on a tout intérêt à le faire systématiquement. 
*/

/*
TRY CATCH FINALLY
Nous permet d'exécuter le bloc suivant 'try', si jamais une exception est levée dans le bloc
'try', alors l'exécution de ce bloc s'arrête et le bloc 'catch' s'exécute.
Et peut importe si une erreur est survenue ou pas, le bloc 'finally' s'exécutera de toute façon!
Le bloc 'finally' est optionnel.

*/

try {
    // code pouvant potentiellement lancer une exception
    const pikachuChelou2 = new Pokemon2({machin:false}, [1,6,1]);
    console.log("Ce message ne s'affiche que si aucune exception levée plus haut.")
} catch (error) {
    // code sensé gérer le cas de survenue d'une erreur
    console.log(error)
} finally {
    // souvent code de nettoyage ou de libération de ressources
    // fermeture de connxion par exemple.
    console.log("La fermeture des connexion a bien été effectuée!")
}

/*
Quelque soit le type d'erreur déclenchée dans le bloc 'try', que ce soit une exception levée
par du code js avec 'throw' ou que ce soit un autre type d'exception (assignation à une const 
par exemple), l'exécution du bloc 'try' s'arrête, et le bloc 'catch' est exécuté.
*/

/*
Exercice: 
Implémenter une fonction qui additionne deux nombres. Cette fonction devra tester 
les valeurs reçues en paramètre et déclenchera une exception si un de ses paramètres
n'est pas un number.
À la suite de ça, faite à la fonction dans un try catch, en gérant la survenue d'erreur.
On fera un prmier try catch sans erreur (en passant des nombres), et un deuxième en passant
autre chose que des numbers à votre fonction.
*/



const addsafe = (number1,number2) =>{ 
    if(typeof number1 !== "number" || typeof number2 !== "number")
        throw TypeError("Les arguments passés doivent être du type number");
    return number1 + number2;
}

try {
    addsafe(1,2);
    console.log("Ce message ne s'affiche que si aucune exception levée plus haut.")
} catch (error) {
    console.log(error)
} finally {
    console.log("On est aller jusqu'au bout!")
}