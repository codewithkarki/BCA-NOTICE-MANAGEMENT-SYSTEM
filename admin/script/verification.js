function openModal() {
    document.getElementById("viewModal").style.display = "flex";
}

function closeModal() {
    document.getElementById("viewModal").style.display = "none";
}

window.onclick = function(e) {
    const modal = document.getElementById("viewModal");
    if (e.target === modal) {
        closeModal();
    }
};
