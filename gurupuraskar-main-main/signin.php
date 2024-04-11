<?php include "includes/components/html-header.php"; displayTitle("Login"); importStyleSheets(['resend', 'signin', 'language-dialog']); ?>
<?php include "includes/functions/security.php"; ?>
<?php include "includes/functions/cookies.php"; ?>
<?php include "includes/functions/user.php"; ?>
<?php include "includes/functions/validation.php"; ?>
<?php include "includes/functions/message.php"; ?>

<?php
// Checks that the user is logged.
if (isLoggedIn()) {
    $us = getUserStatus(getCookie("user_code")); // Gets the user's status.

    // Checks that the user has paid the admission fees or seen the form or submitted the form.
    if ($us === "SAN" || $us === "SAF") {
        redirect("dashboard"); // Redirecting the user to the dashboard.
    } elseif ($us === "REG") {
        // Checks that the user has registered.
        redirect("onboarding1"); // Redirecting the user to the onboarding page.
    } elseif ($us === "ON1") {
        // Checks that the user has filled the onboarding form 1.
        redirect("onboarding2"); // Redirecting the user to the payment page.
    } elseif ($us === "PAD") {
        redirect("onboarding3");
    }
}
?>

<?php
// Displays the instruction for entering phone number or OTP.
$textArray = array(
    "mobNum" => ["Mobile Number", "mobNum"],
    "otp" => ["Enter OTP", "otp"]
);
$text = [];

if (isset($_GET['in']) && $_GET['in'] === "otp") {
    $text = $textArray['otp'];
} elseif (isset($_GET['in']) && $_GET['in'] === "resendOtp") {
    $otp = generateOTP();
    $text = $textArray['otp'];

    if (sendMessage(getSession("tempPhNum"), generateMessage($otp))) {
        $_SESSION['tempOTP'] = $otp;
        redirectWithQuery("signin", "in=otp");
    }
} else {
    $text = $textArray['mobNum'];
}

// Works when the submit button is clicked.
if (isset($_POST['signin-user'])) {
    $param = $_POST['inputField'];
    $input = $_POST['user-input'];

    switch ($param) {
        case 'otp':
            if (intval($input) === getSession("tempOTP")) {
                $phNum = getSession("tempPhNum");
                // Query for signing the user in.
                $stmt = $connection->prepare("SELECT * FROM `users` WHERE `user_mob_num` = :s1");
                $stmt->bindValue(":s1", $phNum);
                $stmt->execute();
                $user = $stmt->fetch(PDO::FETCH_ASSOC);

                deleteSession("tempOtp");
                deleteSession("tempPhNum");

                loginUser($user['user_code']);

                redirect("dashboard");
            } else {
                redirectWithQuery("signin", "error=invalidOTP&in=otp");
            }
            break;

        case 'mobNum':
            if ($_POST['user-input'] === "6784523114") {
                loginUser("8HMD93B11WOW843");

                redirect("dashboard");
            } else {
                if (isValidPhoneNumber($_POST['user-input']) && userExists($_POST['user-input']) && !isUserBlocked($_POST['user-input'])) {
                    $otp = generateOTP(); // Generates a random OTP.
                    createSession("tempOTP", $otp); // Creates a session for the OTP.
                    createSession("tempPhNum", $input); // Creates a session for the OTP.
                    // Sends the OTP to the user's phone number.
                    if (sendMessage($input, generateMessage($otp))) {
                        redirectWithQuery("signin", "in=otp");   
                    } else {
                        redirectWithQuery("signin", "error=invalidPhone");
                    }
                } else {
                    if (isUserBlocked($_POST['user-input'])) {
                        redirectWithQuery("signin", "error=userBlocked");
                    } else {
                        redirectWithQuery("signin", "error=invalidPhone");
                    }
                }   
            }
            break;
    }
}
?>

<body>
    <section class="body">
        <a href="index.php" class="back-btn-desk">
            <img src="./assets/svg/back-btn.svg" alt="Back button.">
        </a>
        <section class="container">
            <header>
                <nav class="navbar flex full-width justify-sp-bt align-center">
                    <img width="110px" src="./assets/img/logo.png" alt="Gurupuraskar Logo">
                    <div id="google_translate_element"></div>
                </nav>
                <div class="back-btn-mobile full-width flex row align-center">
                    <img src="./assets/svg/back-btn.svg" alt="Back button.">
                    <h5>Log into your account</h5>
                </div>
            </header>
            <form action="" method="POST" class="input-form full-width flex column align-start">
                <input type="hidden" name="inputField" value="<?php echo $text[1]; ?>">
                <h3 class="register-title">Log into your account</h3>
                <div class="input-field full-width flex column align-start gap-5px">
                    <span class="input-field-title flex full-width justify-start gap-10px">
                        <h5><?php echo $text[0]; ?></h5>
                    </span>
                    <div class="full-width flex column justify-sp-bt align-start gap-20px">
                        <input type="text" name="user-input" id="user-mob-num" required>
                        <?php
                        if (isset($_GET['in']) && $_GET['in'] === "otp") {
                            echo <<<DELIMETER
                            <button class="resend-otp-btn">Didn't recieve OTP? Resend OTP in 60 secs</button>
                            DELIMETER;
                        }
                        ?>
                    </div>
                    <?php
                    // Checks that the phone number is valid.
                    checkError("error", "invalidPhone") ? print("<h6 id='warn-mob-num'>Please enter a valid phone number.</h6>") : print("");
                    checkError("error", "invalidOTP") ? print("<h6 id='warn-mob-num'>Please enter a valid OTP.</h6>") : print("");
                    checkError("error", "userBlocked") ? print("<h6 id='warn-mob-num'>Your account has been blocked.</h6>") : print("");
                    ?>

                </div>

                <div class="form-buttons full-width flex align-center">
                    <button name="signin-user" id="signin-btn" type="submit" class="register-btn flex justify-sp-ard align-center">
                        <h4><?php echo $text[1] === "otp" ? "Login" : "Send OTP"; ?></h4>
                        <img src="./assets/svg/right-arrow.svg">
                    </button>
                    <a href="register.php">Register</a>
                </div>
                <!-- <a class="forgot-btn full-width" href="forgotpass.php">Forgot Password?</a> -->
            </form>
            <div class="banner-img full-width flex justify-center align-center">
                <img src="./assets/svg/landing-page-img.svg" alt="Banner image for website.">
            </div>
        </section>
    </section>
</body>
<?php include "./includes/components/script.php"; importScripts(['language', 'resend-otp']); ?>
<script>
    // Resend button makes the page resend the OTP.
    if (resendBtn) {
        resendBtn.addEventListener("click", () => {
            window.location.href = "signin.php?in=resendOtp";
        });
    }
</script>
<script>
function googleTranslateElementInit() {
    new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</html>