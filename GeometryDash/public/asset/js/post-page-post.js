function showReplies(button) {
    var parentDiv = button.parentElement;
    var repliesDiv = parentDiv.querySelector(".replies");
    var showButton = parentDiv.querySelector(".show");
    var hideButton = parentDiv.querySelector(".hide");

    repliesDiv.style.display = "block";
    showButton.style.display = "none";
    hideButton.style.display = "block";
}

function hideReplies(button) {
    var parentDiv = button.parentElement;
    var repliesDiv = parentDiv.querySelector(".replies");
    var showButton = parentDiv.querySelector(".show");
    var hideButton = parentDiv.querySelector(".hide");

    repliesDiv.style.display = "none";
    showButton.style.display = "block";
    hideButton.style.display = "none";
}

