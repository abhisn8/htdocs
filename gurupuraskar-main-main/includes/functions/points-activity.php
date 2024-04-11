<?php
// Function for displaying all the data for points activity.
function getActivity($uc, $type) {
    global $connection;

    if ($type == 'all') {
        $stmt = $connection->prepare(
            "SELECT * FROM activity WHERE user_code = :s1 ORDER BY activity_date DESC, id DESC"
        );
        $stmt->bindParam(':s1', $uc);
    } else {
        $stmt = $connection->prepare(
            "SELECT * FROM activity WHERE user_code = :s1 AND activity_points_name = :s2 ORDER BY activity_date DESC, id DESC"
        );
        $stmt->bindParam(':s1', $uc);
        $stmt->bindParam(':s2', $type);
    }
    
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Function for setting all the data for points activity.
function setActivity($uc, $title, $type, $from, $date, $points, $balance, $balanceType) {
    global $connection;

    $stmt = $connection->prepare(
        "INSERT INTO `activity`(`user_code`, `activity_name`, `activity_from`, `activity_date`, `activity_points_name`, `activity_points`, `activity_balance`, `activity_balance_type`)
        VALUES (:s1, :s2, :s3, :s4, :s5, :s6, :s7, :s8)"
    );
    $stmt->bindParam(':s1', $uc);
    $stmt->bindParam(':s2', $title);
    $stmt->bindParam(':s3', $from);
    $stmt->bindParam(':s4', $date);
    $stmt->bindParam(':s5', $type);
    $stmt->bindParam(':s6', $points);
    $stmt->bindParam(':s7', $balance);
    $stmt->bindParam(':s8', $balanceType);
    $stmt->execute();

    return true;
}
?>