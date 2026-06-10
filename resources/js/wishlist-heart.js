export function initWishlistHearts() {
    document.querySelectorAll('[data-wishlist-btn]').forEach(btn => {
        btn.addEventListener('click', async function (e) {
            e.preventDefault();
            e.stopPropagation();
            
            const libroId = this.getAttribute('data-libro-id');
            const icon = this.querySelector('.bi');
            const isInWishlist = icon.classList.contains('bi-heart-fill');
            
            try {
                const route = isInWishlist 
                    ? `/lista-deseos/eliminar/${libroId}`
                    : `/lista-deseos/agregar/${libroId}`;
                
                const response = await fetch(route, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                });
                
                if (response.ok) {
                    icon.classList.toggle('bi-heart');
                    icon.classList.toggle('bi-heart-fill');
                    this.classList.toggle('text-red-500');
                }
            } catch (error) {
                console.error('Error al actualizar lista de deseos:', error);
            }
        });
    });
}

document.addEventListener('DOMContentLoaded', initWishlistHearts);
