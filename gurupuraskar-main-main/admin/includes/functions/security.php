<?php
// Function for logging the admin in.
function loginAdmin($ac) {
    createSession("admin_code", $ac);
    return true;
}

// Function for logging out the admin.
function logoutAdmin() {
    deleteSession("admin_code");
    return true;
}

// Function for checking that the admin is logged in.
function isAdminLoggedIn() {
    $admin = getSession("admin_code");

    if (isset($admin) && !empty($admin)) {
        return true;
    } else {
        return false;
    }
}
?>