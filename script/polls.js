document.addEventListener("DOMContentLoaded", () => {
    const modal = document.getElementById("pollModal");
    const questionEl = document.getElementById("pollQuestion");
    const optionsEl = document.getElementById("pollOptions");
    const submitBtn = document.querySelector(".submit-btn");
    const closeBtn = document.querySelector(".close-modal");

    document.querySelectorAll(".poll-card").forEach(card => {
        card.querySelector(".view-btn").addEventListener("click", () => {

            const question = card.dataset.question;
            const options = JSON.parse(card.dataset.options);

            questionEl.textContent = question;
            optionsEl.innerHTML = "";
            submitBtn.disabled = true;

            options.forEach((opt, index) => {
                const div = document.createElement("label");
                div.className = "poll-option";
                div.innerHTML = `
                    <input type="radio" name="pollOption" value="${opt}">
                    ${opt}
                `;
                optionsEl.appendChild(div);
            });

            modal.style.display = "flex";
        });
    });

    optionsEl.addEventListener("change", () => {
        submitBtn.disabled = false;
    });

    closeBtn.addEventListener("click", () => {
        modal.style.display = "none";
    });

    modal.addEventListener("click", e => {
        if (e.target === modal) modal.style.display = "none";
    });

    document.getElementById("pollForm").addEventListener("submit", e => {
        e.preventDefault();

        const selected = document.querySelector("input[name='pollOption']:checked");
        if (!selected) return;

        alert("Vote submitted for: " + selected.value);
        modal.style.display = "none";
    });
});
