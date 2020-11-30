/*
Ecrire une fonction, qui lorsqu'on l'appelle on lui passant un tableau, nous renvoi un nouveau tableau, contenant les éléments du premier mais en oredre inverse.
*/

const RTab = (tab) => {
    const aRetourner = [];
    for(i = 0; i<tab.length; i++){
        aRetourner.push(tab[(tab.length-1)-i]);
    }
    return aRetourner;
}

//SOLUTION UNSHIFT

const RTab = (tab) => {
    const aRetourner = [];
    for(i = 0; i<tab.length; i++){
        aRetourner.unshift(tab[i]);
    }
    return aRetourner;
}

//fonction map prend en argument une fonction qui effectue un traitement pour un seul element et retourne un nouveau tableau ayant pour valeurs les résultats obtenus en passant chaque élément du tableau à gauche du "." à la fonction passée en argument à map.
const desNumber = [3,5,7,9];

const résultat = desNumver.map((x) => {return x*2});

const inverserSign = (x) => {
    return -x;
}

const desNumberInversés = desNumber.map(inverserSign);

//map est à utiliser avec des fonction sans effet de bord. Si on voulait, pour chaque élément, executer une fonction avec effet de bord comme console.log on aurrait à appeler forEach exemple:
desNumber.forEach(console.log);

//Si l'on veut filtrer les valeurs d'un tableau selon un certain critère:
//1 - on définit une fonction qui retourne true quand le critère est vérifié et false sinon
//2 - J'utilise la fonction filter en lui passant ma fonction de test/critere

const supA5 = (x) => x > 5;

desNumber.filter(supA5);

/*
Si j'ai deux tableau, et que je veux les concaténer par  exemple avec:
const desNumber = [3,5,7,9];
const desString = ["hello","salut","ola","halom","namaste"]*/
const lesDeuxTableauSoudés = desNumber.concat(desString);

/*
Si je veux avoir une tranche de tableau, la fonction "slice" est bien pratique, exemple d'usage:
nomTableau.slice(indiceDubutTrancheInclus, indiceFinTrancheExclu)
*/
const premiereMoitié = desNumber.slice(0, 2);
 //resultat [3, 5]

 //remarque, si on ne passe qu'un seul argument, alors le tableau ira de l'indice que constitue le premier argument jsqu'a la fin du tableau

 lesDeuxTableauSoudés.slice(5);

 //exemple d'usage

 const insererDansTab = (tab, elem, pos) => {
    return tab.slice(0,pos).concat([elem]).concat(tab.slice(pos, tab.length));
}

//les string on des points commun avec les arrays
const f = "hello";
const character = f[2];

//Exercice d'autonomie: trouver la fonction javascript qui retourne l'indice (index en anglais) d'un élément donnée, dans un tableau. Ensuite écrire la ligne de code qui me trouver l'indice de "hello" dans [3,5,7,9,"hello","salut","ola","hola","namaste"]

//.indexOf();

[3,5,7,9,"hello","salut","ola","hola","namaste"].indexOf("hello");

// Destructuration de tableau
//on dispose de desNumber, tableau avec 4 éléments
//au lieu d'écrire ceci:
const a1 = desNumber[0];
const b1 = desNumber[1];
const c1 = desNumber[2];
const d1 = desNumber[3];
//on écrit :
const [a1,b1,c1,d1] = desNumber;

//si je veux récupéré que les 2eme et 4eme éléments :

const [, b2, ,d2] = desNumber;

//Les objets
/*
-tableau
-fonctions
*/

//Syntaxe pour un litéral d'objet:

//vide:
const emptyObj = {};

//Exemple de litéral d'objet

const literalObj = {
    attribut1: 273273,
    attribut2: false,
    attribut3: desNumber,
    méthode1: insererDansTableau,
}
//Un objet est une collection de données, ou chaque donnée est nommé. Ici la 2eme donnée false est nommée attribut2 et a pour valeur false. Chaque "donnée" est appelée membre
// Si le membre est une fonction on parlera de méthode (ça veut dire fonction contenu dans un objet)
//Syntaxe d'accès aux membres:
literalObj.attribut1

//syntaxe moins commune, utilisé sourtout dans les cas ou le no de la propriété ne peux pas être un nom valide de variable.
literalObj["attribut2"]

//modifier la valeur d'un membre:
literalObj.attribut2 = true;

//créer un nouveau membre et lui donner une valeur à la volée:
literalObj.attribut4 = "merc";
literalObj.méthode2 = (x,y) => (x > y ? x : y);

//Syntaxe moins commune:
literalObj[3] = "troisieme choix";

//On fera attention à garder l'esprit "orienté objet" et à minima essayer de ne mettre dans un meme objet que des données et fonctions qui ont "quelque chose" le un avec les autre.

/*
Ecrire un fonction sans argument pour demander à l'utilisateur avec des prompt successifs son nom, prénom, age, code postal et qui retourn un objet contenant ces données.
Exemple d'objet retourné:
{
    nom : "Berbiche",
    prenom : "Kamel",
    age : 37;
    codePostale: 75019
}
*/
//Methode1
function pinfo() {
    const literalObj = {
        nom : prompt("Donnez votre nom"),
        prenom : prompt("Donnez votre prenom"),
        age : Number(prompt("Donnez votre age")),
        codePostale : Number(prompt("Donnez votre Code postale")),
    }
    return literalObj;
}

///Methode2
function pInfo() {
    return {
        nom : prompt("Donnez votre nom"),
        prenom : prompt("Donnez votre prenom"),
        age : Number(prompt("Donnez votre age")),
        codePostale : Number(prompt("Donnez votre Code postale")),
    }
}

//Methode3
function pinfo() {
    const aRetourner = {};
    aRetourner.nom = prompt("Donnez votre nom");
    aRetourner.prenom = prompt("Donnez votre prenom");
    aRetourner.age = Number(prompt("Donnez votre age"));
    aRetourner.codePostale = Number(prompt("Donnez votre Code postale"));
    return aRetourner;
}

//Methode4 (best)
function pinfo() {
    const aRetourner = {
        nom: "",
        prenom: "",
        age: 0,
        codePostale: 0,
    };
    aRetourner.nom = prompt("Donnez votre nom");
    aRetourner.prenom = prompt("Donnez votre prenom");
    aRetourner.age = Number(prompt("Donnez votre age"));
    aRetourner.codePostale = Number(prompt("Donnez votre Code postale"));
    return aRetourner;
}