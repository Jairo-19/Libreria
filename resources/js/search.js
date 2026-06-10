export function initBookSearch() {
	const searchInput = document.getElementById('search-input');
	const cards = document.querySelectorAll('[data-libro-card]');
	const emptyState = document.getElementById('search-empty-state');

	if (!searchInput || !cards.length) {
		return;
	}

	const normalize = (value) => value.toLowerCase().trim();

	const applyFilter = () => {
		const query = normalize(searchInput.value);
		let visibleCount = 0;

		cards.forEach((card) => {
			const searchableText = normalize(card.dataset.searchText || '');
			const isVisible = searchableText.includes(query);

			card.style.display = isVisible ? '' : 'none';

			if (isVisible) {
				visibleCount += 1;
			}
		});

		if (emptyState) {
			emptyState.classList.toggle('hidden', visibleCount > 0);
		}
	};

	searchInput.addEventListener('input', applyFilter);
	applyFilter();
}

document.addEventListener('DOMContentLoaded', initBookSearch);