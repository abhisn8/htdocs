<?php include "includes/components/html-header.php"; displayTitle("Settings"); importStyleSheets(['dash-notifications', 'dash-success', 'popup-categories', 'popup-form', 'input', 'language-dialog', 'dashboard', 'dashboard-pts', 'dash-settings', 'dashboard-footer']); ?>
<?php include "includes/functions/security.php"; ?>
<?php include "includes/functions/cookies.php"; ?>
<?php include "includes/functions/user.php"; ?>
<?php include "includes/functions/pop-up-form.php"; ?>
<?php include "includes/functions/score.php"; ?>
<?php include "includes/functions/referals.php"; ?>
<?php include "includes/components/transaction-table.php"; ?>
<?php include "includes/components/settings-dropdowns.php"; ?>
<?php include "includes/components/popups.php"; ?>
<?php include "includes/functions/transactions.php"; ?>
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

function returnIfFilled($text) {
    return isset($text) ? $text : "";
}

if (isset($_POST['save-user-info'])) {
    $userCode = getCookie("user_code"); // Creates a unique user code.
    $name = returnIfFilled($_POST['user-full-name']); // Gets the user's first name.
    $email = returnIfFilled($_POST['user-email']); // Gets the user's last name.
    $gender = returnIfFilled($_POST['user-gender']); // Gets the user's gender.
    $age = returnIfFilled($_POST['user-age']); // Gets the user's age.
    $resAddress = returnIfFilled($_POST['user-res-address']); // Gets the user's residential address.
    $state = returnIfFilled($_POST['user-state']); // Gets the user's state.
    $district = returnIfFilled($_POST['user-district']); // Gets the user's district.
    $taluk = returnIfFilled($_POST['user-taluk']); // Gets the user's taluk.
    $pincode = returnIfFilled($_POST['user-pincode']); // Gets the user's pincode.
    $edu = returnIfFilled($_POST['user-education']); // Gets the user's educational qualification.
    $instituteId = returnIfFilled($_POST['institute-id']); // Gets the user's institute id.
    $instituteName = returnIfFilled($_POST['institute-name']); // Gets the user's institute name.
    $instituteType = returnIfFilled($_POST['institute-type']); // Gets the user's institute type.
    $job = returnIfFilled($_POST['user-job']); // Gets the user's job profile.
    $instituteAdd = returnIfFilled($_POST['institute-address']); // Gets the user's institute address.
    $instituteState = returnIfFilled($_POST['institute-state']); // Gets the user's institute state.
    $instituteDistrict = returnIfFilled($_POST['institute-district']); // Gets the user's institute district.
    $instituteTaluk = returnIfFilled($_POST['institute-taluk']); // Gets the user's institute taluk.
    $institutePincode = returnIfFilled($_POST['institute-pincode']); // Gets the user's institute pincode.
    $pan = returnIfFilled($_POST['user-identity']); // Gets the user's aadhar number.
    $kgid = returnIfFilled($_POST['user-kgid']); // Gets the user's KGID number.

    $stmt = $connection->prepare(
        "UPDATE `users_data` SET `user_full_name` = :s1,
        `user_email` = :s2,
        `user_gender` = :s3,
        `user_age` = :s4,
        `user_res_address` = :s5,
        `user_state` = :s6,
        `user_district` = :s7,
        `user_taluk` = :s8,
        `user_pincode` = :s9,
        `user_education` = :s10,
        `institute_id` = :s11,
        `institute_name` = :s12,
        `institute_type` = :s13,
        `user_designation` = :s14,
        `institute_address` = :s15,
        `institute_state` = :s16,
        `institute_district` = :s17,
        `institute_taluk` = :s18,
        `institute_pincode` = :s19,
        `user_identity` = :s20,
        `user_kgid`= :s21
        WHERE user_code = :s22" 
    );
    $stmt->bindValue(":s1", $name);
    $stmt->bindValue(":s2", $email);
    $stmt->bindValue(":s3", $gender);
    $stmt->bindValue(":s4", $age);
    $stmt->bindValue(":s5", $resAddress);
    $stmt->bindValue(":s6", $state);
    $stmt->bindValue(":s7", $district);
    $stmt->bindValue(":s8", $taluk);
    $stmt->bindValue(":s9", $pincode);
    $stmt->bindValue(":s10", $edu);
    $stmt->bindValue(":s11", $instituteId);
    $stmt->bindValue(":s12", $instituteName);
    $stmt->bindValue(":s13", $instituteType);
    $stmt->bindValue(":s14", $job);
    $stmt->bindValue(":s15", $instituteAdd);
    $stmt->bindValue(":s16", $instituteState);
    $stmt->bindValue(":s17", $instituteDistrict);
    $stmt->bindValue(":s18", $instituteTaluk);
    $stmt->bindValue(":s19", $institutePincode);
    $stmt->bindValue(":s20", $pan);
    $stmt->bindValue(":s21", $kgid);
    $stmt->bindValue(":s22", $userCode);
    $stmt->execute();
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
    $process = "dashSettingsDonation";

    $pan = empty($pan) || $pan == "" ? "ABCDE1234F" : $pan;

    if ($url = payAmount($amount, $name, $email, $phone, $city, $state, $process, $pan)) {
        $refNumber = $url['refNumber'];
        $payURL = $url['paymentURL'];

        header("Location: {$payURL}");
    }
}

// Logging the user's transactions.
if (isset($_GET['paymentStatus'])) {
    $status = $_GET['paymentStatus'];
    $userCode = getCookie("user_code");
    $amount = $_GET['amount'];

    if ($status === "success") {
        logTransaction($userCode, "Donation", $amount, "success");
    } else {
        logTransaction($userCode, "Donation", $amount, "failure");
    }

    redirect("dashboard-settings");
}
?>
<body>
    <section class="body">
        <header class="pts-dash-header">
            <nav class="dash-nav full-width">
                <?php include "includes/components/dashboard-navbar.php"; ?>
                <?php include "includes/components/notifications.php"; ?>
            </nav>
            
            <div class="user-data flex align-center">
                <div class="user-img">
                    <?php
                    if (isLoggedIn()) {
                        $img = getUserSelfie();
                        echo <<<DELIMETER
                        <img src="{$img}" alt="">
                        DELIMETER;
                    }
                    ?>
                </div>
                <div class="user-info flex justify-center align-center gap-10px position-relative">
                    <h3 class="fw-200">Selfie</h3>
                    <img id="selfieToolTipQue" src="./assets/svg/info-gray.svg" alt="">
                    <div id="selfieToolTip" class="toolTip">Your selfie will be used to confirm your identity.</div>
                </div>
            </div>
        </header>

        <main>
            <article class="account-settings">
                <div class="title flex">
                    <button class="settings-toggle selected" type="button"><h3 class="fw-200">Account</h3></button>
                    <button class="settings-toggle " type="button"><h3 class="fw-200">Transactions</h3></button>
                </div>
                <form action="" method="POST" id="user-info-form">
                <?php
                    $uc = getCookie("user_code"); // Gets the user code from cookies.
                    $stmt = $connection->prepare(
                        "SELECT * FROM users_data INNER JOIN users
                        ON users_data.user_code = users.user_code WHERE users.user_code = :s1"
                    );
                    $stmt->bindParam(":s1", $uc);
                    $stmt->execute();

                    $result = $stmt->fetch(PDO::FETCH_ASSOC);
                    
                    $USERSTATE = $result['user_state'];
                    $INSTITUTESTATE = $result['institute_state'];
                    $USERDISTRICT = $result['user_district'];
                    $INSTITUTEDISTRICT = $result['institute_district'];

                    $genderDropDown = genderDropDown($result['user_gender']);
                    $jobProfileDropDown = jobProfileDropDown($result['user_designation']);
                    $instituteTypeDropDown = instituteTypeDropDown($result['institute_type']);

                    $userStateDropDown = stateDropDown($result['user_state'], "user-state");
                    $instituteStateDropDown = stateDropDown($result['institute_state'], "institute-state");

                    $referredByUserName = getReferredByUserName(getCookie("user_code"));
                    $referredByUserName = !$referredByUserName ? "None" : $referredByUserName;
                    
                    echo <<<DELIMETER
                        <div class="user-contact-info full-width flex">
                            <div class="input-field">
                                <h4 class="fw-200">Mobile number</h4>
                                <input type="text" name="user-mob-num" value={$result['user_mob_num']} disabled placeholder="9567534545">
                            </div>
                        </div>
                        <div class="user-details full-width flex">
                            <div class="input-field full-width flex column">
                                <h4 class="fw-200">First name</h4>
                                <input type="text" name="user-full-name" value="{$result['user_full_name']}" placeholder="Full name">
                            </div>
                            <div class="input-field full-width flex column">
                                <h4 class="fw-200">Email</h4>
                                <input type="text" name="user-email" value="{$result['user_email']}" placeholder="Email">
                            </div>
                            <div class="input-field full-width flex column">
                                <h4 class="fw-200">Age</h4>
                                <input type="text" name="user-age" value="{$result['user_age']}" placeholder="Age">
                            </div>
                            <div class="input-field full-width flex column">
                                <h4 class="fw-200">Job Profile</h4>
                                {$jobProfileDropDown}
                            </div>
                            <div class="input-field full-width flex column">
                                <h4 class="fw-200">Education Qualification</h4>
                                <input type="text" name="user-education" value="{$result['user_education']}" placeholder="Education Qualification">
                            </div>
                            <div class="input-field full-width flex column">
                                <h4 class="fw-200">PAN or Aadhar Number</h4>
                                <input type="text" name="user-identity" value="{$result['user_identity']}" placeholder="PAN or AADHAR No.">
                            </div>
                            <div class="input-field full-width flex column">
                                <h4 class="fw-200">Gender</h4>
                                {$genderDropDown}
                            </div>
                            <div class="input-field full-width flex column">
                                <h4 class="fw-200">User Address</h4>
                                <input type="text" name="user-res-address" value="{$result['user_res_address']}" placeholder="Address">
                            </div>
                            <div class="input-field full-width flex column">
                                <h4 class="fw-200">User District</h4>
                                <select id="user-district" class="select-option settings-dropdown" title="Select your district" name="user-district">
                                    <option value="">Select your district</option>
                                </select>
                            </div>
                            <div class="input-field full-width flex column">
                                <h4 class="fw-200">User State</h4>
                                {$userStateDropDown}
                            </div>
                            <div class="input-field full-width flex column">
                                <h4 class="fw-200">User Taluk</h4>
                                <input type="text" name="user-taluk" value="{$result['user_taluk']}" placeholder="Taluk">
                            </div>
                            <div class="input-field full-width flex column">
                                <h4 class="fw-200">User Pincode</h4>
                                <input type="text" name="user-pincode" value="{$result['user_pincode']}" placeholder="Pincode">
                            </div>
                            <div class="input-field full-width flex column">
                                <h4 class="fw-200">Institute Type</h4>
                                {$instituteTypeDropDown}
                            </div>
                            <div class="input-field full-width flex column">
                                <h4 class="fw-200">Institute ID</h4>
                                <input type="text" name="institute-id" value="{$result['institute_id']}" placeholder="Institute ID">
                            </div>
                            <div class="input-field full-width flex column">
                                <h4 class="fw-200">Institute Name</h4>
                                <input type="text" name="institute-name" value="{$result['institute_name']}" placeholder="Institute Name">
                            </div>
                            <div class="input-field full-width flex column">
                                <h4 class="fw-200">Institute Address</h4>
                                <input type="text" name="institute-address" value="{$result['institute_address']}" placeholder="Institute Address">
                            </div>
                            <div class="input-field full-width flex column">
                                <h4 class="fw-200">Institute State</h4>
                                {$instituteStateDropDown}
                            </div>
                            <div class="input-field full-width flex column">
                                <h4 class="fw-200">Institute District</h4>
                                <select id="institute-district" class="select-option settings-dropdown" title="Select your district" name="institute-district">
                                    <option value="">Select your district</option>
                                </select>
                            </div>
                            <div class="input-field full-width flex column">
                                <h4 class="fw-200">Institute Taluk</h4>
                                <input type="text" name="institute-taluk" value="{$result['institute_taluk']}" placeholder="Institute Taluk">
                            </div>
                            <div class="input-field full-width flex column">
                                <h4 class="fw-200">Institute Pincode</h4>
                                <input type="text" name="institute-pincode" value="{$result['institute_pincode']}" placeholder="Institute Pincode">
                            </div>
                            <div class="input-field full-width flex column">
                                <h4 class="fw-200">Referred by</h4>
                                <input type="text" value="{$referredByUserName}" name="" id="" placeholder="Referred By" readonly disabled>
                            </div>
                            <div class="input-field full-width flex column">
                                <h4 class="fw-200">KGID number</h4>
                                <input type="text" name="user-kgid" value="{$result['user_kgid']}" placeholder="KGID number">
                            </div>
                            <div class="buttons flex justify-center align-center gap-15px">
                                <h4 class="fw-200">Cancel</h4>
                                <button form="user-info-form" name="save-user-info" type="submit" class="flex justify-center align-center gap-20px">
                                    <h3 class="fw-200">Save Changes</h3>
                                    <img src="./assets/svg/right-arrow.svg" alt="">
                                </button>
                            </div>
                        </div>
                    DELIMETER;
                ?>
                </form>

                <table class="full-width transactions-table">
                    <thead>
                        <tr>
                            <th>Transaction</th>
                            <th>Amount</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php echo displayTransactionTable(getCookie("user_code")); ?>
                    </tbody>
                </table>
            </article>
        </main>
        <?php
        if (isset($_GET['print'])) {
            $ref = $_GET['print'];

            echo displayPrintPopup($ref);
        }
        ?>
    </section>

    <?php
    if (isset($_GET['action']) && $_GET['action'] === "donateMoney") {
        echo displayDonateAmountForm(); 
    }
    ?>

    <!-- Sidebar for mobile phones -->
    <?php include "includes/components/dashboard-sidebar.php"; ?>

    <?php include "includes/components/dashboard-footer.php"; echo displayDashboardFooter("dashboard-settings"); ?>
</body>
<script>
    const userState = "<?php echo $USERSTATE; ?>";
    const instituteState = "<?php echo $INSTITUTESTATE; ?>";
    const userDistrict = "<?php echo $USERDISTRICT; ?>";
    const instituteDistrict = "<?php echo $INSTITUTEDISTRICT; ?>";
</script>
<?php include "includes/components/script.php"; importScripts(['states-districts', "dashboard-navbar", "dashboard-settings", 'notifications']); ?>
<script>
function googleTranslateElementInit() {
    new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</html>