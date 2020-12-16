const img = document.querySelector('img');
img.style.position = "absolute";

let pos = img.style.position;

function dright(){
        pos = right + 50;
}

onKeyPress="if (event.keyCode == 39) dright()";