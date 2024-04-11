<?php
// Function for updating the event details.
function getEventDetail($detail) {
    global $connection;

    $stmt = $connection->prepare("SELECT * FROM event_details LIMIT 1");
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC)['event_' . $detail];
}

// Function for updating the event detail.
function updateEventDetail($detail, $value) {
    global $connection;

    $stmt = $connection->prepare("UPDATE event_details SET event_{$detail} = :s1");
    $stmt->bindValue(":s1", $value);
    $stmt->execute();

    return true;
}
?>