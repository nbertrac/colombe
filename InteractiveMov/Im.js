let objImage= null;
function init(){
	objImage=document.getElementById("img");				
	objImage.style.position='absolute';
	objImage.style.left='0px';
	objImage.style.top='0px';
}

function getKeyAndMove(e){				
	let key_code=e.which||e.keyCode;
	switch(key_code){
		case 37: //left arrow key
                        moveLeft();
			break;
		case 38: //Up arrow key
			moveUp();
			break;
		case 39: //right arrow key
			moveRight();
			break;
		case 40: //down arrow key
			moveDown();
			break;						
	}
}
function moveLeft(){
        if (img.style.left == '-65px') img.style.left='2310px';
	img.style.left=parseInt(img.style.left)-5 +'px';
}
function moveUp(){
        if (img.style.top == '-55px') img.style.top='1130px';
	img.style.top=parseInt(img.style.top)-5 +'px';
}
function moveRight(){
        if (img.style.left == '2310px') img.style.left='-65px';
	img.style.left=parseInt(img.style.left)+5 +'px';
}
function moveDown(){
        if (img.style.top == '1130px') img.style.top='-55px';
	img.style.top=parseInt(img.style.top)+5 +'px';
}
window.onload=init;