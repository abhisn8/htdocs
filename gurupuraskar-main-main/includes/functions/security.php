<?php
use Dotenv\Util\Str;

// Function for hashing the password.
function hashPassword($pass) {
    $salt = "!#$@RWE@W#!$#%$##$!@#";
    return password_hash($salt . $pass . $salt, PASSWORD_BCRYPT);
}

// Function for verifying the password.
function verifyPassword($pass, $hash): String {
    $salt = "!#$@RWE@W#!$#%$##$!@#";
    return strval(password_verify($salt . $pass . $salt, $hash));
}

// Function for generating a random string.
function randomString() : String {
    $characters = "0123456789ABCDEFGHIJKLMNOPQRSTUVXWYZ";
    $randomString = "";
    for ($i = 0; $i < 15; $i++) {
        $randomString .= $characters[rand(0, 35)];
    }
    return $randomString;
}

// Function for redirecting the user to new page.
function redirect($location) {
    header("Location:{$location}.php");
    exit;
}

// Function for redirecting the user to new page with javascript.
function redirectWithScript($location) {
    echo <<<DELIMETER
    <script>
        window.location.href = "{$location}";
    </script>
    DELIMETER;
}

function redirectWithQuery($location, $query) {
    header("Location: {$location}.php?{$query}");   
}

// Function for checking that a user has filled the onboarding form.
function isOnboardingFormFilled ($userCode) {
    global $connection;

    $stmt = $connection->prepare("SELECT * FROM `users_data` WHERE `user_code` = :s1");
    $stmt->bindValue(":s1", $userCode);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Function for checking that the sysytem is locked or not.
function isAppLocked() {
    global $connection;

    $stmt = $connection->prepare("SELECT app_locked FROM `app_config` WHERE `id` = :s1");
    $stmt->bindValue(":s1", "1");
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($result["app_locked"] === 1) {
        return true;
    } else {
        return false;
    }
}
?>