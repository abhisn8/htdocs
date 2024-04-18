<?php
// Function for getting the transaction status.
function getTransationStatus($status) {
    switch ($status) {
        case 'success':
            $delim = <<<DELIMETER
            <td class="flex align-center gap-10px">
                <div class="dot green"></div>
                Success
            </td>
            DELIMETER;
            break;
            
        case 'failure':
            $delim = <<<DELIMETER
            <td class="flex align-center gap-10px">
                <div class="dot red"></div>
                Failed
            </td>
            DELIMETER;
            break;
            
        default:
            $delim = <<<DELIMETER
            <td class="flex align-center gap-10px">
                <div class="dot orange"></div>
                Pending
            </td>
            DELIMETER;
        break;
    }

    return $delim;
}

// Function for getting a transaction row.
function transactionRow($name, $amount, $date, $status, $refCode) {
    $status = getTransationStatus($status);

    return <<<DELIMETER
    <tr>
        <td>{$name}</td>
        <td>₹{$amount}</td>
        <td>{$date}</td>
        {$status}
        <td><a href="dashboard-settings.php?print={$refCode}">View</a></td>
    </tr>
    DELIMETER;   
}

// Function for displaying the transaction table.
function displayTransactionTable($userCode, $case="transactions") {
    global $connection;

    if ($case == "transactions") {
        $query = "SELECT * FROM users_transaction WHERE user_code = :s1 ORDER BY id DESC";
    } elseif ($case == "donations") {
        $query = "SELECT * FROM users_transaction WHERE user_code = :s1 AND transaction_name = 'Donation' ORDER BY id DESC";
    }

    $stmt = $connection->prepare($query);
    $stmt->bindValue(":s1", $userCode);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $table = "";
    foreach ($result as $row) {
        $table .= transactionRow($row['transaction_name'], $row['transaction_amount'], $row['transaction_date'], $row['transaction_status'], $row['transaction_code']);
    }

    return $table;
}
?>