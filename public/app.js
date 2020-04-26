const hamburger = document.querySelector('.hamburger');
const navLinks = document.querySelector('.nav-links');
const links = document.querySelectorAll('.nav-links li');
const commentFlag = document.querySelectorAll('.comment-flag');

hamburger.addEventListener('click', () => {
    navLinks.classList.toggle('open');

});

commentFlag[0].addEventListener('click', () => {
    console.log("comment reported");
    commentFlag[0].classList.toggle('comment-reported');
    alert('Ce commentaire vient d\'être signalé');
    });
    
/*window.addEventListener("load", () => {
    //this slows my page down so much it won't open??
    let i=0;
    while (i < commentFlag.length-1) {
        commentFlag[i].addEventListener('click', () => {
        console.log("comment reported");
        i++;
        });
    }; 
});*/