// Smooth scrolling for navigation links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});

// Parallax effect for hero section
window.addEventListener('scroll', () => {
    const parallax = document.querySelector('.hero');
    let scrollPosition = window.pageYOffset;
    parallax.style.backgroundPositionY = scrollPosition * 0.7 + 'px';
});

// Animate elements on scroll
ScrollReveal().reveal('.feature', { 
    delay: 200,
    distance: '50px',
    easing: 'ease-in-out',
    origin: 'bottom',
    interval: 200
});