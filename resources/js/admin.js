document.addEventListener('DOMContentLoaded', function() {
    const navLinks = document.querySelectorAll('.nav-link');
    const contentSections = document.querySelectorAll('.content-section');
    const headerTitle = document.getElementById('header-title');
    const mainEl = document.querySelector('main');
    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            if (this.id === 'theme-toggle' || this.parentElement.id === 'theme-toggle') return;
            navLinks.forEach(navLink => {
                navLink.classList.remove('active');
            });
            this.classList.add('active');
            const sectionId = this.getAttribute('data-section');
            // Special handling for messages section to remove padding
            if(sectionId === 'messages') {
                mainEl.classList.remove('p-8');
            } else {
                mainEl.classList.add('p-8');
            }
            if (sectionId) {
                const title = this.querySelector('.nav-text').textContent.trim();
                headerTitle.textContent = title === 'Super Admin' ? 'Super Admin Dashboard' : title === 'Messages' ? 'Messages' : `${title} Management`;
                contentSections.forEach(section => {
                    if (section.id === `${sectionId}-section`) {
                        section.classList.add('active');
                    } else {
                        section.classList.remove('active');
                    }
                });
            }
        });
    });
    const themeToggle = document.getElementById('theme-toggle');
    const body = document.body;
    const themeIcon = themeToggle.querySelector('.theme-icon');
    themeToggle.addEventListener('click', () => {
        body.classList.toggle('dark');
        body.classList.toggle('light');
        if (body.classList.contains('dark')) {
            themeIcon.textContent = 'brightness_4'; // moon for dark mode
        } else {
            themeIcon.textContent = 'wb_sunny'; // sun for light mode
        }
    });
    const navToggleBtn = document.getElementById('nav-toggle-btn');
    const sidebar = document.getElementById('sidebar');
    const mainContent = document.getElementById('main-content');
    navToggleBtn.addEventListener('click', () => {
        sidebar.classList.toggle('sidebar-collapsed');
        mainContent.classList.toggle('main-content-expanded');
    });
});