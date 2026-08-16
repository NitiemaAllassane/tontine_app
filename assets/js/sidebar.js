document.addEventListener('DOMContentLoaded', () => {
    const sidebar = document.getElementById('sidebar-mobile');
    const toggle = document.getElementById('sidebar-toggle');
    const overlay = document.getElementById('sidebar-overlay');

    if (!sidebar || !toggle) return;

    function openSidebar() {
        sidebar.classList.remove('-translate-x-full');
        overlay?.classList.remove('hidden');
        toggle.setAttribute('aria-expanded', 'true');
    }

    function closeSidebar() {
        sidebar.classList.add('-translate-x-full');
        overlay?.classList.add('hidden');
        toggle.setAttribute('aria-expanded', 'false');
    }

    function toggleSidebar() {
        const isOpen = !sidebar.classList.contains('-translate-x-full');
        isOpen ? closeSidebar() : openSidebar();
    }

    toggle.addEventListener('click', toggleSidebar);
    overlay?.addEventListener('click', closeSidebar);

    // Ferme le menu automatiquement quand on clique un lien
    sidebar.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', closeSidebar);
    });
});