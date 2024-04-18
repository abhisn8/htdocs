<?php
// Function for making a transaction record in the database.
function logTransaction($userCode, $name, $amount, $status) {
    global $connection;

    $txnCode = randomString();
    $txnDate = date("d/m/Y");
    $userFullName = getUserName($userCode);

    if ($userFullName == "") {
        $userFullName = $userCode;
        $userCode = "From Donations";
    }

    $stmt = $connection->prepare(
        "INSERT INTO 
        `users_transaction`(`user_code`, `user_full_name`, `transaction_name`, `transaction_code`, `transaction_amount`, `transaction_date`, `transaction_status`)
        VALUES (:s1, :s7, :s2, :s3, :s4, :s5, :s6)"
    );
    $stmt->bindParam(":s1", $userCode);
    $stmt->bindParam(":s2", $name);
    $stmt->bindParam(":s3", $txnCode);
    $stmt->bindParam(":s4", $amount);
    $stmt->bindParam(":s5", $txnDate);
    $stmt->bindParam(":s6", $status);
    $stmt->bindParam(":s7", $userFullName);
    $stmt->execute();

    return true;
}

function transactionExists($code) {
    global $connection;

    $stmt = $connection->prepare("SELECT id FROM `users_transaction` WHERE `transaction_code` = :s1");
    $stmt->bindParam(":s1", $code);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result ? true : false;
}
?>