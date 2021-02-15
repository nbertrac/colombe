//Branche l'événement SUBMIT au seul formulaire de la page index
document.getElementById('form').addEventListener('submit', check, false);

function check(evt){
    if(document.getElementById('pass').value!==document.getElementById('check').value){
        //Interrompt l'événement en cours
        evt.preventDefault();
        alert('password do not match');
    }
    else alert('OK');
}