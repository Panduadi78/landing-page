const burger = document.querySelector('.burger');
const navLinks = document.querySelector('.nav-links');
burger.addEventListener('click', () => {
    navLinks.classList.toggle('active');
});

const navItems = document.querySelectorAll('.nav-item');
navItems.forEach(item => {
    item.addEventListener('click', () => {
        navItems.forEach(link => link.classList.remove('active'));
        item.classList.add('active');
    });
});


document.querySelectorAll('.toggle-info').forEach(item => {
    item.addEventListener('click', () => {
        const extraInfo = item.parentElement.querySelector('.extra-info'); // Cari .extra-info di dalam parent
        const currentHeight = extraInfo.style.maxHeight;
        
        // Toggle konten
        if (currentHeight) {
            extraInfo.style.maxHeight = null; // Sembunyikan
        } else {
            extraInfo.style.maxHeight = extraInfo.scrollHeight + "px"; // Tampilkan
        }
    });
});
