<?php
// Function for logging the user in.
function loginUser ($code) {
    if (userExists($code) && !isUserBlocked($code)) {
        createCookieForMonth("user_code", $code);
        // createSession("user_code", $code);
        return true;
    } else {
        return false;
    }
}

// Function for logging out the user.
function logoutUser() {
    deleteCookie("user_code");
    // deleteSession("user_code");
    return true;
}

// Function for checking if the user is logged in.
function isLoggedIn() {
    // $uCode = getCookie("user_code");
    $uCode = $_COOKIE["user_code"];

    if (!empty($uCode) && userExists($uCode)) {
        return true;
    } else {
        return false;
    }
}

// Function for getting total user count.
function getUsersCount() {
    global $connection;
    $stmt = $connection->prepare("SELECT user_code FROM users_data");
    $stmt->execute();

    return $result = $stmt->rowCount();
}

// Function for getting that the user is blocked or not.
function isUserBlocked($uc) {
    global $connection;

    if (userExists($uc)) {
        $stmt = $connection->prepare("SELECT user_blocked FROM users WHERE user_code = :s1 OR user_mob_num = :s1");
        $stmt->bindParam(":s1", $uc);
        $stmt->execute();
    
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($result['user_blocked'] == 1) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;   
    }
}

// Function for getting the user's status.
// REG => User has registered.
// ON1 => User has filled the onboarding form 1.
// PAD => User has filled the onboarding form 2 and paid the registration fees.
// SAN => User has not filled the self assessment form but has gone through the page.
// SAF => User has filled the self assessment from.
function getUserStatus($uc) {
    global $connection;

    $stmt = $connection->prepare("SELECT user_class FROM users WHERE user_code = :s1");
    $stmt->bindValue(":s1", $uc);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$result) {
        return false;
    } else {
        return $result['user_class'];
    }
}

// Function for setting the user's status.
function setUserStatusTo($uc, $st) {
    global $connection;

    $stmt = $connection->prepare("UPDATE users SET user_class = :s1 WHERE user_code = :s2");
    $stmt->bindValue(":s1", $st);
    $stmt->bindValue(":s2", $uc);

    return $stmt->execute();
}

// Function for getting the user's name.
function getUserName($uc) {
    global $connection;

    $stmt = $connection->prepare("SELECT user_full_name FROM users_data WHERE user_code = :s1");
    $stmt->bindValue(":s1", $uc);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result ? $result['user_full_name'] : false;
}

// Function for getting the user's phone number.
function getUserPhone($uc) {
    global $connection;

    $stmt = $connection->prepare("SELECT user_mob_num FROM users WHERE user_code = :s1");
    $stmt->bindValue(":s1", $uc);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result['user_mob_num'];
}

// Function for getting the user's email.
function getUserEmail($uc) {
    global $connection;

    $stmt = $connection->prepare("SELECT user_email FROM users_data WHERE user_code = :s1");
    $stmt->bindValue(":s1", $uc);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result['user_email'];
}

// Function for getting the user's gender.
function getUserGender($uc) {
    global $connection;

    $stmt = $connection->prepare("SELECT user_gender FROM users_data WHERE user_code = :s1");
    $stmt->bindValue(":s1", $uc);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result ? $result['user_gender'] : "";
}

// Function for getting the user's job profile.
function getUserJob($uc) {
    global $connection;

    $stmt = $connection->prepare("SELECT user_designation FROM users_data WHERE user_code = :s1");
    $stmt->bindValue(":s1", $uc);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return ($result['user_designation']);
}

// Function for getting the user's selfie.
function getUserSelfie() {
    $uc = getCookie("user_code");
    return "user-data/{$uc}.jpg";
}

function isUserEligibleForReview($uc) {
    $arp = getUserARP($uc);

    return $arp >= 100 ? true : false;
}

// Function for getting the user's address.
function getUserAddress($uc) {
    global $connection;

    $stmt = $connection->prepare("SELECT user_district FROM users_data WHERE user_code = :s1");
    $stmt->bindValue(":s1", $uc);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result['user_district'];
}

// Function for gettig a random user.
function getRandomUser($arr) {
    global $connection;

    $uc = getCookie("user_code");

    $jobs = "";
    $len = count($arr);

    for ($i=0; $i < $len; $i++) { 
        if ($len - $i === 1) {
            $jobs .= "user_designation = '{$arr[$i]}'";
        } else {
            $jobs .= "user_designation = '{$arr[$i]}' OR ";
        }
    }

    $jobs = "({$jobs})";

    $stmt = $connection->prepare(
        "SELECT users.user_code FROM users_data 
        INNER JOIN users ON users.user_code = users_data.user_code 
        WHERE users.user_code != :s1 AND
        {$jobs}
        AND users.user_class = 'SAF'
        ORDER BY RAND() LIMIT 1;"
    );
    // (user_designation = :s2 OR user_designation = :s3 OR user_designation = :s4) 
    $stmt->bindParam("s1", $uc);
    // $stmt->bindParam("s2", $j1);
    // $stmt->bindParam("s3", $j2);
    // $stmt->bindParam("s4", $j3);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC)['user_code'];

    if ($result) {
        return $result;
    } else {
        $stmt = $connection->prepare(
            "SELECT users.user_code FROM users_data INNER JOIN
            users ON users.user_code = users_data.user_code
            WHERE users.user_code != :s1 AND user_class = 'SAF' ORDER BY RAND() LIMIT 1;"
        );
        $stmt->bindParam("s1", $uc);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC)['user_code'];
    }
}

// Function for getting user's city.
function getUserCity($uc) {
    global $connection;

    $stmt = $connection->prepare("SELECT user_district FROM users_data WHERE user_code = :s1");
    $stmt->bindParam(":s1", $uc);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC)['user_district'];
}

// Function for getting user's state.
function getUserState($uc) {
    global $connection;

    $stmt = $connection->prepare("SELECT user_state FROM users_data WHERE user_code = :s1");
    $stmt->bindParam(":s1", $uc);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC)['user_state'];
}

// Function for checking that a user exists.
function userExists($num) {
    global $connection;

    $stmt = $connection->prepare("SELECT user_code FROM users WHERE user_mob_num = :s1 OR user_code = :s1");
    $stmt->bindParam(":s1", $num);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        return true;
    } else {
        return false;
    }
}

// Function for getting that the user has answered a specific question.
function userHasAnsweredQuestion($uc, $qc) {
    global $connection;

    $stmt = $connection->prepare("SELECT * FROM `assessment_form_responses` WHERE user_code = :s1 AND question_code = :s2");
    $stmt->bindParam(":s1", $uc);
    $stmt->bindParam(":s2", $qc);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result && $result['user_response'] !== "" || !empty($result['user_response']) ? true : false;
}

// Function for getting that user has filled all the questions or not.
function userHasFilledAllQuestions($uc) {
    global $connection;

    $stmt = $connection->prepare("SELECT question_code FROM `assessment_form_questions`");
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $totalQuestions = count($result);
    $totalAnsweredQuestions = 0;

    foreach ($result as $value) {
        if (userHasAnsweredQuestion($uc, $value['question_code'])) {
            $totalAnsweredQuestions++;
        }
    }

    return $totalQuestions === $totalAnsweredQuestions ? true : false;
}

// Function for getting the number of unanswered questions of a user.
function getNumberOfUnansweredQuestions($uc) {
    global $connection;

    $stmt = $connection->prepare("SELECT COUNT(id) FROM `assessment_form_responses` WHERE user_code = :s1 and user_response = ''");
    $stmt->bindValue(":s1", $uc);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC)['COUNT(id)'];
}

// Function for getting the name of the user has reffered by.
function getReferredByUserName($uc) {
    global $connection;

    $stmt = $connection->prepare("SELECT sender_user_code FROM `referrals` WHERE reciever_user_code = :s1");
    $stmt->bindParam(":s1", $uc);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        return getUserName($result['sender_user_code']);
    } else {
        return false;
    }
}
?>