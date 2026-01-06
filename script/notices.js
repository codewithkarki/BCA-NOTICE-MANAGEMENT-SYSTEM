document.addEventListener("DOMContentLoaded", () => {
    const modal = document.getElementById("noticeModal");
    const modalImg = document.getElementById("modalImage");
    const closeBtn = document.querySelector(".close-modal");

    document.querySelectorAll(".notice-card").forEach(card => {
        const btn = card.querySelector(".view-btn");
        const image = card.dataset.image;

        if (!image) return;

        btn.addEventListener("click", () => {
            modalImg.src = image;
            modal.style.display = "flex";
        });
    });

    closeBtn.addEventListener("click", () => {
        modal.style.display = "none";
        modalImg.src = "";
    });

    modal.addEventListener("click", e => {
        if (e.target === modal) {
            modal.style.display = "none";
            modalImg.src = "";
        }
    });
});
