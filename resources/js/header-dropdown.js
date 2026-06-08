export function initHeaderDropdown() {
    const btn = document.getElementById('userMenuBtn');
    const dropdown = document.getElementById('userDropdown');

    if (!btn || !dropdown) return;

    btn.addEventListener('click', function () {
        dropdown.classList.toggle('hidden');
    });

    document.addEventListener('click', function (e) {
        if (!btn.contains(e.target) && !dropdown.contains(e.target)) {
            dropdown.classList.add('hidden');
        }
    });
}

document.addEventListener('DOMContentLoaded', initHeaderDropdown);
