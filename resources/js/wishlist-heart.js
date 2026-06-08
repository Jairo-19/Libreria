export function initWishlistHearts() {
    document.querySelectorAll('[data-wishlist-btn]').forEach(btn => {
        btn.addEventListener('click', function () {
            const icon = this.querySelector('.bi');
            icon.classList.toggle('bi-heart');
            icon.classList.toggle('bi-heart-fill');
            this.classList.toggle('text-red-500');
        });
    });
}

document.addEventListener('DOMContentLoaded', initWishlistHearts);
