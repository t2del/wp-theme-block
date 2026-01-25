// Use classes (.) instead of IDs (#)
const menuButtons = document.querySelectorAll('.menu-btn');
const mobileMenus = document.querySelectorAll('.mobile-menu');

menuButtons.forEach((btn, index) => {
    btn.addEventListener('click', () => {
        // This ensures the button at index 0 opens the menu at index 0
        if (mobileMenus[index]) {
            mobileMenus[index].classList.toggle('hidden');
            console.log(`Menu ${index} toggled`);
        }
    });
});