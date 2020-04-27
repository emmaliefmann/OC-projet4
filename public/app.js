const hamburger = document.querySelector('.hamburger');
const navLinks = document.querySelector('.nav-links');
const links = document.querySelectorAll('.nav-links li');
const commentFlag = document.querySelectorAll('.comment-flag');

hamburger.addEventListener('click', () => {
    navLinks.classList.toggle('nav-links.open');
    console.log('mobile');
});

    
window.addEventListener("load", () => {
    for (let i=0; i < commentFlag.length; i++) {
        commentFlag[i].addEventListener('click', () => {
        console.log("comment reported");
        commentFlag[i].classList.toggle('comment-reported');
        alert('Ce commentaire a été signalé');
        });
    }; 

    
});