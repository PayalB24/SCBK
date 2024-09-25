function toggleNav() {
    const navLinks = document.getElementById('navLinks');
    navLinks.classList.toggle('active');
}

function toggleDropdown(event) {
    event.preventDefault();
    const dropdown = event.target.parentElement;
    dropdown.classList.toggle('active');
    
    document.addEventListener('click', function(e) {
        if (!dropdown.contains(e.target)) {
            dropdown.classList.remove('active');
        }
    });
}
function applyMargin() {
    if (window.innerWidth <= 768) {
        const studentSection = document.getElementById('std');
        if (studentSection) {
            studentSection.style.marginTop = '500px';
        }
    }
}

function resetMargin() {
    if (window.innerWidth <= 768) {
        const studentSection = document.getElementById('std');
        if (studentSection) {
            studentSection.style.marginTop = '17px';
        }
    }
}

document.addEventListener('click', function(event) {
    if (!event.target.closest('.dropbtn')) {
        resetMargin();
    }
});



window.onclick = function (event) {
    const navLinks = document.getElementById('navLinks');
    const custom = document.getElementById('custom');

    if (!navLinks.contains(event.target) && !custom.contains(event.target)) {
        navLinks.classList.remove('active');
    }
};