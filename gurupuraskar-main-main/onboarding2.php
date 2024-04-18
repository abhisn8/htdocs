<?php include "includes/components/html-header.php"; displayTitle("Onboarding"); importStyleSheets(['onboarding2', 'language-dialog']); ?>
<?php include "includes/functions/security.php"; ?>
<?php include "includes/functions/cookies.php"; ?>
<?php include "includes/functions/user.php"; ?>
<?php include "includes/functions/score.php"; ?>
<?php include "includes/functions/points-activity.php"; ?>
<?php include "includes/functions/transactions.php"; ?>
<?php include "includes/functions/notifications.php"; ?>
<?php include "includes/functions/referals.php"; ?>
<?php include "includes/components/payment-form.php"; ?>
<?php include "includes/functions/paymentGateway.php"; ?>
<?php include "includes/functions/small-data.php"; ?>
<?php include "admin/includes/functions/events.php"; ?>

<?php
$regFee = getEventDetail("price");

if (isset($_GET['paymentStatus']) && $_GET['paymentStatus'] === "success") {
    $userCode = getCookie("user_code"); // Gets the user's code.

    // Updating the user's class to PAD.
    setUserStatusTo($userCode, "PAD");
    // Sets the score 100 RP and 1000 ARP.
    if (getCookie("referred") === "true") {
        $sender = getCookie("referrer");
        $senderBalance = intval(getUserRP($sender)) + 100;

        setScore($userCode, 100, 1000);
        increaseScore($sender, 100, "RP");

        // Adds notification to the user who sent the referral code.
        addNotification($sender, "A user registered with your referral code. You both have recieved 100 RP.");

        // Sets activity for the user who sent the referral code.
        setActivity($sender, "User registered with your referral code.", "RP", $userCode, date("d/m/Y"), 100, $senderBalance, "CRE");

        // Sets the activity for the reciever.
        setActivity($userCode, "You registered with a referral code", "RP", $sender, date("d/m/Y"), 100, 100, "CRE");

        // Sets the referral status for the user who sent the referral code.
        addReferral("", $sender, $senderBalance, $userCode, 100, date("d/m/Y"));

        deleteCookie("referred");
        deleteCookie("referrer");
        deleteCookie("referCode");
    } else {
        setScore($userCode, "0", "1000");
    }

    // Sets the activity for the user.
    // Sets the activity for ARP.
    setActivity($userCode, "Registration", "ARP", "Gurupuraskar", date("d/m/Y"), 1000, 1000, "CRE");
    logTransaction($userCode, "Registration Fee", $regFee, "success");
    
    redirect("onboarding3"); // Redirecting the user to the dashboard.
} elseif (isset($_GET['paymentStatus']) && $_GET['paymentStatus'] === "fail") {
    $userCode = getCookie("user_code"); // Gets the user's code.
    logTransaction($userCode, "Registration Fee", $regFee, "failure");

    redirectWithQuery("onboarding2", "fm={$_GET['fm']}");
}

// Checks that the user is logged.
if (isLoggedIn()) {
    $us = getUserStatus(getCookie("user_code")); // Gets the user's status.

    if ($us === "SAN" || $us === "SAF") {
        redirect("dashboard"); // Redirecting the user to the dashboard.
    } elseif ($us === "REG") {
        redirect("onboarding1"); // Redirecting the user to the onboarding page.
    } elseif ($us === "PAD") {
        redirect("onboarding3"); // Redirecting the user to self-assessment page.
    }
} else {
    redirect("index");
}


if (isset($_POST['payAmount'])) {
    $uc = getCookie("user_code");
    $name = getUserName($uc);
    $phone = getUserPhone($uc);
    $email = getUserEmail($uc);
    $state = getUserState($uc);
    $city = getUserCity($uc);
    $process = "onboarding";

    $regFee = getEventDetail("price");

    if ($url = payAmount($regFee, $name, $email, $phone, $city, $state, $process)) {
        $refNumber = $url['refNumber'];
        $payURL = $url['paymentURL'];

        if (isset($_COOKIE['referrer']) && isset($_COOKIE['referred'])) {
            saveSmallData(getCookie("user_code"), $refNumber, "onboarding", $_COOKIE['referrer']);   
        } else {
            saveSmallData(getCookie("user_code"), $refNumber, "onboarding");
        }

        header("Location: {$payURL}");
    }
}
?>

<body>
    <section class="body">
        <aside class="back-btn-desk">
        <a href="onboarding1.php?back=true" class="back-btn-desk">
            <img src="./assets/svg/back-btn.svg" id="back-btn" alt="Back button.">
        </a>
        </aside>
        <section class="container">
            <!-- Navbar for onboarding pages. -->
            <?php include "includes/components/onboarding-navbar.php"; onboardingNavbar("Almost there"); ?>    

            <article class="input-form full-width flex column align-start">
                <h3 class="register-title">Almost there</h3>
                <div class="onboarding-page-navigator full-width flex align-center justify-start">
                    <span class="page-number flex justify-start align-center">
                        <img src="./assets/svg/page-checked.svg">
                        <h5>Details</h5>
                    </span>
                    <span class="separator flex align-center"><img src="./assets/svg/line-separator.svg"></span>
                    <span class="page-number flex justify-start align-center">
                        <img src="./assets/svg/number-2-selected.svg">
                        <h5>Registration Fee</h5>
                    </span>
                    <span class="separator flex align-center"><img src="./assets/svg/line-separator.svg"></span>
                    <span class="page-number flex justify-start align-center">
                        <img src="./assets/svg/number-3-deselected.svg">
                        <h5>Self-assessment</h5>
                    </span>
                </div>
                
                <h5 class="onboarding-instruction">Please make a payment to confirm your enrollment for the Gurupuraskar event.</h5>

                <h1 class="onboarding-price-tag">₹<?php echo getEventDetail("price"); ?></h1>

                <div class="full-width flex column justify-center align-start gap-10px">
                    <div class="onboarding-feature flex align-center justify-start">
                        <img src="./assets/svg/green-check.svg">
                        <h5>Grants entry into the annual Gurupuraskar event.</h5>
                    </div>
    
                    <div class="onboarding-feature flex align-center justify-start">
                        <img src="./assets/svg/green-check.svg">
                        <h5>Get 1,000 Activated Reward Points.</h5>
                    </div>
                    <?php
                    if (isset($_GET['fm'])) {
                        $code = $_GET['fm'];
                        $mess = getErrorMessage($code);

                        // <h4 style="color: red;">Payment failed. Please try again.</h4>

                        echo <<<DELIMETER
                        <h4 style="color: red;">{$mess}</h4>
                        DELIMETER;
                    }
                    ?>

                    <form id="pay-form" method="POST" action="" class="form-buttons full-width">
                        <button name="payAmount" type="submit" id="onboarding-2-btn" class="register-btn flex justify-sp-ard align-center">
                            <h4>Continue</h4>
                            <img src="./assets/svg/right-arrow.svg">
                        </button>
                    </form>

                </div>
            </article>
            <div class="banner-img full-width flex justify-center align-center">
                <img src="./assets/svg/onboarding-page-img.svg" alt="Banner image for website.">
            </div>
        </section>
    </section>
</body>
<script LANGUAGE=JScript RUNAT=Server src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>
<script>
function googleTranslateElementInit() {
    new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</html>