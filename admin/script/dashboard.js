// UI ONLY – Backend data will be connected later
document.addEventListener("DOMContentLoaded", () => {
    console.log("Admin Dashboard Loaded Successfully");
});
// Optional subtle fade-in (does NOT affect UI logic)
document.querySelectorAll('.info-card').forEach(card => {
    card.style.opacity = 0;
    card.style.transform = 'translateY(15px)';

    setTimeout(() => {
        card.style.transition = '0.6s ease';
        card.style.opacity = 1;
        card.style.transform = 'translateY(0)';
    }, 150);
});
