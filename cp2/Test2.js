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