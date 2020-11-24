alert ("hello world");
let a = 0;
let b = 6;
let c = a;
a = b;
b = c;
const resultat = Math.round(Math.random()*10);
prompt("bienvenus dans mon monde"); 
number(prompt(Yo)); //change en number//
const test = Number(prompt("Devine mon nombre"));
if(guess>resultat) {
    alert("Trop grand");
                    } 
else if(guess<resultat) {
    alert("Trop petit");
                        } 
else if(guess===resultat){
    alert("Bravo!");
                        }
                        // BOUCLE!!//
const resultat = Math.round(Math.random()*10);
let guess = Number(prompt("Devine mon nombre"));
while(guess!==resultat) {
    guess = Number(prompt("Devine mon nombre"));
    if(guess>resultat) {
        alert("Trop grand");
                        } 
    else if(guess<resultat) {
        alert("Trop petit");
                            } 
                        }
alert("Bravo!");