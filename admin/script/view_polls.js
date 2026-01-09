const pollModal = document.getElementById("pollResultModal");

function openPollResult() {
    pollModal.style.display = "flex";
}

function closePollResult() {
    pollModal.style.display = "none";
}

window.onclick = function(e) {
    if (e.target === pollModal) closePollResult();
};
