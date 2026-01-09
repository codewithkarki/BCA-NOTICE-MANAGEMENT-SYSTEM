const complaintModal = document.getElementById("complaintModal");

function openComplaintModal(type, name, semester, anonymous, description, date) {
    document.getElementById("cType").textContent = type;
    document.getElementById("cName").textContent = name;
    document.getElementById("cSemester").textContent = semester;
    document.getElementById("cAnonymous").textContent = anonymous;
    document.getElementById("cDescription").textContent = description;
    document.getElementById("cDate").textContent = date;

    complaintModal.style.display = "flex";
}

function closeComplaintModal() {
    complaintModal.style.display = "none";
}

/* Close modal on outside click */
window.onclick = function (e) {
    if (e.target === complaintModal) closeComplaintModal();
};
