function setupPaginationForContainers() {
    let itemsPerPage = 5;

    const cardContainers = document.querySelectorAll('.card-container');
    const paginationContainers = document.querySelectorAll('.pagination-container');

    cardContainers.forEach((dataContainer, index) => {
        let currentPage = 1;

        if (dataContainer.classList.contains('all-anime') || dataContainer.classList.contains('all-manga')) {
            itemsPerPage = 15;
        }else if(dataContainer.classList.contains('review-card-container')){
            itemsPerPage = 3;
        } else {
            itemsPerPage = 5; 
        }
        const cards = dataContainer.querySelectorAll('.card');
        const totalPages = Math.ceil(cards.length / itemsPerPage);

        function displayData(page) {
            const start = (page - 1) * itemsPerPage;
            const end = start + itemsPerPage;

            cards.forEach(card => card.style.display = 'none');

            for (let i = start; i < end; i++) {
                if (cards[i]) {
                    cards[i].style.display = 'block';
                }
            }
        }

        function createPrevNextButtons() {
            const currentPageElement = document.createElement('div');
            currentPageElement.textContent = currentPage;
            const prevButton = document.createElement('button');
            prevButton.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m313-440 224 224-57 56-320-320 320-320 57 56-224 224h487v80H313Z"/></svg>';

            const nextButton = document.createElement('button');
            nextButton.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M647-440H160v-80h487L423-744l57-56 320 320-320 320-57-56 224-224Z"/></svg>';

            function updateButtonStates() {
                if (currentPage != 1) {
                    prevButton.classList.add('active');
                } else {
                    prevButton.classList.remove('active');
                }

                if (currentPage != totalPages) {
                    nextButton.classList.add('active');
                } else {
                    nextButton.classList.remove('active');
                }
            }

            prevButton.addEventListener('click', () => {
                if (currentPage > 1) {
                    currentPage--;
                    currentPageElement.textContent = currentPage;
                    displayData(currentPage);
                    updateButtonStates();
                }
            });

            nextButton.addEventListener('click', () => {
                if (currentPage < totalPages) {
                    currentPage++;
                    currentPageElement.textContent = currentPage;
                    displayData(currentPage);
                    updateButtonStates();
                }
            });

            updateButtonStates();

            paginationContainers[index].appendChild(prevButton);
            paginationContainers[index].appendChild(currentPageElement);
            paginationContainers[index].appendChild(nextButton);
        }

        displayData(currentPage);
        createPrevNextButtons();
    });
}

document.addEventListener("DOMContentLoaded", setupPaginationForContainers);
