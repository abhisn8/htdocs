<?php include "includes/components/html-header.php"; displayTitle("Register"); importStyleSheets(['resend', 'register', 'language-dialog']); ?>
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
    if ($us === "PAD" || $us === "SAN" || $us === "SAF") {
        redirect("dashboard"); // Redirecting the user to the dashboard.
    } elseif ($us === "REG") {
        // Checks that the user has registered.
        redirect("onboarding1"); // Redirecting the user to the onboarding page.
    } elseif ($us === "ON1") {
        // Checks that the user has filled the onboarding form 1.
        redirect("onboarding2"); // Redirecting the user to the payment page.
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
        redirectWithQuery("register", "in=otp");
    }
} else {
    $text = $textArray['mobNum'];
}

// Works when the submit button is clicked.
if (isset($_POST['register-user'])) {
    $param = $_POST['inputField'];
    $input = $_POST['user-input'];

    switch ($param) {
        case 'otp':
            if (intval($input) === getSession("tempOTP")) {
                $userCode = randomString(); // Generates a random user code.
                $phNum = getSession("tempPhNum");

                if (!userExists($phNum)) {
                    // Query for adding a new user.
                    $stmt = $connection->prepare("INSERT INTO `users`(`user_code`, `user_mob_num`, `user_class`) 
                    VALUES (:s1, :s2, :s3)");
                    $stmt->bindValue(":s1", $userCode);
                    $stmt->bindValue(":s2", $phNum);
                    $stmt->bindValue(":s3", "REG");
                    $stmt->execute();
                    
                    loginUser($userCode); // Logging the user in.
            
                    deleteSession("tempOtp");
                    deleteSession("tempPhNum");

                    redirect("onboarding1"); // Redirecting the user to dashboard after registering.
                }
            } else {
                redirectWithQuery("register", "error=invalidOTP&in=otp");
            }
            break;

        case 'mobNum':
            if (isValidPhoneNumber($input) && !userExists($input) && isset($_POST['terms'])) {
                $otp = generateOTP(); // Generates a random OTP.
                createSession("tempOTP", $otp); // Creates a session for the OTP.
                createSession("tempPhNum", $input); // Creates a session for the OTP.

                // Sends the OTP to the user's phone number.
                if (sendMessage($input, generateMessage($otp))) {
                    redirectWithQuery("register", "in=otp");
                } else {
                    redirectWithQuery("register", "error=invalidPhone");
                }
            } elseif (!isValidPhoneNumber($input)) {
                redirectWithQuery("register", "error=invalidPhone");
            } elseif (userExists($input)) {
                redirectWithQuery("register", "error=userExists");
            } elseif (!isset($_POST['terms'])) {
                redirectWithQuery("register", "error=termsNotChecked");
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
                    <img width="110px"  src="./assets/img/logo.png" alt="Gurupuraskar Logo">
                    <div id="google_translate_element"></div>
                </nav>
                <div class="back-btn-mobile full-width flex row align-center">
                    <img src="./assets/svg/back-btn.svg" alt="Back button.">
                    <h5>Register your account</h5>
                </div>
            </header>
            <form action="" method="POST" autocomplete="on" class="input-form full-width flex column align-start">
                <input type="hidden" name="inputField" value="<?php echo $text[1]; ?>">
                <h3 class="register-title">Register your account</h3>
                <div class="input-field full-width flex column align-start gap-5px">
                    <span class="input-field-title flex full-width justify-start gap-10px">
                        <h5><?php echo $text[0]; ?></h5>
                    </span>
                    <div class="full-width flex column justify-sp-bt align-start gap-20px">
                        <input type="tel" name="user-input" id="mobile-num" required>
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

                    // Checks that the user doesn't exists.
                    checkError("error", "userExists") ? print("<h6 id='warn-mob-num'>This phone number already exists.</h6>") : print("");

                    // Checks that the OTP is correct.
                    checkError("error", "invalidOTP") ? print("<h6 id='warn-mob-num'>Please enter a valid OTP.</h6>") : print("");
                    ?>
                </div>
                <?php
                if (!isset($_GET['in'])) {
                    echo <<<DELIMETER
                    <label for="terms-check" class="check-input full-width flex justify-start align-start">
                        <input type="checkbox" name="terms" id="terms-check">
                        <h5>I agree with the <b>Terms & Conditions</b> and the <b>Privacy Policy</b> of Gurupuraskar *</h5>
                    </label>
                    DELIMETER;
                }

                // Checks that the terms are checked.
                checkError("error", "termsNotChecked") ? print("<h6 id='warn-'>Please accept terms and conditions.</h6>") : print("");
                ?>
                <div class="form-buttons full-width flex align-center">
                    <button name="register-user" type="submit" title="Register" id="register-btn" class="register-btn flex justify-sp-ard align-center">
                        <h4><?php echo $text[1] === "otp" ? "Register" : "Send OTP"; ?></h4>
                        <img src="./assets/svg/right-arrow.svg">
                    </button>
                    <a href="signin.php">Sign in</a>
                </div>
            </form>
            <div class="banner-img full-width flex justify-center align-center">
                <img src="./assets/svg/landing-page-img.svg" alt="Banner image for website.">
            </div>
        </section>
    </section>
</body>
<?php include "includes/components/script.php"; importScripts(['language', "register", 'resend-otp']); ?>
<script>
    // Resend button makes the page resend the OTP.
    resendBtn.addEventListener("click", () => {
        window.location.href = "register.php?in=resendOtp";
    });
</script>
<script>
function googleTranslateElementInit() {
    new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</html>