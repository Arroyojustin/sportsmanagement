function fetchNotifications() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "controller/notifications.php", true);
    xhr.onload = function () {
        if (xhr.status === 200) {
            var notifications = JSON.parse(xhr.responseText);
            var notificationsContainer = document.querySelector('.studnotification-container');

            // Clear previous notifications
            notificationsContainer.innerHTML = '';

            // Display each notification as an individual card
            notifications.forEach(function (message) {
                // Create a card for each notification
                var notificationCard = document.createElement('div');
                notificationCard.classList.add('notification-card');  // Give the card class for styling

                var notificationText = document.createElement('p');  // Wrap the message in a <p> tag for proper formatting
                notificationText.textContent = message;

                // Append the message to the card
                notificationCard.appendChild(notificationText);

                // Add the card to the container
                notificationsContainer.appendChild(notificationCard);
            });
        } else {
            console.error('Error fetching notifications');
        }
    };
    xhr.send();
}

window.onload = fetchNotifications;
