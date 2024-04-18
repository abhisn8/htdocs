<?php
// Function for generating a referal code.
function generateReferalCode() {
    $characters = "0123456789ABCDEFGHIJKLMNOPQRSTUVXWYZ";
    $charactersLength = 5;
    $randomString = "";
    for ($i = 0; $i < $charactersLength; $i++) {
        $randomString .= $characters[rand(0, 35)];
    }
    return $randomString;
}

function generateUserReferalCode($name, $number) {
    $nameCode = substr(strtoupper($name), 0, 2);
    $mobileCode = substr(strval($number), 6, 3);
    
    return $nameCode . $mobileCode;
}

// Function for getting the user associated with the referral code.
function getReferralUserCode($ref) {
    global $connection;

    $stmt = $connection->prepare("SELECT user_code FROM users_data WHERE user_referral_code = :s1");
    $stmt->bindParam(':s1', $ref);
    $stmt->execute();
    
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result ? $result['user_code'] : false;
}

// Function for getting the referral code of a user.
function getReferralCode($uc) {
    global $connection;

    $stmt = $connection->prepare("SELECT user_referral_code FROM users_data WHERE user_code = :s1");
    $stmt->bindParam(':s1', $uc);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result ? $result['user_referral_code'] : false;
}

// Function for adding the data about the referral.
function addReferral($referralCode, $sender, $senderBalance, $reciever, $recieverBalance, $date) {
    global $connection;

    $stmt = $connection->prepare(
        "INSERT INTO `referrals`(`sender_user_code`, `reciever_user_code`, `sender_balance`, `reciever_balance`, `referral_code`, `referred_date`)
        VALUES (:s1, :s2, :s3, :s4, :s5, :s6)"
    );
    $stmt->bindParam(":s1", $sender);
    $stmt->bindParam(":s2", $reciever);
    $stmt->bindParam(":s3", $senderBalance);
    $stmt->bindParam(":s4", $recieverBalance);
    $stmt->bindParam(":s5", $referralCode);
    $stmt->bindParam(":s6", $date);
    $stmt->execute();

    return true;
}

// Function for getting the referrals data.
function getreferralsData() {
    
}
?>