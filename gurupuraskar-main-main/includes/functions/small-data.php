<?php
function saveSmallData($uc, $ref, $task, $refer="") {
    global $connection;

    $stmt = $connection->prepare("INSERT INTO `small_data`(`user_code`, `reference`,`task`, `referrer`) VALUES (:s1, :s2, :s3, :s4)");
    $stmt->bindValue(":s1", $uc);
    $stmt->bindValue(":s2", $ref);
    $stmt->bindValue(":s3", $task);
    $stmt->bindValue(":s4", $refer);
    $stmt->execute();

    return true;
}

function getSmallData($ref, $task) {
    global $connection;
    
    $stmt = $connection->prepare("SELECT user_code FROM `small_data` WHERE `reference` = :s1 AND `task` = :s2");
    $stmt->bindValue(":s1", $ref);
    $stmt->bindValue(":s2", $task);
    $stmt->execute();
    
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    return $result ? $result['user_code'] : false;
}

function deleteSmallData($ref) {
    global $connection;
    
    $stmt = $connection->prepare("DELETE FROM `small_data` WHERE reference = :s1");
    $stmt->bindValue(":s1", $ref);
    $stmt->execute();

    return true;
}

function getReferrer($ref) {
    global $connection;

    $stmt = $connection->prepare("SELECT `referrer` FROM `small_data` WHERE `reference` = :s1");
    $stmt->bindValue(":s1", $ref);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result ? $result['referrer'] : false;
}
?>