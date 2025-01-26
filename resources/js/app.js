import './bootstrap';
import '@tabler/core/src/js/tabler.js';
import './bootstrap-navbar.js';
import './theme.js';
import './genre.js'
import './top-games.js'

document.addEventListener('DOMContentLoaded', () => {
    const hiddenBadges = JSON.parse(localStorage.getItem('hiddenBadges')) || [];

    document.querySelectorAll('.log-item').forEach((item) => {
        const logId = item.dataset.logId;

        if (hiddenBadges.includes(logId)) {
            const badge = item.querySelector('.badge-visible');
            if (badge) {
                badge.classList.remove('badge-visible');
                badge.classList.add('badge-hidden');
            }
        }

        item.addEventListener('mouseover', () => {
            hideBadge(item);
        });
    });
});

function hideBadge(element) {
    const logId = element.dataset.logId;
    const badge = element.querySelector('.badge-visible');
    if (badge) {
        badge.classList.remove('badge-visible');
        badge.classList.add('badge-hidden');

        let hiddenBadges = JSON.parse(localStorage.getItem('hiddenBadges')) || [];
        if (!hiddenBadges.includes(logId)) {
            hiddenBadges.push(logId);
            localStorage.setItem('hiddenBadges', JSON.stringify(hiddenBadges));
        }
    }
}
