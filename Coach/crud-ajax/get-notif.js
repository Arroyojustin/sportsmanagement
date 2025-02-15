$(document).ready(function () {
    function formatTimestamp(timestamp) {
        const postDate = new Date(timestamp);
        const now = new Date();
        const diffInSeconds = Math.floor((now - postDate) / 1000);
        const diffInMinutes = Math.floor(diffInSeconds / 60);
        const diffInHours = Math.floor(diffInMinutes / 60);
        const diffInDays = Math.floor(diffInHours / 24);

        let timeAgo;
        if (diffInSeconds < 60) {
            timeAgo = "Now";
        } else if (diffInMinutes < 60) {
            timeAgo = `${diffInMinutes} min${diffInMinutes > 1 ? "s" : ""} ago`;
        } else if (diffInHours < 24) {
            timeAgo = `${diffInHours} hour${diffInHours > 1 ? "s" : ""} ago`;
        } else {
            timeAgo = `${diffInDays} day${diffInDays > 1 ? "s" : ""} ago`;
        }

        return `${timeAgo} - ${postDate.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit', hour12: true })}`;
    }

    // Function to load notifications
    window.loadNotifications = function() {
        $.ajax({
            url: "controller/get-notif.php", // The PHP file to fetch notifications
            method: "GET",
            dataType: "json",
            success: function (data) {
                const notificationContainer = $("#notificationContainer");
                notificationContainer.empty(); // Clear previous content
                if (data.length > 0) {
                    data.forEach(function (notification) {
                        const formattedTime = formatTimestamp(notification.created_at);
                        const notificationItem = `
                            <div class="notif-post">
                                <div class="notif-content">
                                    <p>${notification.message}</p>
                                    <small class="notif-time">${formattedTime}</small>
                                </div>
                            </div>
                        `;
                        notificationContainer.append(notificationItem);
                    });
                } else {
                    notificationContainer.html("<p class='text-muted'>No notifications found.</p>");
                }
            },
            error: function (xhr, status, error) {
                console.error("Error fetching notifications:", error);
            },
        });
    }

    // Function to trigger post button click
    $("#notificationMessage").keypress(function (event) {
        if (event.which === 13) { // 13 is the Enter key code
            event.preventDefault(); // Prevent default form submission
            $("#postButton").click(); // Simulate button click
        }
    });

    // Initial load
    loadNotifications();
  
    // Reload notifications every 10 seconds
    setInterval(loadNotifications, 10000);
});
