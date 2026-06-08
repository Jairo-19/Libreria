export function initPasswordToggle() {
    document.querySelectorAll('[data-toggle-password]').forEach(btn => {
        btn.addEventListener('click', function () {
            const input = document.getElementById(this.dataset.target);
            if (!input) return;

            const isPassword = input.type === 'password';
            input.type = isPassword ? 'text' : 'password';

            this.classList.toggle('bi-eye');
            this.classList.toggle('bi-eye-slash');
        });
    });
}

document.addEventListener('DOMContentLoaded', initPasswordToggle);
