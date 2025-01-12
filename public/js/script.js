function toggleTopNavbar() {
    const overlay = document.getElementById('overlay');
    const isHidden = overlay.classList.contains('hidden');

    if (isHidden) {
        overlay.classList.remove('hidden', 'scale-0', 'opacity-0');
        overlay.classList.add('scale-100', 'opacity-100', 'translate-x-0'); 
    } else {
        overlay.classList.add('hidden', 'scale-0', 'opacity-0');
        overlay.classList.remove('scale-100', 'opacity-100', 'translate-x-0');
    }
}

document.addEventListener("DOMContentLoaded", function() {
    var navbarItems = document.getElementById("navbar-items");
    navbarItems.style.display = "flex";
    setTimeout(function() {
        navbarItems.classList.remove('opacity-0', 'transform', 'translate-y-4');
    }, 100);
});


const dropdownToggle1 = document.getElementById('dropdownToggle1');
const dropdownMenu1 = document.getElementById('dropdownMenu1');

dropdownToggle1.addEventListener('click', function (event) {
    event.preventDefault();
    if (dropdownMenu1.classList.contains('hidden')) {
        dropdownMenu1.classList.remove('hidden');
        setTimeout(() => {
            dropdownMenu1.classList.add('opacity-100', 'scale-y-100');
            dropdownMenu1.classList.remove('opacity-0', 'scale-y-75');
        }, 10);
    } else {
        dropdownMenu1.classList.add('opacity-0', 'scale-y-75');
        dropdownMenu1.classList.remove('opacity-100', 'scale-y-100');
        setTimeout(() => {
            dropdownMenu1.classList.add('hidden');
        }, 300);
    }
});

// نفس الكود للقائمة الثانية
const dropdownToggle2 = document.getElementById('dropdownToggle2');
const dropdownMenu2 = document.getElementById('dropdownMenu2');

dropdownToggle2.addEventListener('click', function (event) {
    event.preventDefault();
    if (dropdownMenu2.classList.contains('hidden')) {
        dropdownMenu2.classList.remove('hidden');
        setTimeout(() => {
            dropdownMenu2.classList.add('opacity-100', 'scale-y-100');
            dropdownMenu2.classList.remove('opacity-0', 'scale-y-75');
        }, 10);
    } else {
        dropdownMenu2.classList.add('opacity-0', 'scale-y-75');
        dropdownMenu2.classList.remove('opacity-100', 'scale-y-100');
        setTimeout(() => {
            dropdownMenu2.classList.add('hidden');
        }, 300);
    }
});

// إضافة حدث onclick لكل عنصر في القوائم المنسدلة
const dropdownItems1 = document.querySelectorAll('#dropdownMenu1 li');
dropdownItems1.forEach(item => {
    item.addEventListener('click', function() {
        const href = this.getAttribute('data-href');
        window.location.href = href;
    });
});

const dropdownItems2 = document.querySelectorAll('#dropdownMenu2 li');
dropdownItems2.forEach(item => {
    item.addEventListener('click', function() {
        const href = this.getAttribute('data-href');
        window.location.href = href;
    });
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
