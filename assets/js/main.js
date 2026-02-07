document.addEventListener('DOMContentLoaded', () => {
        const mobileMenu = document.getElementById('mobile-menu');
        const toggleButton = document.getElementById('mobile-menu-toggle');
        const closeButton = document.getElementById('mobile-menu-close');
        const overlay = document.getElementById('mobile-menu-overlay');
        const mobileDropdowns = document.querySelectorAll('.mobile-dropdown');

        // --- Mobile Menu Toggle Logic ---
        const openMobileMenu = () => {
            mobileMenu.classList.add('active');
            overlay.classList.add('opacity-50');
            overlay.classList.remove('pointer-events-none');
            document.body.style.overflow = 'hidden'; // Prevent scrolling background
        };

        const closeMobileMenu = () => {
            mobileMenu.classList.remove('active');
            overlay.classList.remove('opacity-50');
            overlay.classList.add('pointer-events-none');
            document.body.style.overflow = ''; // Restore scrolling
        };

        toggleButton.addEventListener('click', openMobileMenu);
        closeButton.addEventListener('click', closeMobileMenu);
        overlay.addEventListener('click', closeMobileMenu);

        // --- Mobile Menu Dropdown Logic ---
        mobileDropdowns.forEach(dropdown => {
            const button = dropdown.querySelector('button');
            const content = dropdown.querySelector('.mobile-dropdown-content');
            const chevron = button.querySelector('.fa-chevron-right');

            button.addEventListener('click', () => {
                // Toggle the content visibility
                content.classList.toggle('active');
                
                // Toggle the chevron rotation
                if (content.classList.contains('active')) {
                    chevron.style.transform = 'rotate(90deg)';
                } else {
                    chevron.style.transform = 'rotate(0deg)';
                }
            });
        });

      // --- Desktop Dropdown Logic (Optional: for JS fallback if pure CSS isn't enough) ---
      // The desktop dropdowns here primarily use pure Tailwind's 'group-hover' utilities 
      // for simplicity, so no extra JS is strictly needed for the basic hover behavior.
});