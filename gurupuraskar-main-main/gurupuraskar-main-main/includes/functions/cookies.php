<?php
// Function for creating the cookies.
function createCookie($name, $value, $expireTime) {
    // setcookie($name, $value, $expireTime, "/", "gurupuraskar.com", true, true);
    setcookie($name, $value, $expireTime, "/");
    return true;
}

// Function for extracting a cookie.
function getCookie($name) {
    if (isset($_COOKIE[$name])) {
        return $_COOKIE[$name];
    } else {
        return false;
    }
}

// Function for deleting a cookie.
function deleteCookie($name) {
    // setcookie($name, "", time() - 3600, "/", "gurupuraskar.com", true, true);
    setcookie($name, "", time() - 3600, "/");
    return true;
}

// Function for creating a coockie for 1 month.
function createCookieForMonth($name, $value) {
    $secondsInMonth = 2592000;
    createCookie($name, $value, time() + $secondsInMonth);
    return true;
}

// Function for creating a session.
function createSession($name, $value) {
    $_SESSION[$name] = $value;
    return true;
}

// Fucntion for deleting a session.
function deleteSession($name) {
    unset($_SESSION[$name]);
    return true;
}

// Function for extracting a session.
function getSession($name) {
    if (isset($_SESSION[$name])) {
        return $_SESSION[$name];
    } else {
        return false;
    }
}
?>