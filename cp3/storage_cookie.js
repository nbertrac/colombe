/**
 * Ecrit un cookie dans le domaine en cours
 * @param {string} name - nom du cookie
 * @param {string} value - valeur du cookie
 * @param {number} duration - durée de vie du cookie (en jours) 
 */
function writeCookie(name, value, duration){
    //Teste si duration est un nombre
    if (isNaN(duration)){
        throw 'La durée doit être un nombre de jours';
    }else{
        // Date du jour
        var dToday = new Date();
        // Ajoute la durée à aujourd'hui
        dToday.setTime(dToday.getTime() + duration*24*60*60*1000);
    }

    // Ecrit le cookie
    let sCookie = name+'='+value+';expires='+dToday.toLocaleString()+';path=' //;SameSite=None;Secure;
    if(navigator.userAgent.indexOf('Firefox')>0)sCookie = name+'='+value+';expires='+dToday.toLocaleString()+';path=;SameSite=None;Secure';
    document.cookie= sCookie;
}

/**
 * Lit un cookie dans le domaine en cours
 * @param {string} name -nom du cookie
 * @param {string} 
 */
function readCookie(name){
    let aCookies = document.cookie.split(';');
    for(let i=0;i<aCookies.length;i++){
        if(aCookies[i].trim().indexOf(name+'=')===0){
            let aCookie=aCookies[i].split('=');
            return aCookie[1];
        }
    }
}

/**
 * Supprime le cookie dans le domaine en cours
 * @param {string} name - nom du cookie
 */
function eraseCookie(name){
    writeCookie(name, '', -1);
}