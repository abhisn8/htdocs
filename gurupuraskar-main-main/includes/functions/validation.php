<?php
// Function for checking that a password is strong.
function isPassStrong($pass) {
    // Check if password is at least 8 characters long
    if (strlen($pass) < 8) {
        return false;
    }
    
    // Check if password contains at least one uppercase letter
    if (!preg_match('/[A-Z]/', $pass)) {
        return false;
    }
    
    // Check if password contains at least one lowercase letter
    if (!preg_match('/[a-z]/', $pass)) {
        return false;
    }
    
    // Check if password contains at least one number
    if (!preg_match('/\d/', $pass)) {
        return false;
    }
    
    // Password meets all criteria
    return true;
}

// Function for validating that a phone number is a valid Indian phone number.
function isValidPhoneNumber($phone) {
    // Remove all non-numeric characters from the phone number
    $phone = preg_replace('/[^0-9]/', '', $phone);
    
    // Check if phone number is exactly 10 digits long
    if (strlen($phone) != 10) {
        return false;
    }
    
    // Check if phone number starts with 7, 8, or 9
    if (!preg_match('/^[789]/', $phone)) {
        return false;
    }
    
    // Phone number is valid
    return true;
}

// Function for checking that an error exits.
function checkError($errName, $errCode) {
    if (isset($_GET[$errName])) {
        if ($_GET[$errName] === $errCode) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}
?>