<?php include "includes/components/html-header.php"; displayTitle("Points & Rewards"); importStyleSheets(['dash-notifications', 'dash-success', 'popup-categories', 'popup-form', 'input', 'language-dialog', 'dashboard', 'dashboard-pts', 'dashboard-footer']); ?>
<?php include "includes/components/popups.php"; ?>
<?php include "includes/components/leaderboard.php"; ?>
<?php include "includes/functions/security.php"; ?>
<?php include "includes/functions/cookies.php"; ?>
<?php include "includes/functions/user.php"; ?>
<?php include "includes/functions/pop-up-form.php"; ?>
<?php include "includes/functions/score.php"; ?>
<?php include "includes/functions/referals.php"; ?>
<?php include "includes/functions/points-activity.php"; ?>
<?php include "includes/functions/transactions.php"; ?>
<?php include "includes/components/points-table.php"; ?>
<?php include "includes/components/payment-form.php"; ?>
<?php include "includes/functions/message.php"; ?>
<?php include "includes/functions/paymentGateway.php"; ?>

<?php
// Checks that the user is logged.
if (isLoggedIn() === false) {
    redirect("index");
} else {
    if (!isUserBlocked(getCookie("user_code"))) {
        $uc = getUserStatus(getCookie("user_code")); // Gets the user's status.
    
        switch ($uc) {
            case 'REG':
                redirect("onboarding1"); // Redirecting the user to the onboarding 1 page.
                break;
    
            case 'ON1':
                redirect("onboarding2"); // Redirecting the user to the onboarding 2 page.
                break;
    
            case 'PAD':
                redirect("onboarding3"); // Redirecting the user to the onboarding 3 page.
                break;
        }
    } else {
        logoutUser(getCookie("user_code"));

        redirect("index");
    }
}

// Taking the user to the payment gateway.
if (isset($_POST['donateMoney'])) {
    $name = $_POST['user-name'];
    $email = $_POST['user-email'];
    $phone = $_POST['user-tel'];
    $pan = $_POST['user-pan'];
    $amount = $_POST['user-amount'];
    $city = getUserCity(getCookie("user_code"));
    $state = getUserState(getCookie("user_code"));
    $process = "dashPtsDonation";

    $pan = empty($pan) || $pan == "" ? "ABCDE1234F" : $pan;

    if ($url = payAmount($amount, $name, $email, $phone, $city, $state, $process, $pan)) {
        $refNumber = $url['refNumber'];
        $payURL = $url['paymentURL'];

        header("Location: {$payURL}");
    }
}

// Logging the user's transactions.
if (isset($_GET['donationPaymentStatus'])) {
    $status = $_GET['donationPaymentStatus'];
    $userCode = getCookie("user_code");
    $amount = $_GET['amount'];

    if ($status === "success") {
        logTransaction($userCode, "Donation", $amount, "success");
    } else {
        logTransaction($userCode, "Donation", $amount, "failure");
    }

    redirect("dashboard-pts");
}

// Converts RP into ARP.
if (isset($_GET['paymentStatus']) && $_GET['paymentStatus'] === "success" && isset($_GET['points']) && isset($_GET['case'])) {
    $uc = getCookie("user_code");
    $points = floatval($_GET['points']);
    $rp = getUserRP($uc);
    $case = $_GET['case'];
    $currentARP = getUserARP($uc);
    $currentRP = getUserRP($uc);

    if ($case === "arp") {
        if ($points <= $rp && $points > 0) {
            decreaseScore($uc, $points, "RP"); // Decreases points from RP.
            increaseScore($uc, $points, "ARP"); // Increases points to ARP.

            setActivity($uc, "RP to ARP Conversion", "ARP", "Gurupuraskar", date("d/m/Y"), $points, $currentARP + $points, "CRE");
            setActivity($uc, "RP to ARP Conversion", "RP", "Gurupuraskar", date("d/m/Y"), $points, $currentRP - $points, "DEB");    

            logTransaction($uc, "ARP Recharge", $points * 0.1, "success"); // Logs the transaction.
        }
    } else {
        increaseScore($uc, $points, "ARP"); // Increases points to ARP.
        $currentARP = getUserARP(getCookie("user_code"));
        setActivity($uc, "Donation", "ARP", "Gurupuraskar", date("d/m/Y"), $points, $currentARP + $points, "CRE");
        logTransaction($uc, "Donation", $points / 1.5, "success"); // Logs the transaction.
    }

    redirectWithQuery("dashboard-pts", "sucessPoints=" . $points);
} elseif (isset($_GET['paymentStatus']) && $_GET['paymentStatus'] === "fail" && isset($_GET['points']) && isset($_GET['case'])) {
    $uc = getCookie("user_code");
    $points = intval($_GET['points']);
    $case = $_GET['case'];

    $code = $_GET['fm'];

    if ($case === "arp") {
        logTransaction($uc, "ARP Recharge", $points * 0.1, "failure"); // Logs the transaction.
    } else {
        logTransaction($uc, "Donation", $points / 1.5, "failure"); // Logs the transaction.
    }

    redirectWithQuery("dashboard-pts", "paymentStatus=fail&fm={$code}");
}

// Function for sending message.
if (isset($_POST['invite-btn'])) {
    $mob = $_POST['invite-mobile'];
    $ref = $_POST['invite-ref-code'];

    $mess = generateInvitation(getUserName(getCookie("user_code")), "gurupuraskar.com/?r={$ref}");

    sendMessage($mob, $mess, "1207170142588920291");
}

if (isset($_POST['points-needed'])) {
    $points = intval($_POST['points-needed']);
    $uc = getCookie("user_code");
    $name = getUserName($uc);
    $phone = getUserPhone($uc);
    $email = getUserEmail($uc);
    $state = getUserState($uc);
    $city = getUserCity($uc);
    $process = "arpCoversion";
    $amount = $points * 0.1;

    if ($url = payAmount($amount, $name, $email, $phone, $city, $state, $process)) {
        $refNumber = $url['refNumber'];
        $payURL = $url['paymentURL'];

        header("Location: {$payURL}");
    }
}

if (isset($_POST['donationAmount'])) {
    $uc = getCookie("user_code");
    $name = getUserName($uc);
    $phone = getUserPhone($uc);
    $email = getUserEmail($uc);
    $state = getUserState($uc);
    $city = getUserCity($uc);
    $process = "points";
    $amount = $_POST['donationAmount'];

    if (isset($amount) && $amount != "0") {
        if ($url = payAmount($amount, $name, $email, $phone, $city, $state, $process)) {
            $refNumber = $url['refNumber'];
            $payURL = $url['paymentURL'];

            header("Location: {$payURL}");
        }
    } else {
        redirect("dashboard-pts");
    }
}
?>

<body>
    <section class="body">
        <header class="pts-dash-header">
            <nav class="dash-nav full-width">
                <!-- Includes the component for dashboard's navbar and notifications. -->
                <?php include "includes/components/dashboard-navbar.php"; ?>
                <?php include "includes/components/notifications.php"; ?>
            </nav>

            <section class="pts-avail-section flex ">
                <div class="pts-avail-option full-width flex column">
                    <div class="pts-title full-width flex justify-start align-center gap-10px">
                        <img src="./assets/svg/point-green.svg" alt="">
                        <div class="flex column align-start justify-center">
                            <h4 class="fw-200">Activated Reward Points</h4>
                            <div class="flex justify-start align-center gap-5px">
                                <!-- Displays the user's ARP. -->
                                <h2 class="fw-200"><?php echo getUserARP(getCookie('user_code')); ?></h2>
                                <h5 class="fw-200">ARP</h5>
                            </div>
                        </div>
                    </div>
                    <button id="get-arp-btn" type="button" class="full-width flex justify-sp-ard align-center">
                        <h3>Get ARP</h3>
                        <img src="./assets/svg/right-arrow.svg" alt="">
                    </button>
                </div>

                <div class="pts-avail-option full-width flex column">
                    <div class="pts-title full-width flex justify-start align-center gap-10px">
                        <img src="./assets/svg/point-gold.svg" alt="">
                        <div class="flex column align-start justify-center">
                            <h4 class="fw-200">Reward Points</h4>
                            <div class="flex justify-start align-center gap-5px">
                                <!-- Displays the user's RP. -->
                                <h2 class="fw-200"><?php echo getUserRP(getCookie('user_code')); ?></h2>
                                <h5 class="fw-200">RP</h5>
                            </div>
                        </div>
                    </div>
                    <div class="score-display flex">
                        <!-- Displays the user's score. -->
                        <h3>Your Score: <?php echo getUserScore(getCookie('user_code')); ?></h3>
                    </div>
                </div>

                <div class="pts-avail-option full-width flex column">
                    <div class="pts-title full-width flex justify-sp-bt align-center gap-10px">
                        <h4 class="fw-200">
                            Redeem points on Game of Giving application
                        </h4>
                        <img class="stars" src="./assets/svg/stars.svg" alt="">
                    </div>
                    <button style="padding: 12px 0px;" disabled class="redeem-btn flex justify-center align-center">
                        <h3>Coming Soon</h3>
                    </button>
                </div>
            </section>
        </header>

        <main>
            <article class="user-activity full-width">
                <div class="invite-section flex">
                    <h4 class="fw-200 text-center">Invite teachers and you both earn 100 RP each</h4>
                    <div class="inputs flex">
                        <form method="POST" class="mobile-num-input flex justify-sp-bt align-center gap-5px">
                            <input type="hidden" name="invite-ref-code" value="<?php echo getReferralCode(getCookie("user_code")); ?>">
                            <input type="tel" name="invite-mobile" id="" placeholder="Enter mobile number" required>
                            <button name="invite-btn" type="submit" class="invite-btn">INVITE</button>
                        </form>
                        <div class="referral-code flex justify-sp-bt align-center">
                            <h4>Referral Code:</h4>
                            <!-- Displays the referal code of a user. -->
                            <h4 id="referral-code" class="fw-200"><?php echo getReferralCode(getCookie("user_code")); ?></h4>
                            <button class="copy-btn" title="Copy Referral Code" type="button">COPY</button>
                        </div>
                    </div>
                </div>

                <div class="points-table">
                    <div class="title">
                        <h4>Points Activity</h4>
                        <div class="navigators flex justify-sp-bt align-center">
                            <button class="nav-toggles selected">All</button>
                            <button class="nav-toggles">ARP</button>
                            <button class="nav-toggles">RP</button>
                            <button class="nav-toggles">Referrals</button>
                        </div>
                    </div>
                    <table class="full-width">
                        <thead>
                            <tr>
                                <th>Activity</th>
                                <th>From</th>
                                <th>Date</th>
                                <th>Points</th>
                                <th>Balance</th>
                            </tr>
                        </thead>
                        <!-- Displays the table of all points of a user. -->
                        <?php echo displayAllPoints(getCookie("user_code"), "all", true); ?>
                        
                        <!-- Displays the table of all ARP of a user. -->
                        <?php echo displayAllPoints(getCookie("user_code"), "ARP", false); ?>

                        <!-- Displays the table of all RP of a user. -->
                        <?php echo displayAllPoints(getCookie("user_code"), "RP", false); ?>

                        <tbody id="referrals-table" class="toggle-tables full-width">
                            <?php
                            $stmt = $connection->prepare("SELECT * FROM `referrals` WHERE sender_user_code = :s1 OR reciever_user_code = :s1");
                            $stmt->bindValue(":s1", getCookie("user_code"));
                            $stmt->execute();

                            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                            foreach ($result as $row) {
                                if ($row['sender_user_code'] === getCookie("user_code")) {
                                    $reciever = getUserName($row['reciever_user_code']);
                                    echo <<<DELIMETER
                                    <tr>
                                        <td>{$reciever} registered with your referral code.</td>
                                        <td class="flex align-center gap-10px">Gurupuraskar</td>
                                        <td>{$row['referred_date']}</td>
                                        <td>+ 100 RP</td>
                                        <td>{$row['sender_balance']} RP</td>
                                    </tr>
                                    DELIMETER;
                                } elseif ($row['reciever_user_code'] === getCookie("user_code")) {
                                    $sender = getUserName($row['sender_user_code']);
                                    echo <<<DELIMETER
                                    <tr>
                                        <td>You registered with the referral code of {$sender}.</td>
                                        <td class="flex align-center gap-10px">Gurupuraskar</td>
                                        <td>{$row['referred_date']}</td>
                                        <td>+ 100 RP</td>
                                        <td>{$row['reciever_balance']} RP</td>
                                    </tr>
                                    DELIMETER;
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </article>
        </main>
    </section>

    <!-- Sidebar for mobile phones -->
    <?php include "includes/components/dashboard-sidebar.php"; ?>

    <?php
    if (isset($_GET['sucessPoints'])) {
        $points = $_GET['sucessPoints'];

        echo displayPaymentSuccessPopup($points, true);
    }

    if (isset($_GET['paymentStatus']) && $_GET['paymentStatus'] === "fail" && isset($_GET['fm'])) {
        $code = $_GET['fm'];
        $mess = getErrorMessage($code);

        echo displayPaymentFailurePopup(true, $mess);
    }
    ?>

    <?php
    // Displays the pop-up form for converting RP to ARP.
    echo displayPointsConverter(getCookie("user_code"));

    echo displayDonationForm();
    ?>

    <?php
    if (isset($_GET['action']) && $_GET['action'] === "donateMoney") {
        echo displayDonateAmountForm(); 
    }
    ?>

<?php include "includes/components/dashboard-footer.php"; echo displayDashboardFooter("dashboard-pts"); ?>
</body>
<script>
    const maxPoints = <?php echo getUserRP(getCookie("user_code")); ?>;
</script>

<script LANGUAGE=JScript RUNAT=Server src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>
<?php include "includes/components/script.php"; importScripts(['dashboard-navbar', 'dashboard-pts', 'notifications']); ?>
<script>
function googleTranslateElementInit() {
    new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</html>