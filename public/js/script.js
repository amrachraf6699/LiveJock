function toggleNavbar() {
    var navbarItems = document.getElementById("navbar-items");

    if (navbarItems.style.display === "none" || navbarItems.style.display === "") {
        navbarItems.style.display = "flex";
        setTimeout(function() {
            navbarItems.classList.remove('opacity-0', 'transform', 'translate-y-4');
        }, 100);
    } else {
        navbarItems.classList.add('opacity-0', 'transform', 'translate-y-4');
        setTimeout(function() {
            navbarItems.style.display = "none";
        }, 500);
    }
}

const dropdownToggle = document.getElementById('dropdownToggle');
const dropdownMenu = document.getElementById('dropdownMenu');

dropdownToggle.addEventListener('click', function (event) {
    event.preventDefault();
    if (dropdownMenu.classList.contains('hidden')) {
        dropdownMenu.classList.remove('hidden');
        setTimeout(() => {
            dropdownMenu.classList.add('opacity-100', 'scale-y-100');
            dropdownMenu.classList.remove('opacity-0', 'scale-y-75');
        }, 10);
    } else {
        dropdownMenu.classList.add('opacity-0', 'scale-y-75');
        dropdownMenu.classList.remove('opacity-100', 'scale-y-100');
        setTimeout(() => {
            dropdownMenu.classList.add('hidden');
        }, 300);
    }
});

document.addEventListener('click', function (event) {
    if (!dropdownToggle.contains(event.target) && !dropdownMenu.contains(event.target)) {
        dropdownMenu.classList.add('opacity-0', 'scale-y-75');
        dropdownMenu.classList.remove('opacity-100', 'scale-y-100');
        setTimeout(() => {
            dropdownMenu.classList.add('hidden');
        }, 300); 
    }
});


const mouseArea = document.getElementById('mouse-area');

document.addEventListener('mousemove', function(e) {
    const mouseX = e.clientX;
    const mouseY = e.clientY;

    mouseArea.style.background = `radial-gradient(circle at ${mouseX}px ${mouseY}px, transparent 30%, rgba(0,0,0,0.7) 31%)`;
});


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
