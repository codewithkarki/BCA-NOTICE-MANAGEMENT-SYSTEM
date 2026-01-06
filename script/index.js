document.addEventListener("DOMContentLoaded", () => {
    const typingEl = document.querySelector(".typing");
    if (!typingEl) return;

    const text = typingEl.dataset.text;
    let index = 0;

    function typeEffect() {
        if (index <= text.length) {
            typingEl.textContent = text.substring(0, index);
            index++;
            setTimeout(typeEffect, 90);
        }
    }

    typeEffect();
});