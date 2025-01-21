function toggleTopNavbar() {
    const overlay = document.getElementById('overlay-navbar-items');

    if (overlay) {
        if (overlay.classList.contains('hidden')) {
            overlay.classList.remove('hidden', 'scale-0', 'opacity-0');
            overlay.classList.add('scale-100', 'opacity-100');
        } else {
            overlay.classList.remove('scale-100', 'opacity-100');
            overlay.classList.add('scale-0', 'opacity-0');

            setTimeout(() => {
                overlay.classList.add('hidden');
            }, 500);
        }
    }
}


document.addEventListener("DOMContentLoaded", () => {
    const movieCards = document.querySelectorAll(".movie-card");

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = "1";
                entry.target.style.transform = "translateY(0)";
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });

    movieCards.forEach((card) => observer.observe(card));
});
