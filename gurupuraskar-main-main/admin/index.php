<?php include "includes/components/html-header.php"; displayTitle("Admin Login"); importStyleSheets(["admin-login", "input"]); ?>
<?php include "../includes/functions/security.php"; ?>
<?php include "../includes/functions/validation.php"; ?>
<?php include "../includes/functions/cookies.php"; ?>
<?php include "includes/functions/security.php"; ?>

<?php
if (isAdminLoggedIn()) {
    redirect("admin-panel");
}

if (isset($_POST['login-btn'])) {
    $user = $_POST['user-name'];
    $pass = $_POST['user-pass'];

    if ($user === "admin" && $pass === "root") {
        loginAdmin("admin");
        redirect("admin-panel");
    } else {
        redirectWithQuery("index", "error=invalid");
    }
}
?>

<body>
    <main>
        <div class="logo flex justify-center align-center gap-10px">
            <img src="./assets/svg/admin-logo.svg" alt="">
            <h2>Gurupuraskar</h2>
        </div>
        <form action="" method="POST" class="flex column justify-center align-center">
            <h3 class="fw-200">Admin login</h3>
            <div class="full-width flex column justify-center align-center">
                <div class="input-field full-width flex column align-start gap-5px">
                    <span class="input-field-title flex full-width justify-start gap-10px">
                        <h5 class="fw-200" id="input-field-title">Username</h5>
                    </span>
                    <input type="text" name="user-name">
                </div>
                <div class="input-field full-width flex column align-start gap-5px">
                    <span class="input-field-title flex full-width justify-start gap-10px">
                        <h5 class="fw-200" id="input-field-title">Password</h5>
                    </span>
                    <input type="password" name="user-pass">
                    <?php
                    // Checks that the phone number is valid.
                    checkError("error", "invalid") ? print("<h4 class='text-center' id='warn-mob-num'>Access denied.</h4>") : print("");
                    ?>
                </div>
            </div>
            <button type="submit" name="login-btn" class="flex justify-sp-ard align-center">
                <h4>Continue</h4>
                <img src="./../assets/svg/right-arrow.svg" alt="">
            </button>
        </form>
    </main>
</body>
</html>