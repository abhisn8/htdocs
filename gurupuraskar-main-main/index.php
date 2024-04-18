<?php include "includes/components/html-header.php"; displayTitle("Guru Puraskar"); importStyleSheets(['language-dialog', 'popup-form', 'input', 'dash-success', 'landing-page']); ?>
<?php include "includes/functions/user.php"; ?>
<?php include "includes/functions/security.php"; ?>
<?php include "includes/functions/referals.php"; ?>
<?php include "includes/functions/cookies.php"; ?>
<?php include "includes/functions/paymentGateway.php"; ?>
<?php include "includes/components/popups.php"; ?>
<?php include "includes/functions/transactions.php"; ?>

<style>
    .input-field input {
        margin-top: 0px;
    }
    .donationForm {
        padding: 15px 0px;
    }
</style>

<?php
// Sending the user to dashboard if they are logged in.
if (isLoggedIn()) {
    redirect("dashboard");
}

if (isset($_GET['r'])) {
    $rc = $_GET['r'];

    if (getReferralUserCode($rc)) {
        // createSession("referralCode", $_GET['r']);
        createCookieForMonth("referralCode", $_GET['r']);
    }
}

if (isset($_POST['donateMoney'])) {
    $name = $_POST['user-name'];
    $email = $_POST['user-email'];
    $phone = $_POST['user-tel'];
    $pan = $_POST['user-pan'];
    $amount = $_POST['user-amount'];
    $city = "Pune";
    $state = "Maharashatra";
    $process = "donation";

    $pan = empty($pan) || $pan == "" ? "ABCDE1234F" : $pan;

    if ($url = payAmount($amount, $name, $email, $phone, $city, $state, $process, $pan)) {
        $refNumber = $url['refNumber'];
        $payURL = $url['paymentURL'];

        header("Location: {$payURL}");
    }
}
?>

<body>
    <header>
        <nav class="navbar flex full-width justify-sp-bt align-center">
            <img width="110px"  src="./assets/img/logo.png" alt="Gurupuraskar Logo">
            <div id="google_translate_element"></div>
        </nav>
    </header>
    <main>
        <div class="main-title flex column justify-center align-center">
            <h1>A platform designed to empower and celebrate teachers.</h1>
            <div class="buttons full-width flex row justify-center align-center">
                <a href="register.php" class="flex align-center">
                    <h4>Register</h4>
                    <img src="./assets/svg/right-arrow-black.svg" alt="">
                </a>
                <a href="signin.php" class="flex align-center">
                    <h4>Sign in</h4>
                    <img src="./assets/svg/right-arrow-black.svg" alt="">
                </a>
                <a href="index.php?action=donatePopup" class="flex align-center">
                    <h4>Donate</h4>
                    <img src="./assets/svg/right-arrow-black.svg" alt="">
                </a>
            </div>
        </div>
        <img class="banner-img" src="./assets/svg/landing-page-img.svg" alt="The banner for the landing page.">

    </main>
    <div class="foot-links full-width flex align-center">
        <a href="about-us.php" class="flex justify-sp-bt align-center gap-20px">
            ABOUT US
            <img src="./assets/svg/arrow-right-black.svg" alt="Right Arrow">
        </a>
        <a href="contact-us.php" class="flex justify-sp-bt align-center gap-20px">
            CONTACT US
            <img src="./assets/svg/arrow-right-black.svg" alt="Right Arrow">
        </a>
    </div>
    <?php include "includes/components/index-footer.php"; ?>

    <?php
    if (isset($_GET['action']) && $_GET['action'] === "donatePopup") {
        echo displayDonateAmountForm(); 
    }

    if (isset($_GET['paymentStatus'])) {
        if ($_GET['paymentStatus'] === "success" && isset($_GET['amount']) && isset($_GET['ref']) && isset($_GET['date']) && isset($_GET['manFields']) && isset($_GET['pan'])) {
            $amount = $_GET['amount'];
            $refNum = $_GET['ref'];
            $date = $_GET['date'];
            $pan = $_GET['pan'];
            $manFields = explode("|", strval($_GET['manFields']));

            $name = $manFields[3];
            $email = $manFields[6];
            $phn = $manFields[7];

            logTransaction($name, "Donation", $amount, "success");

            redirectWithQuery("index", "display=true&amount={$amount}&ref={$refNum}&date={$date}&manFields={$_GET['manFields']}&pan={$pan}");
        } else {
            $name = $_GET['name'];
            $amnt = $_GET['amount'];

            logTransaction($name, "Donation", $amnt, "failure");

            echo displayPaymentFailForIndex(getErrorMessage($_GET['fm']));
        }
    }

    if (isset($_GET['display']) && isset($_GET['amount']) && isset($_GET['ref']) && isset($_GET['date']) && isset($_GET['manFields'])) {
        $amount = $_GET['amount'];
        $refNum = $_GET['ref'];
        $date = $_GET['date'];
        $pan = $_GET['pan'];
        $manFields = explode("|", strval($_GET['manFields']));

        $pan = empty($pan) || $pan == "" || $pan == "ABCDE1234F" ? "Not Specified" : $pan;

        $name = $manFields[3];
        $email = $manFields[6];
        $phn = $manFields[7];

        echo displayPaymentSuccessForIndex($name, $email, $phn, $pan, $amount, $date, $refNum);
    }
    ?>

</body>
<script>
function googleTranslateElementInit() {
    new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

<?php include "includes/components/script.php"; importScripts(['index']); ?>
</html>