const feedbackModal = document.getElementById("feedbackModal");

function openFeedbackModal(subject, message, rating, date) {
    document.getElementById("fSubject").textContent = subject || "—";
    document.getElementById("fMessage").textContent = message;
    document.getElementById("fRating").textContent = "★".repeat(rating) + "☆".repeat(5 - rating);
    document.getElementById("fDate").textContent = date;

    feedbackModal.style.display = "flex";
}

function closeFeedbackModal() {
    feedbackModal.style.display = "none";
}

/* Close modal on outside click */
window.onclick = function (e) {
    if (e.target === feedbackModal) closeFeedbackModal();
};
