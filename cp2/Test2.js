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

/*
Litéraux d'objet:
commence par une '{' et se termine par '}'
Pour différencier d'un bloc de code classique, se rappeler que
les litéraux d'objet se trouveront à des endroits du code
où l'on attend une valeur, typiquement:
const o = ICI
uneFonction(ICI)
Et à l'intérieur de ces accolades, on trouvera une succession
de paires clé/valeur sous cette forme:
cle: valeur
ces paires seront séparées par des virgules.
Ces paires sont aussi appelées membres ou dans certains cas entrées.
Un membre sera appelé méthode si sa valeur est une fonction et 
attribut sinon.
S'il n'y a rien entre les accolades, l'objet est vide.

Les valeurs associées à une clé peuvent être de n'importe quel
type: une valeur de type primitif (string, number etc) ou de
type fonction (litéral d'une fonction ou le nom d'une fonction
connue) et aussi array ou d'autres objets.
*/
// Exemple:

const clientObj = {
    name: "Michu",
    firstName: "Pierre",
    age: 27,
    phoneNumbers: [06666666, 09999999, 077877777],
    adresse: {
      streetNumber: "16 rue du Temple",
      postCode: 75003,
      city: "Paris",
    },
};
  
/*
 On remarque que même un objet vide dispose de membres par défaut
hérités de son prototype.
À chaque objet est associé un prototype, le prototype est l'objet
dans lequel l'interpréteur ira chercher un membre si il ne le trouve
pas directement dans l'objet.
Si rien n'est trouvé dans le prototype de clientObj, alors l'interpréteur
ira chercher dans le prototype du prototype.
Ce lien où l'on a un objet ayant un prototype p1 par exemple, p1 ayant lui même un prototype p2 ect, s'apelle la chaîne de prototypes.
*/

//Pour retrouver le prototype d'un objet :
Object.getPrototypeOf(clientObj);

  
// Au début de la chaîne de prototypes,
// on dira aussi à la racine, il y a
// l'ancêtre commun: Object.prototype

/*
Si à la création d'un objet on ne précise pas de prototype, ce sera
l'ancêtre commun qui sera mis comme prototype de l'objet créé. Ici par
exemple:
*/

console.log(Object.prototype === Object.getPrototypeOf(clientObj));
// s'évalue à true

/*
Object.prototype étant très générique et généraliste, le langage définit
des prototype mieux spécialisés pour certains types de valeurs, par exemple:
Function.protype est le prototype de toutes les fonctions.
Array.prototype qui est le prototype commun de tous les arrays.

*/

const clientPrototype = {
  name: "",
  firstName: "",
  age: 0,
  phoneNumbers: [],
  adresse: {
    streetNumber: "",
    postCode: 0,
    city: "",
  },
  creerMessageBienvenue: () => `Bonjour ${this.name}!`,
};

/*
Pour créer un objet, d'une manière qui me permet de choisir son prototype:
Object.create(ici on met le prototype voulu)
*/

const client2 = Object.create(clientPrototype);

/*
À propos du this:
- c'est nom, comme tout nom de variable, sa valeur est prédéfinie pour
nous par JavaScript.
- Intuitivement elle correspond à l'objet en cours.
- Dans les fonctions flêchées, le this contiendra une référence
à l'objet dans lequel la fonction est définie.

*/

const clientPrototypeAvecThis = {
  name: "",
  firstName: "",
  age: 0,
  phoneNumbers: [],
  adresse: {
    streetNumber: "",
    postCode: 0,
    city: "",
  },
  creerMessageBienvenue: function () {
    return `Hello ${this.name}!`;
  },
};

const cliente = Object.create(clientPrototypeAvecThis);
cliente.name = "Martine";
cliente.creerMessageBienvenue();

/*
Grosse partie sur le "this" et sa liaison.
(on pourra voir le terme anglais "bind" pour parler de liaison)
En javascript, il est possible d'associer une méthode à un objet de plusieurs
manières:
*/

const person = {
    account: 10000,
    work: function () {
      this.account += 1000;
    },
    printAccount() {
      console.log(this.account);
    },
  };
  // remarquer ici les deux manières de définir une méthode
  person.work();
  person.printAccount();
  // Le this, quand on est à l'intérieur d'un objet nous permet de faire référence
  // à l'objet dans lequel on est.
  
  const goWork = person.work;
  goWork();
  // Malheureusement l'attribut account n'aura pas changé
  // car en javascript, en faisant cette assignation le this perd son lien
  // avec l'objet person. Ce qui a fait perdre le lien c'est le fait que
  // la valeur de fonction a été assigné, c'est goWork qui a perdu le lien.
  // On pourra tout à fait continuer à faire person.work() sans problème.
  
  // Pour forcer le lien entre la fonction et l'objet, et ce sera à faire à chaque
  // fois qu'on veut passer une méthode qui n'a pas été définie comme fonction flêchée:
  const work2 = person.work.bind(person);
  
  /*
  Il nous sera aussi possible de déclarer d'abord une fonction puis de la lier explicitement
  à un objet, comme dans:
  */
  function afficherAge() {
    console.log(this.age);
  }
  
  const martin = {
    age: 18,
  };
  
  const afficherAgeMartin = afficherAge.bind(martin);
  afficherAge();
  afficherAgeMartin();
  
  /*
  Pour construire un objet avec des méthodes et afin qu'il soit réutilisable, il
  est possible d'utiliser Object.create() à laquelle on passe un prototype
  */
  const evennement = {
    getDate: function () {
      console.log(`${this.name} aura lieu en ${this.date}`);
    },
  };
  
  const coupeDuMonde = Object.create(evennement);
  coupeDuMonde.name = "Coupe du monde";
  coupeDuMonde.date = 2022;
  coupeDuMonde.getDate();
  // Le this aura accès aux champs de l'objet sur lequelle la méthode a été appelé.
  
  // this: celui présent dans le corps de définition de la méthode getDate dans le
  //  prototype nommé evennement
  // objet sur lequelle la méthode a été appelé: l'objet à gauche du "." dans
  //  la ligne de code précédente
  
  /*
  On disposera d'un point centralisé pour apporter des modification au comportement
  de getDate dans tous les objets ayant été définis avec evennement comme prototype.
  Le fait de modifier dans le prototype permettra d'avoir une modification qui se
  répercutera partout dans les objets créés avec le prototype!
  */
  // Exemple:
  evennement.getDate = function () {
    console.log(`The ${this.name} will happen in ${this.date}`);
  };
  
  
 /*
Usage du mot clé "new"

1- On va créer une fonction constructeur, ces fonction ont un nom
qui commence par une majuscule par convention.
*/
// Ceci est un premier exemple de constructeur
function Evenn(n, d) {
    this.name = n;
    this.date = d;
    this.getDate = () =>
      console.log(`Le ${this.name} se produira en ${this.date}`);
}
const deconfinement = new Evenn("Déconfinement total et définitif", 2023);
deconfinement.getDate();
  
/*
Ce que fait new dans le détail:
*/
//il crée un objet vide
const unEnevenement = {};
// il lui crée un prototype
const prototypeEvennement = {
    getDate() {console.log(`Le ${this.name} se produira en ${this.date}`);
    }    
}
// il associe le prototype à l'objet:
Object.setPrototypeOf(unEnevenement, prototypeEvennement);
  
// création des champs
unEnevenement.name = "Fête";
unEnevenement.date = 2021;
  
// Tous ça est fait par seulement
// const deconfinement = new Evenn("Fête", 2021);
  
/* Exercice:
Créer un objet qui fait sens pour vous dans un scénario imaginaire, avec Object.create()
Et un autre (autre structure) en créant d'abord un constructeur puis avec new
*/
  
const communication = {
    mail: "",
    tel: 0,
    fill() {
        this.mail = prompt("fill mail");
        this.tel = Number(prompt("fill telephone number"));
        console.log(`mail : ${this.mail},\n telephone number : ${this.tel}`);
    }
};
  
const info = Object.create(communication);
info.fill();

function Infoc(mail, tel) {
    this.adressem = mail;
    this.telephone = tel;
    this.show = () =>
      console.log(`Mail: ${this.adressem}, Tel n°: +${this.telephone}`);
}
const client6 = new Infoc("nbertrac@gmail.fr", 33635464306);
client6.show();

//VERSION 2
const basket = {
    getModel: function () {
        console.log(`Le modèle ${this.nom} de couleur ${this.couleur} en taille ${this.taille}`);
    },
}

const airForceOne = Object.create(basket);
airForceOne.nom = "Air Force One";
airForceOne.couleur = "Bleu";
airForceOne.taille = 43;
airForceOne.getModel();

basket.getModel = function () {
    console.log(`Le modèle ${this.nom} de couleur ${this.couleur} en taille ${this.taille}`);
};

function Basket(n, c, t) {
    this.nom = n;
    this.couleur = c;
    this.taille = t;
    this.getModel = () =>
        console.log(`Le modèle ${this.nom} de couleur ${this.couleur} en taille ${this.taille}`);
}

const airMax90 = new Basket("Air Max 90", "Rouge", 39);
airMax90.getModel();

const mesBaskets = {};

const prototypeBasket = {
    getModel() { console.log(`Le modèle ${this.nom} de couleur ${this.couleur} en taille ${this.taille}`); }
}
Object.setPrototypeOf(mesBasket, prototypeBasket);

/////////////////////////////////
const airMax90 = new Basket("Air Max 90", "Rouge", 39);
airMax90.getModel();

const armoireChaussures = {
  mesBaskets: [],
  ajouterBasket(basket) {
    if (this.pasDeBoue(basket)) {
      this.mesBaskets.push(basket);
    }
  },
  pasDeBoue = (basket) => true,
};

armoireChaussures.ajouterBasket(airMax90);

/*

Opérateur rest:
Ce sont les ... que l'on retrouve à l'intérieur des parenthèses
où on met les arguments à la définition de la fonction!!

Mettre les trois petits poins devant un nom d'argument fait en sorte que dans
le corps de la fonction, cet argument sera un array contenant tout le reste des paramètre
qui lui seront passés lors des appels de fonctions

*/

function sumAll(...lesNombres){
    let resultat = 0;
    for (let nombre of lesNombres){
        resultat += nombre;
    }
    return resultat;
}

const total = sumAll(82, 87 ,25 , 66, 888 , 8888);

/*
Si j'ai quand même besoin d'avoir des paramètres hors du tableau, mais de quand même
pouvoir récupérer tous les paramètres passés en plus, je devrai mettre
mon opérateur rest à la fin de la liste des arguments.
*/

const envoieLienClasseVirtuelle = (nomSession,
     heureDebut,
     prof,
     coordinateurPédagogique,
     ...invités) => {
    // constituer le message en incluant nomSession et heureDebut
    // créer lien mode modérateur et l'envoyer au prof et coordinateurPédagogique
    // créer lien invité et l'envoyer aux invités
}


/*
Exercice: Ecrire une fonction qui prend n paramètres, et vérifie si les n-1 derniers
paramètres son des multiples du premier. 
Elle renvoie trus si c'est le cas, et false sinon.
*/

function functionMultiple(...lesNombres){
    let resultat = true;
    for (let nombre of lesNombres){
        if(nombre%lesNombres[0] !== 0)
        {
            resultat = false;
        }
    }
    return resultat;
}
//REFINEMENT
function functionMultiple(...lesNombres){
    for (let n of lesNombres){
        if(n%lesNombres[0] !== 0)
        {
            return false;
        }
    }
    return true;
}

/*
Quelques fonctions utiles sur les strings
*/

// Petit rappel:
// Ayant une string comme celle ci
const message = "Bonjour les loulous!";

// On peut acéder à un caractère en particulier
// avec la même que pour les tableau

console.log(message[9]);

// Sur les tableaux on avait vu indexOf;
// cette méthode est disponible pour les string
// retourne l'indice de la première occurence de la chaîne
// passée en argument
message.indexOf("o");
// à la différence des array, sur les string on peut rechercher
// un motif avec indexOf
message.indexOf("loulous");

// trim permet de se débarasser des caractères blanc
// autours des caractères alphabétiques et symboles
const message2 = "   Bonjour les loulous!   ";
const message2SansEspacesAutours = message2.trim();

// une autre fonction commune avec les arrays: slice
const uneTranche = message.slice(2, 10);

// Si je veux éclater une string en plusieurs morceaux,
// en précisant un séparateur:
const messageEclaté = message.split(" ");
// donne: ["Bonjour", "les", "loulous!"]

/*
On a passé une chaine de caractères en argument, ici la chaîne est simple
c'est un espace " ", mais ça aurait pu être n'importe quelle chaîne
*/
message.split("ou");
// donne: ["Bonj", "r les l", "l", "s!"]
// la valeur retournée est un array.

/*
Inversement si je dispose d'un array contenant des strings, et que je veux
générer une "phrase" (une grosse string), en précisant mon séparateur, 
la méthode join sera utile. C'est une méthode disponible dans les arrays
*/
const lesMots = ["Bonjour", "chacun", "chacune", "ça", "va?"];

const laPhraseGénérée = lesMots.join(",");
// on obtient "Bonjour,chacun,chacune,ça,va?"

/*
Si je veux générer une string en répétant un certain nombre de fois une autre
string, je peux utiliser la méthode repeat
*/
"Hello toi ".repeat(5);

/*
En javascript, toutes les valeurs mis à part undefined et null, sont "équipées"
d'un prototype qui les enrichit avec des méthodes utiles.
Attention, pour certains types comme les number, on ne peux pas accéder à 
ses méthodes en partant d'une valeur litérale.
*/

/*
Exercice: 
Ecrire une fonction, qui prend une chaîne de caractère en argument, et qui va
créer et retourner un tableau où chaque élément correspond à une ligne de la chaîne.
*/
/*
Exercice (version) 2:
ecrire une fonction qui prend une chaîne de caractères en argument au format csv, et qui 
retourne un tableau de tableaux t, où pour accéder au troisième mot de la deuxième ligne
il suffirait de faire t[1][2].
*/
/*
Exercice 3:
Ecrire une fonction qui fait la même chose que slice, mais sans utiliser slice ou
les autres méthodes utilitaires des strings. On pourra accéder aux différents caractères
via la syntaxe message[i]
*/




const commaSeparatedValues = `dzdzd,dzdzdz,dzdzd,zddzdz\nvrvfrv,vzvrrz,vrzvr,vrvrv\nfddf,gdgf,ggger,gggjj`;


//EXV1
function septab(String) {
  return String.split("\n");
}
//EXV2


function csvtotab(string){
  function sp(x) {
    x.split(",");
  }  
  string  = string.split("\n").map(sp); 
  return(string);
}

//CORRECTION
function septab(String) {
  return String.split("\n").map();
}

const lineSplitter = (uneString) => uneString.split("\n").map((line) => line.split(","));

/*
------------------------------------------------------------
Nom       | Num Client | Somme dépensée | Date d'inscription
------------------------------------------------------------
Martin    | 295396792  | 254.22         | 22/02/2018
Martin    | 295396792  | 254.22         | 22/02/2018
Martin    | 295396792  | 254.22         | 22/02/2018
Martin    | 295396792  | 254.22         | 01/02/2020

const csv = "Martin,295396792,254.22,22/02/2018\nMartin,295396792,254.22,22/02/2018\nMartin,295396792,254.22,22/02/2018\nMartin,295396792,254.22,22/02/2018"
const csvSplitter = (uneString) =>
  uneString.split("\n").map((ligne) => ligne.split(","));
const r = csvSplitter(csv);

r[2][3] //-> 01/02/2020
Pour la petite histoire, ce type de tableau est un tableau multi-dimensionnel. 
Ici il est de dimension 2.


*/


//EXV4

function monSplit (unString, separateur) {
  for (x of unString){
    
  }
}


