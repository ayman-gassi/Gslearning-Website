let pictures = document.querySelectorAll('.all img');
let nbrpic = pictures.length;
let right = document.querySelector('.right');
let left = document.querySelector('.left');
let C =0;
function pictureR(){
    pictures[C].classList.remove('active');
    if(C < nbrpic-1){
        C++;
    }
    else{
        C=0
    }
    pictures[C].classList.add('active');
}
function pictureL(){
    pictures[C].classList.remove('active');
    if(C > 0){
        C--;
    }
    else{
        C= nbrpic-1;
    }
    pictures[C].classList.add('active');
}
right.addEventListener('click',pictureR);
left.addEventListener('click',pictureL);