window.addEventListener('load', start, false);

function start(){
    let aBtns = document.querySelectorAll('table a.war');
    for (let i=0; i<aBtns.length;i++){
        aBtns[i].addEventListener('click', check, false)
    }
}
/*OU
function check(evt){
    evt.preventDefault();
    let bChoice= confirm('Etes-vous sure?');
    if(bChoice) window.location=this.href;
}
*/

function check(evt){
    let bChoice= confirm('Etes-vous sure?');
    if(!bChoice) evt.preventDefault();;
}
