setTimeout(() => {
    const menu = document.getElementById('menuToggle');

    menu.addEventListener('change', () => {
        const isChecked = menu.checked;
        if (isChecked) {
            document.querySelector('body').classList.add('fixed');
        } else {
            document.querySelector('body').classList.remove('fixed');
        }
    })
}, 1000);

function ScrollToNextSection(event) {
    let parent = event.target.closest('section');
    var element = parent.nextSibling.nextSibling;
// smooth scroll to element and align it at the bottom
    element.scrollIntoView({behavior: 'smooth', block: 'start'});
}
