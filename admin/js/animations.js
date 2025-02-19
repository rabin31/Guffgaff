document.querySelectorAll('.hover:scale-105').forEach(element => {
    element.addEventListener('mouseover', () => {
        element.style.transform = 'scale(1.05)';
    });
    element.addEventListener('mouseout', () => {
        element.style.transform = 'scale(1)';
    });
});
