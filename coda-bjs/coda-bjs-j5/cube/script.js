const box = document.getElementById('demo-box');
const cards = document.querySelectorAll('.card');

function changeColor(color) {
    box.classList.remove('red', 'green', 'blue');
    box.classList.add(color);
}

function changeSize(size) {
    box.classList.remove('small', 'medium', 'large');
    box.classList.add(size);
}

function toggleRounded() {
    box.classList.toggle('rounded');
}

function toggleShadow() {
    box.classList.toggle('shadow');
}

function toggleBorder() {
    box.classList.toggle('bordered');
}

function toggleGradient() {
    box.classList.toggle('gradient');
}

function toggleAnimation() {
    box.classList.toggle('animated');
}

function resetBox() {
    box.classList = 'demo-box';
}

function toggleTheme() {
    document.body.classList.toggle('dark-theme');
}

function highlightCards(status) {
    cards.forEach(card => card.classList.remove('highlight', 'success', 'danger', 'none'));
    cards.forEach(card => card.classList.toggle(status));
}