import '../css/app.css';

function hideComments(postID) {
    document.getElementById('comments-'+postID).style.display = "none";
}

async function loadComments(postID) {
    let elem = document.getElementById('comments-' + postID);
    if (elem.innerHTML === "") {
        await fetch('https://jsonplaceholder.typicode.com/comments?postId=' + postID)
            .then(response => response.json())
            .then(comments => {
                console.log(comments);
                if (comments.length) {

                    comments.forEach(comment => {
                        console.log(comment);
                        let currComment = `<div class="comment"><div>Post ID: ${comment.id}</div><div>Name: ${comment.name}</div><div>Email: ${comment.email}</div><div>Body: ${comment.body}</div></div>`;
                        elem.innerHTML += currComment;
                    });

                    // Add new button
                    elem.innerHTML += `<a class="hide-comments-button" id="hide-${postID}" href="#"><button>Hide Comments</button></a>`;
                    // Add listener for button
                    document.getElementById('hide-'+postID).addEventListener("click", function () {
                        hideComments(postID);
                    });
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

document.body.onload = function() {
    let posts = document.getElementsByClassName('comments-button');

    for (let commentButton of posts) {

        commentButton.addEventListener("click", function () {
            loadComments(commentButton.id);
        });

    }
};