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
    document.querySelectorAll('.tab-section').forEach(function(tabSection) {
        tabSection.addEventListener('click', function(e) {
            if (e.target.getAttribute('role') === 'tab') {
                var tabIndex = e.target.getAttribute('data-tab');
                
                // Remove active state from all tabs and panels
                tabSection.querySelectorAll('[role="tab"]').forEach(function(tab) {
                    tab.setAttribute('aria-selected', 'false');
                    tab.classList.remove('border-blue-600', 'text-blue-600');
                    tab.classList.add('border-transparent', 'text-gray-600');
                });
                tabSection.querySelectorAll('[role="tabpanel"]').forEach(function(panel) {
                    panel.setAttribute('hidden', '');
                });
                
                // Add active state to clicked tab and corresponding panel
                e.target.setAttribute('aria-selected', 'true');
                e.target.classList.remove('border-transparent', 'text-gray-600');
                e.target.classList.add('border-blue-600', 'text-blue-600');
                tabSection.querySelector('[data-panel="' + tabIndex + '"]').removeAttribute('hidden');
            }
        });
    });
    
});

