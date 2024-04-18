<?php
// Function for checking that a user's score exists.
function userScoreExists($uc) {
    global $connection;

    $stmt = $connection->prepare("SELECT id FROM users_score WHERE user_code = :s1");
    $stmt->bindValue(":s1", $uc);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result ? true : false;
}

// Function for fetching the rp of a user.
function getUserScore($uc) {
    global $connection;

    $stmt = $connection->prepare("SELECT user_score FROM users_score WHERE user_code = :s1");
    $stmt->bindValue("s1", $uc);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        return $result['user_score'];
    } else {
        return 0;
    }
}

// Function for fetching the rp of a user.
function getUserRP($uc) {
    global $connection;

    $stmt = $connection->prepare("SELECT user_rp FROM users_score WHERE user_code = :s1");
    $stmt->bindValue(":s1", $uc);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        return $result['user_rp'];
    } else {
        return 0;
    }    
}

// Function for fetching the rp of a user.
function getUserARP($uc) {
    global $connection;

    $stmt = $connection->prepare("SELECT user_arp FROM users_score WHERE user_code = :s1");
    $stmt->bindValue(":s1", $uc);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        return $result['user_arp'];
    } else {
        return 0;
    }
}

// Function for increasing a user's ARP/RP.
function increaseScore($uc, $inc, $type) {
    global $connection;

    $stmt = $connection->prepare(
        "UPDATE users_score SET user_{$type} = user_{$type} + :s1 WHERE user_code = :s2"
    );
    $stmt->bindParam(":s1", $inc);
    $stmt->bindParam(":s2", $uc);
    $stmt->execute();

    return true;
}

// Function for decreasing a user's ARP/RP.
function decreaseScore($uc, $dec, $type) {
    global $connection;

    $stmt = $connection->prepare(
        "UPDATE users_score SET user_{$type} = user_{$type} - :s1 WHERE user_code = :s2"
    );
    $stmt->bindParam(":s1", $dec);
    $stmt->bindParam(":s2", $uc);
    $stmt->execute();

    return true;
}

// Function for setting a user's ARP/RP.
function setScore($uc, $rp, $arp) {
    global $connection;

    if (userScoreExists($uc)) {
        return true;
    } else {
        $stmt = $connection->prepare(
            "INSERT INTO users_score(user_code, user_rp, user_arp) VALUES(:s1, :s2, :s3)"
        );
        $stmt->bindParam(":s1", $uc);
        $stmt->bindParam(":s2", $rp);
        $stmt->bindParam(":s3", $arp);
        $stmt->execute();
    
        return true;
    }
}
?>