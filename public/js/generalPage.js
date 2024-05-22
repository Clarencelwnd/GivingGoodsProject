document.addEventListener('DOMContentLoaded', function () {
        // Add click event listener to each filter option
        document.querySelectorAll('.filter-option').forEach(item => {
            item.addEventListener('click', event => {
                event.preventDefault();

                // Get the status from the data attribute
                const status = item.dataset.status;

                // Filter activities based on the status and display only matching activities
                const filteredActivities = activities.filter(activity => activity.status === status);
                displayFilteredActivities(filteredActivities);
            });
        });
    });

    // Function to display filtered activities
    function displayFilteredActivities(filteredActivities) {
        // Clear the existing activities
        const cardContainer = document.querySelector('.card-container');
        cardContainer.innerHTML = '';

        // Display filtered activities
        filteredActivities.forEach(activity => {
            const card = document.createElement('div');
            card.classList.add('card');
            // Populate card with activity details
            card.innerHTML = `<div class="card-body">
                                    <h5 class="card-title">${activity.title}</h5>
                                    <p class="card-text">${activity.description}</p>
                                    <!-- Add more activity details here -->
                                </div>`;
            cardContainer.appendChild(card);
        });
    }
