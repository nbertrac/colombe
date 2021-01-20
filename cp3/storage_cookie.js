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

/**
 * Click on cookie save cookie as filled in the formulaire
 */
if (document.getElementById('saveCookie')){
 document.getElementById('saveCookie').addEventListener('click', fill, false);
/*VERSION PERSO
 function fill(){
    let c = document.querySelectorAll('input[type=text], select');
    let valu = '';
    let t = '';
    for(let i=0;i<c.length;i++){
        t= c[i].value;
        if(valu==='')valu = t;
        else valu = valu+','+t;
    }
    writeCookie(document.getElementById('fname').value, valu, 10);
 }
 */

 // Version Prof

 function fill(){
    let sName = document.getElementById('fname').value;
    if (sName !== ''){
    let aValues = [];
    let aElements = document.querySelectorAll('form [name]:not([name=fname])');
    for(let i=0;i<aElements.length; i++){
        aValues.push(aElements[i].value);
    }
    let sValues = aValues.join(',');
    writeCookie(document.getElementById('fname').value, sValues, 7);
    alert('Cookie sauvegardé avec succès.')
    }else alert('Prénom obligatoire !')

 }
}

 /**
  * Fill Storage_read.html
  */
if (document.getElementById('readCookie')){
    document.getElementById('readCookie').addEventListener('click', cookieT, false)

    function cookieT(){
        let aCookies = document.cookie.split(';');
        let oRow, oCell;
        document.getElementById('tblr').innerHTML='';
        for(let i=0;i<aCookies.length;i++){
            let aCookie=aCookies[i].split('=');
            oRow = document.createElement('tr');
            oCell=document.createElement('td');
            oCell.textContent = aCookie[0].trim();
            oRow.appendChild(oCell);
            oCell = document.createElement('td');
            oCell.textContent= aCookie[1];
            oRow.appendChild(oCell);
            document.getElementById('tblr').appendChild(oRow);
        }
    }
}