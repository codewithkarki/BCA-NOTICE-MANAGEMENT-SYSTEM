  // Smooth scroll to top on footer logo click
document.querySelector('.footer-logo').addEventListener('click', () => {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
});