document.querySelector(".hamburger-btn").addEventListener("click", () => {
    document.querySelector(".sidebar-bg").style.display = "flex";
});

document.querySelector("#sidebar-close-btn").addEventListener("click", () => {
    document.querySelector(".sidebar-bg").style.display = "none";
});

document.querySelector(".notifications-btn").addEventListener("click", () => {
    const notifs = document.querySelector(".notifications");

    if (notifs.style.display === "flex") {
        notifs.style.display = "none";
    } else {
        notifs.style.display = "flex";
        markAllNotificationsSeen();
    }
});

function markAllNotificationsSeen() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "api/notifications/notifications.php?action=setNotificationsSeen", true);

    xhr.onload = function () {
        if (xhr.status >= 200 && xhr.status < 300) {
            // Successful response
            var response = xhr.responseText;
            response = JSON.parse(response);
            console.log(response['status']);
        } else {
            console.error("Request failed with status: " + xhr.status);
        }
    };

    xhr.send();
}