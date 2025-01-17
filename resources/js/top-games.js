document.querySelectorAll('.filter__controls li').forEach((filter) => {
    filter.addEventListener('click', function () {

        document.querySelectorAll('.filter__controls li').forEach((li) => li.classList.remove('active'));
        this.classList.add('active');


        const filterClass = this.getAttribute('data-filter');


        const items = document.querySelectorAll('.filter__gallery__item');


        items.forEach((item) => {
            if (!item.classList.contains(filterClass)) {
                item.classList.add('hidden');
                setTimeout(() => {
                    item.style.display = 'none';
                }, 500);
            } else {
                item.style.display = '';
                setTimeout(() => {
                    item.classList.remove('hidden');
                }, 10);
            }
        });
    });
});
