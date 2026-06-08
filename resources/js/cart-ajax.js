function mostrarError(msg) {
    const contenedor = document.querySelector('#resumen-cart')?.parentElement;
    if (!contenedor) return;
    const div = document.createElement('div');
    div.id = 'cart-error';
    div.className = 'bg-red-50 border border-red-300 text-red-700 px-4 py-3 rounded-lg text-sm mb-4';
    div.textContent = msg;
    contenedor.insertBefore(div, contenedor.firstChild);
    setTimeout(() => div.remove(), 3000);
}

function actualizarResumen() {
    const el = document.getElementById('resumen-cart');
    if (!el) return;
    fetch(el.dataset.url, { headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json' } })
        .then(r => r.json())
        .then(d => {
            document.getElementById('r-base').textContent = '$' + d.baseImponible;
            document.getElementById('r-dto').textContent = '-$' + d.descuentoTotal;
            document.getElementById('r-total').textContent = '$' + d.total;
        });
}

export function initCartAjax() {
    document.querySelectorAll('[data-add-cart]').forEach(btn => {
        btn.addEventListener('click', function () {
            const url = this.dataset.addCart;
            fetch(url, { method: 'POST', headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content, 'Accept': 'application/json' } })
                .then(r => r.json().then(d => ({ status: r.status, body: d })))
                .then(({ status, body }) => {
                    if (status === 422 && body.error) {
                        mostrarError(body.error);
                        return;
                    }
                    actualizarResumen();
                    this.innerHTML = '<i class="bi bi-check"></i>';
                    this.style.backgroundColor = '#16a34a';
                });
        });
    });

    document.querySelectorAll('[data-remove-cart]').forEach(form => {
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            fetch(this.action, { method: 'POST', headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content, 'Accept': 'application/json' } })
                .then(r => r.json())
                .then(d => actualizarResumen());
            this.closest('.cart-item')?.remove();
        });
    });

    document.querySelectorAll('[data-cart-up]').forEach(btn => {
        btn.addEventListener('click', function () {
            const url = this.dataset.cartUp;
            fetch(url, { method: 'POST', headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content, 'Accept': 'application/json' } })
                .then(r => r.json().then(d => ({ status: r.status, body: d })))
                .then(({ status, body }) => {
                    if (status === 422 && body.error) {
                        mostrarError(body.error);
                        return;
                    }
                    actualizarResumen();
                    const span = this.parentElement.querySelector('.cart-qty');
                    if (span) span.textContent = parseInt(span.textContent) + 1;
                });
        });
    });

    document.querySelectorAll('[data-cart-down]').forEach(btn => {
        btn.addEventListener('click', function () {
            const url = this.dataset.cartDown;
            fetch(url, { method: 'POST', headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content, 'Accept': 'application/json' } })
                .then(r => r.json())
                .then(d => actualizarResumen());
            const span = this.parentElement.querySelector('.cart-qty');
            const val = parseInt(span.textContent);
            if (val <= 1) {
                this.closest('.cart-item')?.remove();
            } else {
                span.textContent = val - 1;
            }
        });
    });
}

document.addEventListener('DOMContentLoaded', initCartAjax);
