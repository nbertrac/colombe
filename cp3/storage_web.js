/**
 * Stockage local avec l'interface localStorage
 */
document.getElementById('saveLocal').addEventListener('click', storageWeb, false);

function storageWeb(){
    //Purge toutes les données
    localStorage.clear();
    sessionStorage.clear();
    //Stock chaque donnée contenue dans input/select ayant un attribut name en local
    let aElements=document.querySelectorAll('form [name]');
    for(let i=0;i<aElements.length;i++){
        localStorage.setItem(aElements[i].name,aElements[i].value);
        sessionStorage.setItem(aElements[i].name,aElements[i].value);
    }
}