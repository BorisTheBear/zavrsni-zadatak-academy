function hideComments() {
    var commentsList = document.getElementsByName("comments");
    var hideCommentsButton = document.getElementsByName("hide-comments-button");

    if(commentsList[0].style.display === "none") {
        commentsList[0].style.display = "block";
        hideCommentsButton[0].innerText = "Hide Comments";
    } else {
        commentsList[0].style.display = "none";
        hideCommentsButton[0].innerText = "Show Comments";
    }
}