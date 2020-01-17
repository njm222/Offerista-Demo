import '../css/app.css';

async function loadComments(postID) {
    let elem = document.getElementById('comments-' + postID);
    if (elem.innerHTML === "") {
        await fetch('https://jsonplaceholder.typicode.com/comments?postId=' + postID)
            .then(response => response.json())
            .then(comments => {
                if (comments.length) {
                    addComments(comments, elem);
                    addHideButton(postID, elem);
                } else {
                    alert("No comments available");
                }
            })
    } else if (document.getElementById('comments-' + postID).style.display === "none") {

        document.getElementById('comments-' + postID).style.display = "block";

    } else {

        alert("Comments already loaded");

    }
}

function hideComments(postID) {
    document.getElementById('comments-'+postID).style.display = "none";
}

function addComments(comments, elem) {
    comments.forEach(comment => {
        console.log(comment);
        let currComment = `<div class="comment"><div>Post ID: ${comment.id}</div><div>Name: ${comment.name}</div><div>Email: ${comment.email}</div><div>Body: ${comment.body}</div></div>`;
        elem.innerHTML += currComment;
    });
}

function addHideButton(postID, elem) {
    // Add new button
    elem.innerHTML += `<a class="hide-comments-button" id="hide-${postID}" href="#"><button>Hide Comments</button></a>`;
    // Add listener for button
    document.getElementById('hide-'+postID).addEventListener("click", function () {
        hideComments(postID);
    });
}

document.body.onload = function() {
    // get all comments buttons
    let posts = document.getElementsByClassName('comments-button');

    for (let commentButton of posts) {
        // add on click listener
        commentButton.addEventListener("click", function () {
            loadComments(commentButton.id);
        });

    }
};