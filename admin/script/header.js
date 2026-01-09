const menuIcon = document.getElementById('menuIcon');
const navLinks = document.getElementById('navLinks');

/* Mobile menu toggle */
menuIcon.addEventListener('click', () => {
    navLinks.classList.toggle('active');
});
