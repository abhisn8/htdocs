<?php
// Function for displaying donation row.
function donationRow($name, $code, $tcode, $date, $amount, $status) {
    switch ($status) {
        case 'success':
            $status = <<<DELIMETER
            <td class="success">SUCCESS</td>
            DELIMETER;
            break;
            
        case 'failure':
            $status = <<<DELIMETER
            <td class="fail">FAILURE</td>
            DELIMETER;
            break;

        case 'pending':
            $status = <<<DELIMETER
            <td class="pending">PENDING</td>
            DELIMETER;
            break;

        default:
            # code...
            break;
    }

    return <<<DELIMETER
    <tr>
        <td>
            <h4>{$name}</h4>
            <h4>ID: {$code}</h4>
        </td>
        <td>ID: {$code}</td>
        <td>{$tcode}</td>
        <td>{$date}</td>
        <td>{$amount}INR</td>
        {$status}
        <td><a href="donations.php?receipt={$tcode}" class="btn btn-primary">View</a>
    </tr>
    DELIMETER;
}

function displayDonations($class="all", $case="") {
    global $connection;
    switch ($case) {
        case 'success':
            $query = "SELECT * FROM users_transaction WHERE transaction_status = 'success' ORDER BY id DESC";
            break;

        case 'pending':
            $query = "SELECT * FROM users_transaction WHERE transaction_status = 'pending' ORDER BY id DESC";
            break;

        case 'failure':
            $query = "SELECT * FROM users_transaction WHERE transaction_status = 'failure' ORDER BY id DESC";
            break;

        case 'refunded':
            $query = "SELECT * FROM users_transaction WHERE transaction_status = 'refunded' ORDER BY id DESC";
            break;
            
        case 'donations':
            $query = "SELECT * FROM users_transaction WHERE user_code = 'From Donations' ORDER BY id DESC";
            break;
        
        default:
            $query = "SELECT * FROM users_transaction ORDER BY id DESC";
            break;
    }

    $stmt = $connection->prepare($query);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $output = "";

    foreach ($result as $row) {
        $output .= donationRow($row['user_full_name'], $row['user_code'], $row['transaction_code'], $row['transaction_date'], $row['transaction_amount'], $row['transaction_status']);
    }

    return <<<DELIMETER
    <tbody class="donation-table {$class}">
    {$output}
    <tbody>
    DELIMETER;
}

function displayDonationsOfUser($user, $class="all", $case="") {
    global $connection;
    switch ($case) {
        case 'success':
            $query = "SELECT * FROM users_transaction WHERE transaction_status = 'success' AND user_code = :s1 OR transaction_code = :s1 ORDER BY id DESC";
            break;

        case 'pending':
            $query = "SELECT * FROM users_transaction WHERE transaction_status = 'pending' AND user_code = :s1 OR transaction_code = :s1 ORDER BY id DESC";
            break;

        case 'failure':
            $query = "SELECT * FROM users_transaction WHERE transaction_status = 'failure' AND user_code = :s1 OR transaction_code = :s1 ORDER BY id DESC";
            break;

        case 'refunded':
            $query = "SELECT * FROM users_transaction WHERE transaction_status = 'refunded' AND user_code = :s1 OR transaction_code = :s1 ORDER BY id DESC";
            break;
        
        default:
            $query = "SELECT * FROM users_transaction WHERE user_code = :s1 OR transaction_code = :s1 ORDER BY id DESC";
            break;
    }

    $stmt = $connection->prepare($query);
    $stmt->bindValue(':s1', $user);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $output = "";

    foreach ($result as $row) {
        $output .= donationRow($row['user_full_name'], $row['user_code'], $row['transaction_code'], $row['transaction_date'], $row['transaction_amount'], $row['transaction_status']);
    }

    return <<<DELIMETER
    <tbody class="donation-table {$class}">
    {$output}
    <tbody>
    DELIMETER;
}
?>