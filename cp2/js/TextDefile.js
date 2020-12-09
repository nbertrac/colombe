
const myTitreHtml = document.querySelector('h1');
myTitreHtml.style.position = "absolute";

let myTopPosition = 0;
let myDirection = 1;

function myHorizontalSlide() {
    if(myTopPosition == 1500){
        myTopPosition = -800;
    }
    myTopPosition += 2*myDirection;
    myTitreHtml.style.left = myTopPosition + 'px';
    requestAnimationFrame(myHorizontalSlide);
}

requestAnimationFrame(myHorizontalSlide);