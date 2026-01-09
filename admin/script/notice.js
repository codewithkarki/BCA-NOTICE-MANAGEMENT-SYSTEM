const noticeModal = document.getElementById("noticeModal");
const imageModal = document.getElementById("imageModal");
const previewImage = document.getElementById("previewImage");
const modalTitle = document.getElementById("modalTitle");

/* OPEN ADD / EDIT MODAL */
function openNoticeModal(isEdit = false) {
    noticeModal.style.display = "flex";
    modalTitle.textContent = isEdit ? "Edit Notice" : "Add Notice";

    if (!isEdit) {
        document.getElementById("noticeForm").reset();
        document.getElementById("noticeId").value = "";
    }
}

/* CLOSE MODALS */
function closeNoticeModal() {
    noticeModal.style.display = "none";
}

function closeImageModal() {
    imageModal.style.display = "none";
}

/* IMAGE VIEW FUNCTION (WORKING) */
function viewImage(imagePath) {
    previewImage.src = imagePath;
    imageModal.style.display = "flex";
}

/* DELETE NOTICE (UI ONLY) */
function deleteNotice() {
    if (confirm("Are you sure you want to delete this notice?")) {
        alert("Notice deleted (UI only)");
    }
}

/* FORM SUBMIT (UI ONLY) */
document.getElementById("noticeForm").addEventListener("submit", function (e) {
    e.preventDefault();
    alert("Notice saved successfully (Backend will be connected later)");
});

/* CLOSE MODAL ON OUTSIDE CLICK */
window.onclick = function (e) {
    if (e.target === noticeModal) closeNoticeModal();
    if (e.target === imageModal) closeImageModal();
};
