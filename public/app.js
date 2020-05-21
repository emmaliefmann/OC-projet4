const hamburger = document.querySelector('.hamburger');
const navLinks = document.querySelector('.nav-links');
const links = document.querySelectorAll('.nav-links li');
const commentFlag = document.querySelectorAll('.comment-flag');

// for comment form
const commentBtn = document.getElementById('submit-comment');
const commentForm = document.getElementById('comment-form');
const commentAuthor = document.getElementById('author');
const commentSubmission = document.getElementById('comment'); 

// for editing forms
//use query selector and class as only one per page? 
const editorForm = document.querySelector('.editor-form');
console.log(editorForm);
const editTitle = document.querySelector('#title');
const editPost = document.querySelector('#post');

hamburger.addEventListener('click', () => {
    navLinks.classList.toggle('nav-links.open');
    console.log('mobile');
});

    
window.addEventListener("load", () => {
    for (let i=0; i < commentFlag.length; i++) {
        commentFlag[i].addEventListener('click', () => {
        commentFlag[i].classList.add('comment-reported');
        alert('Ce commentaire a été signalé');
        });
    };     
});


/*commentForm.addEventListener('submit', (e) => {
    
    commentAuthor.classList.remove('alert');
    commentSubmission.classList.remove('alert');
    if (commentAuthor.value == '') {
        e.preventDefault();
        commentAuthor.classList.add('alert');
        console.log('author');
    } 
    if (commentSubmission.value == '') {
        e.preventDefault();
        commentSubmission.classList.add('alert');
        console.log('comment');
    }
    else {
        return;
    }
});*/

editorForm.addEventListener('submit', (e) => {
    editTitle.classList.remove('alert');
    editPost.classList.remove('alert');
    if (editTitle.value == '') {
        e.preventDefault();
        editTitle.classList.add('alert');
        // check number of characters? 
    }
    if (editPost.value == '') {
        e.preventDefault();
        alert('Veuillez ecrire un article');
    }
    else {
        return;
    }
})