alert("hello world");
let a = 0;
let b = 6;
let c = a;
a = b;
b = c;
const resultat = Math.round(Math.random() * 10);
prompt("bienvenus dans mon monde");
number(prompt(Yo)); //change en number//
const test = Number(prompt("Devine mon nombre"));
if (guess > resultat) {
    alert("Trop grand");
}
else if (guess < resultat) {
    alert("Trop petit");
}
else if (guess === resultat) {
    alert("Bravo!");
}
// BOUCLE!!//
const resultat = Math.round(Math.random() * 10);
let guess = Number(prompt("Devine mon nombre"));
while (guess !== resultat) {
    guess = Number(prompt("Devine mon nombre"));
    if (guess > resultat) {
        alert("Trop grand");
    }
    else if (guess < resultat) {
        alert("Trop petit");
    }
}
alert("Bravo!");
//Alternative//
const resultat = Math.round(Math.random() * 10);
let guess = Number(prompt("Devine mon nombre"));
while (guess !== resultat) {
    if (guess > resultat) {
        guess = Number(prompt("Trop grand, essaye encore"));
    }
    else if (guess < resultat) {
        guess = Number(prompt("Trop petit, essaye encore"));
    }
}
alert("Bravo!");
//Alternative bollean//
const resultat = Math.round(Math.random() * 10);
let guess = Number(prompt("Devine mon nombre"));
let gagné = false;
do {
    if (guess < resultat) {
        guess = Number(prompt("Trop petit, essaye encore"));
    }
    else if (guess > resultat) {
        guess = Number(prompt("Trop grand, essaye encore"));
    }
    else {
        gagné = true;
        alert("Bravo");
    }
} while (!gagné)

//continue//
let play = true
while (play) {
    let resultat = Math.round(Math.random() * 10);
    let guess = Number(prompt("Devine mon nombre entre 0 et 10"));
    while (guess !== resultat) {
        if (guess > resultat) {
            guess = Number(prompt("Trop grand, essaye encore"));
        }
        else if (guess < resultat) {
            guess = Number(prompt("Trop petit, essaye encore"));
        }
        else if (guess > 10) {
            guess = Number(prompt("Ce n'est pas un nombre entre 0 et 10"));
        }
    }
    alert("Bravo!");
    let test = true;
    do {
        play = prompt("Voulez vous rejoué? (y/n)")
        if (play === "y") {
            test = true;
            play = true;
        }
        else if (play === "n") {
            test = true;
            play = false;
        }
        else {
            test = false;
            alert("Répondez en y ou n.");
        }
    } while (!test);
}
alert("Goodbye!!");

//Alternate//

let play = true
do {
    let resultat = Math.round(Math.random() * 10);
    let guess = Number(prompt("Devine mon nombre"));
    while (guess !== resultat) {
        if (guess > resultat) {
            guess = Number(prompt("Trop grand, essaye encore"));
        }
        else if (guess < resultat) {
            guess = Number(prompt("Trop petit, essaye encore"));
        }
    }
    alert("Bravo!");
    play = confirm("Voulez vous rejouer?")
} while (play);
alert("Goodbye!");
//ALTERNATE//
let rejouer = true;
while (rejouer) {
    const résultat = Math.round(Math.random() * 10);
    let saisie = prompt("Devine mon nombre entre 0 et 10");
    while (résultat != saisie && saisie != null) {
        if (saisie > 10) {
            saisie = prompt("Ce n'est pas un nombre entre 0 et 10");
        }
        else if (isNaN(saisie)) {
            saisie = prompt("Ce n'est pas un nombre");
        }
        else if (saisie < résultat) {
            saisie = prompt("Ce nombre est trop petit");
        }
        else if (saisie > résultat) {
            saisie = prompt("Ce nombre est trop greand");
        }
    }
    if (saisie == null) {
        rejouer = false;
        alert("Vous avez quitté");
    }
    else if (!confirm("Bravo\nVoulez vous rejouer?")) {
        rejouer = false;
        alert("Au revoir");
    }
}

let choix = 3;
switch (choix) {
    case 0:
        console.log("case 0");
        break;
    case 1:
        console.log("case 1");
        break;
    case 3:
        console.log("case 3");
        break;
    case 7:
        console.log("case 7");
        break;
    default:
        console.log("default");
}
//fonction//
isNaN(valeur); //fonction pour voir si la valeur est un nombre//
switch (valeur) {
    case 1:

    case 2:                                                //Façon propre d'utilisé un switch est de mettre un break a chaque case. Selement la case séléctionné s'affichera.//

    default:

}

function multiplication(a, b) {
    return (a * b);
}

function puissance(a, b) {
    let c = a;
    for (let i = 1; i < b; i++) {
        c = multiplication(c, a);
    }
    return (c);
}

const creerUnMultiplieur = (facteur) => {
    const Retour = (x) => x * factor;
    return (Retour);
}

const mult2 = (x, y) => x * y;

const creerUnMultiplieur = (facteur) => { const aRetourner = (x) => x * facteur; return (aRetourner); }

const doubleur = creerUnMultiplieur(2);

console.log(doubleur(7));

const logPerso = (prefix) => { const Retour = (message) => console.log(prefix + message); return (Retour); }

const myApplog = logPerso("[myApp]");

myApplog("Hello!");



const t = ["Hello", "chacun", "chacune", "!"];

for (let i = 0; i < 4; i++) { console.log(t[i]); }
//NOMBRE AVANT TABLEAU//
const lectureT = (ncase) => (x) => { for (let i = 0; i < ncase; i++) { console.log(x[i]); } }
const showT = lectureT(ncase);
//TABLEAU AVANT NOMBRE//
const lireT = (x) => (ncase) => { for (let i = 0; i < ncase; i++) { console.log(x[i]); } }
const selectT = lireT(t);
selectT(4);
//SIMPLE MANIERRE//
function showT(name, number) {
    for (let i = 0; i < number; i++) { console.log(name[i]); }
}
//ULTIMATE//
function showT(name) {
    for (let i = 0; i < name.length; i++) { console.log(name[i]); }
}
//FONCTION QUI DOUBLE LES NOMBRE D'UN TABLEAU DANS UN AUTRE//
const d = [1, 2, 3, 4];
//const g = dv(name);//
function dv(name) {

    let doubleT = []
    for (let i = 0; i < name.length; i++) {

        doubleT[i] = name[i] * 2;
    }
    return (doubleT);
}
//après établissement d'un tableau//

function dv(name, double) {

    for (let i = 0; i < name.length; i++) {

        double.push(name[i]*2);
    }
    return double
}
//EN PUSH//
function dv(name) {

    let doubleT = []
    for (let i = 0; i < name.length; i++) {

        doubleT.push(name[i]*2);
    }
    return (doubleT);
}