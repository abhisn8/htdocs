<?php
// Function for adding a notification for a user.
function addNotification($uc, $title) {
    global $connection;

    $time = date("h:iA d/m/Y");

    $stmt = $connection->prepare(
        "INSERT INTO notifications (user_code, notification_title, notification_date, notification_status)
        VALUES (:s1, :s2, :s3, 'UNSEEN')"
    );
    $stmt->bindParam(":s1", $uc);
    $stmt->bindParam(":s2", $title);
    $stmt->bindParam(":s3", $time);
    $stmt->execute();

    return true;
}

// Function for setting all the notifications seen.
function markAllNotificationsSeen($uc) {
    global $connection;

    $stmt = $connection->prepare(
        "UPDATE notifications SET notification_status = 'SEEN' WHERE user_code = :s1"
    );
    $stmt->bindParam(":s1", $uc);
    $stmt->execute();

    return true;
}

// Function for getting all the unseen notifications of a user.
function getAllUnseenNotifications($uc) {
    global $connection;

    $stmt = $connection->prepare(
        "SELECT * FROM notifications WHERE user_code = :s1 ORDER BY id DESC"
    );
    $stmt->bindParam(":s1", $uc);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($stmt->rowCount() > 0) {
        return $result;
    } else {
        return false;
    }
}

// Function for getting the total number of unseen notifications of a user.
function getAllUnseenNotificationsCount($uc) {
    global $connection;

    $stmt = $connection->prepare(
        "SELECT COUNT(id) FROM notifications WHERE user_code = :s1 AND notification_status = 'UNSEEN' "
    );
    $stmt->bindParam(":s1", $uc);
    $stmt->execute();

    return intval($stmt->fetch(PDO::FETCH_ASSOC)['COUNT(id)']);
}
?>