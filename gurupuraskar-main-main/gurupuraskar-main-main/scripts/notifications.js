setInterval(getAllNotifications(), 1000);
setInterval(getUnseenNotificationsCount(), 1000);

function getAllNotifications() {
    const notifications = document.querySelector(".notifications-container");

    var xhr = new XMLHttpRequest();
    xhr.open("GET", "api/notifications/notifications.php?action=getAllNotifications", true);

    xhr.onload = function () {
        if (xhr.status >= 200 && xhr.status < 300) {
            // Successful response
            var response = xhr.responseText;
            response = JSON.parse(response);

            if (response.length !== 0) {
                for (let i = 0; i < response.length; i++) {
                    notifications.appendChild(newNotification(response[i]['title'], response[i]['date']));
                }
            } else {
                notifications.innerHTML = "You have no new notifications."
            }

        } else {
            console.error("Request failed with status: " + xhr.status);
        }
    };
      
    // Send the request
    xhr.send();
}

function getUnseenNotificationsCount() {
    const notifCount = document.querySelector("#notification-count");

    var xhr = new XMLHttpRequest();
    xhr.open("GET", "api/notifications/notifications.php?action=getUnseenNotificationsCount", true);

    xhr.onload = function () {
        if (xhr.status >= 200 && xhr.status < 300) {
            // Successful response
            var response = xhr.responseText;
            response = JSON.parse(response);

            notifCount.innerHTML = response['count'];
        } else {
            console.error("Request failed with status: " + xhr.status);
        }
    };
      
    // Send the request
    xhr.send();
}

// Function for creatin a new notification.
function newNotification(title, date) {
    var newDiv = document.createElement("div");
    newDiv.className = "notif border-radius-5px flex column gap-10px";

    // Create and append the content element (h5) to the new div
    var content = document.createElement("h5");
    content.className = "content fw-200";
    content.textContent = title;
    newDiv.appendChild(content);

    // Create and append the time element (h5) to the new div
    var time = document.createElement("h5");
    time.className = "time fw-200";
    time.textContent = date;
    newDiv.appendChild(time);

    return newDiv;
}