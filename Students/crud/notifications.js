document.addEventListener("DOMContentLoaded", function () {
    console.log("Notifications script loaded successfully."); // Debugging

    function fetchNotifications() {
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "controller/notifications.php", true);
        xhr.onload = function () {
            if (xhr.status === 200) {
                var notifications = JSON.parse(xhr.responseText);
                var notificationsContainer = document.querySelector('.studnotification-container');

                if (!notificationsContainer) {
                    console.error("Notification container not found.");
                    return;
                }

                // Clear previous notifications
                notificationsContainer.innerHTML = '';

                notifications.forEach(function (notif) {
                    var notificationCard = document.createElement('div');
                    notificationCard.classList.add('notification-card');

                    var notificationText = document.createElement('p');
                    notificationText.textContent = notif.message;

                    var notificationTime = document.createElement('small'); // Timestamp
                    notificationTime.textContent = notif.created_at;
                    notificationTime.classList.add('notif-time'); // Class for styling

                    notificationCard.appendChild(notificationText);
                    notificationCard.appendChild(notificationTime);
                    notificationsContainer.appendChild(notificationCard);
                });

                console.log("Notifications loaded successfully."); // Debugging
            } else {
                console.error('Error fetching notifications');
            }
        };
        xhr.send();
    }

    fetchNotifications();
});
