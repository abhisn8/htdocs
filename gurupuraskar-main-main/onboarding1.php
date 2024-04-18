<?php include "includes/components/html-header.php"; displayTitle("Onboarding"); importStyleSheets(['onboarding1', 'language-dialog', 'popup-form']); ?>
<?php include "includes/functions/security.php"; ?>
<?php include "includes/functions/cookies.php"; ?>
<?php include "includes/functions/user.php"; ?>
<?php include "includes/functions/referals.php"; ?>
<?php include "includes/functions/score.php"; ?>
<?php include "includes/functions/points-activity.php"; ?>

<?php
function returnIfFilled($text) {
    return isset($text) ? $text : "";
}

// Checks that the user is logged.
if (isLoggedIn()) {
    $uCode = getCookie("user_code");

    if (isset($_GET['back']) && $_GET['back'] === "true" && getUserStatus($uCode) !== "REG") {
        
        $stmt = $connection->prepare("SELECT * FROM `users_data` WHERE `user_code` = :s1");
        $stmt->bindValue(":s1", $uCode);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        $USERCODE = returnIfFilled($result['user_code']);
        $NAME = returnIfFilled($result['user_full_name']); // Gets the user's first name.
        $EMAIL = returnIfFilled($result['user_email']); // Gets the user's last name.
        $GENDER = returnIfFilled($result['user_gender']); // Gets the user's gender.
        $AGE = returnIfFilled($result['user_age']); // Gets the user's age.
        $RESADDRESS = returnIfFilled($result['user_res_address']); // Gets the user's residential address.
        $STATE = returnIfFilled($result['user_state']); // Gets the user's state.
        $DISTRICT = returnIfFilled($result['user_district']); // Gets the user's district.
        $TALUK = returnIfFilled($result['user_taluk']); // Gets the user's taluk.
        $PINCODE = returnIfFilled($result['user_pincode']); // Gets the user's pincode.
        $EDU = returnIfFilled($result['user_education']); // Gets the user's educational qualification.
        $INSTITUTEID = returnIfFilled($result['institute_id']); // Gets the user's institute id.
        $INSTITUTENAME = returnIfFilled($result['institute_name']); // Gets the user's institute name.
        $INSTITUTETYPE = returnIfFilled($result['institute_type']); // Gets the user's institute type.
        $JOB = returnIfFilled($result['user_designation']); // Gets the user's job profile.
        $INSTITUTEADD = returnIfFilled($result['institute_address']); // Gets the user's institute address.
        $INSTITUTESTATE = returnIfFilled($result['institute_state']); // Gets the user's institute state.
        $INSTITUTEDISTRICT = returnIfFilled($result['institute_district']); // Gets the user's institute district.
        $INSTITUTETALUK = returnIfFilled($result['institute_taluk']); // Gets the user's institute taluk.
        $INSTITUTEPINCODE = returnIfFilled($result['institute_pincode']); // Gets the user's institute pincode.
        $PAN = returnIfFilled($result['user_identity']); // Gets the user's aadhar number.
        $KGID = returnIfFilled($result['user_kgid']); // Gets the user's KGID number.
        $REF = returnIfFilled($result['user_referral_code']); // Gets the referral code.
    } else {
        $us = getUserStatus(getCookie("user_code")); // Gets the user's status.
    
        // Checks that the user has paid the admission fees or seen the form or submitted the form.
        if ($us === "PAD" || $us === "SAN" || $us === "SAF") {
            redirect("dashboard"); // Redirecting the user to the dashboard.
        } elseif ($us === "ON1") {
            // Checks that the user has filled the onboarding form 1.
            redirect("onboarding2"); // Redirecting the user to the payment page.
        }
    }
} else {
    redirect("index"); // Redirecting the user to the sign in page.
}
?>

<?php
// Works when the submit button is clicked.
if (isset($_POST['continue-btn']) && isset($_GET['back']) && $_GET['back'] === "true") {
    $userCode = getCookie("user_code"); // Creates a unique user code.
    $name = returnIfFilled($_POST['user-full-name']); // Gets the user's first name.
    $email = returnIfFilled($_POST['user-email']); // Gets the user's last name.
    $gender = returnIfFilled($_POST['user-gender']); // Gets the user's gender.
    $age = returnIfFilled($_POST['user-age']); // Gets the user's age.
    $resAddress = returnIfFilled($_POST['user-res-add']); // Gets the user's residential address.
    $state = returnIfFilled($_POST['user-state']); // Gets the user's state.
    $district = returnIfFilled($_POST['user-district']); // Gets the user's district.
    $taluk = returnIfFilled($_POST['user-taluk']); // Gets the user's taluk.
    $pincode = returnIfFilled($_POST['user-pincode']); // Gets the user's pincode.
    $edu = returnIfFilled($_POST['user-edu']); // Gets the user's educational qualification.
    $instituteId = returnIfFilled($_POST['institute-id']); // Gets the user's institute id.
    $instituteName = returnIfFilled($_POST['institute-name']); // Gets the user's institute name.
    $instituteType = returnIfFilled($_POST['institute-type']); // Gets the user's institute type.
    $job = returnIfFilled($_POST['user-job']); // Gets the user's job profile.
    $instituteAdd = returnIfFilled($_POST['institute-add']); // Gets the user's institute address.
    $instituteState = returnIfFilled($_POST['institute-state']); // Gets the user's institute state.
    $instituteDistrict = returnIfFilled($_POST['institute-district']); // Gets the user's institute district.
    $instituteTaluk = returnIfFilled($_POST['institute-taluk']); // Gets the user's institute taluk.
    $institutePincode = returnIfFilled($_POST['institute-pincode']); // Gets the user's institute pincode.
    $pan = returnIfFilled($_POST['user-identity']); // Gets the user's aadhar number.
    $kgid = returnIfFilled($_POST['user-kgid']); // Gets the user's KGID number.
    $ref = returnIfFilled($_POST['user-referral']); // Gets the referral code.

    $userId = generateUserId($name, getUserPhone($userCode));

    move_uploaded_file($_FILES['user-img']['tmp_name'], "user-data/" . $userCode . ".jpg");

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
        `user_kgid` = :s21,
        `user_id` = :s23 WHERE user_code = :s22"
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
    $stmt->bindValue(":s23", $userId);
    $stmt->execute();

    redirect("dashboard");
} elseif (isset($_POST['continue-btn'])) {
    $userCode = getCookie("user_code"); // Creates a unique user code.
    $name = returnIfFilled($_POST['user-full-name']); // Gets the user's first name.
    $email = returnIfFilled($_POST['user-email']); // Gets the user's last name.
    $gender = returnIfFilled($_POST['user-gender']); // Gets the user's gender.
    $age = returnIfFilled($_POST['user-age']); // Gets the user's age.
    $resAddress = returnIfFilled($_POST['user-res-add']); // Gets the user's residential address.
    $state = returnIfFilled($_POST['user-state']); // Gets the user's state.
    $district = returnIfFilled($_POST['user-district']); // Gets the user's district.
    $taluk = returnIfFilled($_POST['user-taluk']); // Gets the user's taluk.
    $pincode = returnIfFilled($_POST['user-pincode']); // Gets the user's pincode.
    $edu = returnIfFilled($_POST['user-edu']); // Gets the user's educational qualification.
    $instituteId = returnIfFilled($_POST['institute-id']); // Gets the user's institute id.
    $instituteName = returnIfFilled($_POST['institute-name']); // Gets the user's institute name.
    $instituteType = returnIfFilled($_POST['institute-type']); // Gets the user's institute type.
    $job = returnIfFilled($_POST['user-job']); // Gets the user's job profile.
    $instituteAdd = returnIfFilled($_POST['institute-add']); // Gets the user's institute address.
    $instituteState = returnIfFilled($_POST['institute-state']); // Gets the user's institute state.
    $instituteDistrict = returnIfFilled($_POST['institute-district']); // Gets the user's institute district.
    $instituteTaluk = returnIfFilled($_POST['institute-taluk']); // Gets the user's institute taluk.
    $institutePincode = returnIfFilled($_POST['institute-pincode']); // Gets the user's institute pincode.
    $pan = returnIfFilled($_POST['user-identity']); // Gets the user's aadhar number.
    $kgid = returnIfFilled($_POST['user-kgid']); // Gets the user's KGID number.
    $ref = returnIfFilled($_POST['user-referral']); // Gets the referral code.

    $userId = generateUserId($name, getUserPhone($userCode)); // User ID of the user

    move_uploaded_file($_FILES['user-img']['tmp_name'], "user-data/" . $userCode . ".jpg");

    $userRef = generateUserReferalCode($name, getUserPhone($userCode)); // Generates a referral code.

    // SQL query for adding a new user.
    $stmt = $connection->prepare(
        "INSERT INTO `users_data`(`user_code`, `user_full_name`, `user_email`,
        `user_gender`, `user_age`, `user_res_address`, `user_state`, `user_district`,
        `user_taluk`, `user_pincode`, `user_education`, `institute_id`, `institute_name`,
        `institute_type`, `user_designation`, `institute_address`, `institute_state`,
        `institute_district`, `institute_taluk`, `institute_pincode`, `user_identity`, `user_referral_code`, `user_kgid`, `user_id`)
        VALUES (:s1, :s2, :s3, :s4, :s5, :s6, :s7, :s8, :s9, :s10, :s11, :s12, :s13, :s14, :s15, :s16, :s17, :s18, :s19, :s20, :s21, :s22, :s23, :s24) "
    );
    $stmt->bindValue(":s1", $userCode);
    $stmt->bindValue(":s2", $name);
    $stmt->bindValue(":s3", $email);
    $stmt->bindValue(":s4", $gender);
    $stmt->bindValue(":s5", $age);
    $stmt->bindValue(":s6", $resAddress);
    $stmt->bindValue(":s7", $state);
    $stmt->bindValue(":s8", $district);
    $stmt->bindValue(":s9", $taluk);
    $stmt->bindValue(":s10", $pincode);
    $stmt->bindValue(":s11", $edu);
    $stmt->bindValue(":s12", $instituteId);
    $stmt->bindValue(":s13", $instituteName);
    $stmt->bindValue(":s14", $instituteType);
    $stmt->bindValue(":s15", $job);
    $stmt->bindValue(":s16", $instituteAdd);
    $stmt->bindValue(":s17", $instituteState);
    $stmt->bindValue(":s18", $instituteDistrict);
    $stmt->bindValue(":s19", $instituteTaluk);
    $stmt->bindValue(":s20", $institutePincode);
    $stmt->bindValue(":s21", $pan);
    $stmt->bindValue(":s22", $userRef);
    $stmt->bindValue(":s23", $kgid);
    $stmt->bindValue(":s24", $userId);
    $stmt->execute();

    if (getReferralUserCode($ref) !== false) {
        $sender = getReferralUserCode($ref); // Generates a referral code.
        // $receiver = $userCode; // Gets the user's code.
        // $senderBalance = getUserRP($sender) + 100; // Gets the sender's balance.
        // $receiverBalance = 100; // Reciever balance.

        createCookieForMonth("referred", "true");
        createCookieForMonth("referrer", $sender);
        // // Sets the activity for the sender.
        // setActivity($sender, "User registered with your referral code", "RP", $receiver, date("d/m/Y"), 100, $senderBalance, "CRE");
        // // Sets the activity for the reciever.
        // setActivity($receiver, "You registered with a referral code", "RP", $sender, date("d/m/Y"), 100, 100, "CRE");

        // Sets the user's status to ON1.
        setUserStatusTo($userCode, "ON1");

        // Redirecting the user to the next onboarding page.
        
        redirect("onboarding2");
    } else {
        // Sets the user's status to ON1.
        setUserStatusTo($userCode, "ON1");

        // Redirecting the user to the next onboarding page.
        redirect("onboarding2");
    }
}
?>

<body>
    <section class="body">
        <aside class="back-btn-desk">
        </aside>
        <section class="container">
            <!-- Navbar for onboarding pages. -->
            <?php include "includes/components/onboarding-navbar.php"; onboardingNavbar("Let's get you started", false); ?>

            <form action="" method="POST" enctype="multipart/form-data" class="input-form full-width flex column align-start">
                <h3 class="register-title">Let's get you started</h3>
                <div class="onboarding-page-navigator full-width flex align-center justify-start">
                    <span class="page-number flex justify-start align-center">
                        <img src="./assets/svg/number-1-selected.svg">
                        <h5>Details</h5>
                    </span>
                    <span class="separator flex align-center"><img src="./assets/svg/line-separator.svg"></span>
                    <span class="page-number flex justify-start align-center">
                        <img src="./assets/svg/number-2-deselected.svg">
                        <h5>Registration Fee</h5>
                    </span>
                    <span class="separator flex align-center"><img src="./assets/svg/line-separator.svg"></span>
                    <span class="page-number flex justify-start align-center">
                        <img src="./assets/svg/number-3-deselected.svg">
                        <h5>Self-assessment</h5>
                    </span>
                </div>
                <div class="input-field full-width flex column align-start gap-5px">
                    <span class="input-field-title flex full-width justify-start gap-10px">
                        <h5>Full Name</h5>
                        <h5>*</h5>
                    </span>
                    <input type="text" name="user-full-name" id="user-full-name" value="<?php echo isset($NAME) ? $NAME : ""; ?>" placeholder="Full Name" required>
                </div>
                <div class="input-field full-width flex column align-start gap-5px">
                    <span class="input-field-title flex full-width justify-start gap-10px">
                        <h5>Email ID</h5>
                        <h5>*</h5>
                    </span>
                    <input type="text" name="user-email" id="user-email" value="<?php echo isset($EMAIL) ? $EMAIL : ""; ?>" placeholder="Email" required>
                </div>
                <div class="input-field full-width flex column align-start gap-5px">
                    <span class="input-field-title flex full-width justify-start gap-10px">
                        <h5>Gender</h5>
                        <h5>*</h5>
                    </span>
                    <select class="select-option" name="user-gender" id="gender-select" required>
                        <option value="">Choose your gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
                <div class="input-field full-width flex column align-start gap-5px">
                    <span class="input-field-title flex full-width justify-start gap-10px">
                        <h5>Age</h5>
                        <h5>*</h5>
                    </span>
                    <input type="number" name="user-age" id="user-age" value="<?php echo isset($AGE) ? $AGE : ""; ?>" placeholder="Age" required>
                </div>

                <div id="user-res-add" class="input-field full-width flex column align-start gap-5px">
                    <span class="input-field-title flex full-width justify-start gap-10px">
                        <h5>Residential Address</h5>
                        <h5>*</h5>
                    </span>
                    <input type="text" name="user-res-add" id="user-res" value="<?php echo isset($RESADDRESS) ? $RESADDRESS : ""; ?>" placeholder="Residential Address" required>
                </div>

                <div class="input-field full-width flex column align-start gap-5px">
                    <span class="input-field-title flex full-width justify-start gap-10px">
                        <h5>State</h5>
                        <h5>*</h5>
                    </span>
                    <select id="user-state" class="select-option" title="Select your state" name="user-state" id="" required>
                        <option value="">Select your state</option>
                    </select>
                </div>
                <div class="input-field full-width flex column align-start gap-5px">
                    <span class="input-field-title flex full-width justify-start gap-10px">
                        <h5>District</h5>
                        <h5>*</h5>
                    </span>
                    <select id="user-district" class="select-option" title="Select your district" name="user-district" id="" required>
                        <option value="">Select your district</option>
                    </select>
                </div>
                <div class="input-field full-width flex column align-start gap-5px">
                    <span class="input-field-title flex full-width justify-start gap-10px">
                        <h5>Taluk</h5>
                        <h5>*</h5>
                    </span>
                    <input type="text" name="user-taluk" id="user-taluk" value="<?php echo isset($TALUK) ? $TALUK : ""; ?>" placeholder="Taluk" required>
                </div>

                <div class="input-field full-width flex column align-start gap-5px">
                    <span class="input-field-title flex full-width justify-start gap-10px">
                        <h5>Pincode</h5>
                        <h5>*</h5>
                    </span>
                    <input type="text" name="user-pincode" id="user-pincode" value="<?php echo isset($PINCODE) ? $TALUK : ""; ?>" placeholder="Pincode" required>
                </div>

                <div class="input-field full-width flex column align-start gap-5px">
                    <span class="input-field-title flex full-width justify-start gap-10px">
                        <h5>Educational Qualification/s</h5>
                        <h5>*</h5>
                    </span>
                    <input type="text" name="user-edu" id="user-edu" value="<?php echo isset($EDU) ? $EDU : ""; ?>" placeholder="Education Qualifications" required>
                </div>

                <div class="input-field full-width flex column align-start gap-5px">
                    <span class="input-field-title flex full-width justify-start gap-10px">
                        <h5>Institutional ID</h5>
                    </span>
                    <input type="text" name="institute-id" id="institute-id" value="<?php echo isset($INSTITUTEID) ? $INSTITUTEADD : ""; ?>" placeholder="Institute ID">
                </div>

                <div class="input-field full-width flex column align-start gap-5px">
                    <span class="input-field-title flex full-width justify-start gap-10px">
                        <h5>Name of Institution</h5>
                    </span>
                    <input type="text" name="institute-name" id="institute-name" value="<?php echo isset($INSTITUTENAME) ? $INSTITUTENAME : ""; ?>" placeholder="Institute Name">
                </div>

                <div class="input-field full-width flex column align-start gap-5px">
                    <span class="input-field-title flex full-width justify-start gap-10px">
                        <h5>Type of Institution</h5>
                        <h5>*</h5>
                    </span>
                    <select id="type-of-institute" class="select-option" title="Select your state" name="institute-type" id="" required>
                        <option value="">Select type of institution</option>
                        <option value="College - Aided/Unaided">College - Aided/Unaided</option>
                        <option value="Polytechnique – Govt/Pvt">Polytechnique – Govt/Pvt</option>
                        <option value="Engineering – Govt/Pvt">Engineering – Govt/Pvt</option>
                        <option value="Medical – Govt/Pvt">Medical – Govt/Pvt</option>
                        <option value="Law – Govt/Pvt">Law – Govt/Pvt</option>
                        <option value="Management – Govt/Pvt">Management – Govt/Pvt</option>
                        <option value="University – Govt/Pvt">University – Govt/Pvt</option>
                        <option value="Self-employed">Self-employed</option>
                        <option value="Others">Others</option>
                    </select>
                </div>

                <div class="input-field full-width flex column align-start gap-5px">
                    <span class="input-field-title flex full-width justify-start gap-10px">
                        <h5>Designation</h5>
                        <h5>*</h5>
                    </span>
                    <select class="select-option" name="user-job" id="job-select" required>
                        <option value="">Select your job profile</option>
                        <option value="primary teacher">primary teacher</option>
                        <option value="preschool teacher">preschool teacher</option>
                        <option value="kindergarten">kindergarten</option>
                        <option value="physical education">Physical Education</option>
                        <option value="music teacher">music teacher</option>
                        <option value="librarian">librarian</option>
                        <option value="middle school teacher">middle school teacher</option>
                        <option value="high school teacher">high school teacher</option>
                        <option value="art teacher">art teacher</option>
                        <option value="pre-university teacher">pre-university teacher</option>
                        <option value="school counsellor">school counsellor</option>
                        <option value="professor">professor</option>
                        <option value="special education">special education</option>
                        <option value="home-school teacher">home-school teacher</option>
                        <option value="tutor">tutor</option>
                        <option value="other">other</option>
                    </select>
                </div>

                <div class="input-field full-width flex column align-start gap-5px">
                    <span class="input-field-title flex full-width justify-start gap-10px">
                        <h5>Institute Address</h5>
                    </span>
                    <input type="text" name="institute-add" id="institute-add" value="<?php echo isset($INSTITUTEADD) ? $INSTITUTEADD : ""; ?>" placeholder="Institute Address">
                </div>

                <div class="input-field full-width flex column align-start gap-5px">
                    <span class="input-field-title flex full-width justify-start gap-10px">
                        <h5>State</h5>
                    </span>
                    <select id="institute-state" class="select-option" title="Select your state" name="institute-state" id="">
                        <option value="">Select your state</option>
                    </select>
                </div>
                <div class="input-field full-width flex column align-start gap-5px">
                    <span class="input-field-title flex full-width justify-start gap-10px">
                        <h5>District</h5>
                    </span>
                    <select id="institute-district" class="select-option" title="Select your district" name="institute-district" id="">
                        <option value="">Select your district</option>
                    </select>
                </div>
                <div class="input-field full-width flex column align-start gap-5px">
                    <span class="input-field-title flex full-width justify-start gap-10px">
                        <h5>Taluk</h5>
                    </span>
                    <input type="text" name="institute-taluk" id="institute-taluk" value="<?php echo isset($INSTITUTETALUK) ? $INSTITUTEADD : ""; ?>" placeholder="Institute Taluk">
                </div>

                <div class="input-field full-width flex column align-start gap-5px">
                    <span class="input-field-title flex full-width justify-start gap-10px">
                        <h5>Pincode</h5>
                    </span>
                    <input type="text" name="institute-pincode" id="institute-pincode" value="<?php echo isset($INSTITUTEPINCODE) ? $INSTITUTEPINCODE : ""; ?>" placeholder="Institute Pincode">
                </div>

                <div class="input-field full-width flex column align-start gap-5px">
                    <span class="input-field-title flex full-width justify-start gap-10px">
                        <h5>ID No. (KGID, or similar)</h5>
                    </span>
                    <input type="text" name="user-kgid" id="" value="<?php echo isset($KGID) ? $KGID : ""; ?>" placeholder="KGID">
                </div>

                <div class="input-field full-width flex column align-start gap-5px">
                    <span class="input-field-title flex full-width justify-start gap-10px">
                        <h5>Referral code</h5>
                    </span>
                    <?php
                    if (getCookie("referralCode")) {
                        $rc = getCookie("referralCode");
                        echo <<<DELIMETER
                        <input type="text" name="user-referral" value="{$rc}" placeholder="Referral Code" readonly>
                        DELIMETER;
                    } else {
                        echo <<<DELIMETER
                        <input type="text" name="user-referral" value="" placeholder="Referral Code">
                        DELIMETER;
                    }
                    ?>
                </div>

                <div class="input-field full-width flex column align-start gap-5px">
                    <span class="input-field-title flex full-width justify-start gap-10px">
                        <h5>PAN</h5>
                        <h5>*</h5>
                    </span>
                    <input type="text" name="user-identity" id="" required value="<?php echo isset($PAN) ? $PAN : ""; ?>" placeholder="PAN or AADHAR No.">
                    <!-- <div class="validate-btn full-width flex justify-end align-center">
                        <h5>Validate with</h5>
                        <img src="./assets/svg/validate.svg" alt="Validate with digilocker button.">
                    </div> -->
                </div>

                <div class="user-img full-width flex justify-start align-center">
                    <!-- <div class="circle"></div> -->
                    <div id="upload-unit" class="input-field full-width flex column align-start gap-5px">
                        <span class="input-field-title flex full-width justify-start gap-10px">
                            <h5>Upload selfie</h5>
                            <h5>*</h5>
                        </span>
                    </div>
                    <div id="upload-controllers">
                    </div>
                </div>

                <div class="form-buttons full-width flex justify-center align-center">
                    <button type="submit" name="continue-btn" id="onboarding-1-btn" class="register-btn flex justify-sp-ard align-center">
                        <h4>Continue</h4>
                        <img src="./assets/svg/right-arrow.svg">
                    </button>
                </div>
            </form>
            <div class="banner-img full-width flex justify-center align-center">
                <img src="./assets/svg/onboarding-page-img.svg" alt="Banner image for website.">
            </div>
        </section>
    </section>

    <section class="image-popup-bg">
        <div class="image-popup flex column justify-center align-center">
            <div class="full-width flex justify-end">
                <button id="close-img-popup" style="background-color: transparent; padding: 0;">
                    <img src="./assets/svg/cross.svg" alt="">
                </button>
            </div>
            <div class="flex justify-center align-center gap-20px">
                <button id="select-camera" class="flex column justify-center align-center gap-10px">
                    <img src="./assets/svg/camera-viewfinder.svg" alt="" srcset="">
                    <h5>Take Selfie</h5>
                </button>
                <button id="select-upload" class="flex column justify-center align-center gap-10px">
                    <img src="./assets/svg/upload.svg" alt="" srcset="">
                    <h5>Upload Selfie</h5>
                </button>
            </div>
        </div>
    </section>
</body>
<script>
    const isEdit = <?php echo isset($_GET['back']) && $_GET['back'] === "true" ? true : false; ?>;
    const gender = "<?php echo $GENDER ? $GENDER : "" ?>";
    const state = "<?php echo $STATE ? $STATE : ""?>";
    const district = "<?php echo $DISTRICT ? $DISTRICT : "" ?>";
    const type = "<?php echo $INSTITUTETYPE ? $INSTITUTETYPE : "" ?>";
    const job = "<?php echo $JOB ? $JOB : "" ?>";
    const insState = "<?php echo $INSTITUTESTATE ? $INSTITUTESTATE : "" ?>";
    const insDistrict = "<?php echo $INSTITUTEDISTRICT ? $INSTITUTEDISTRICT : "" ?>";
</script>
<?php include "includes/components/script.php"; importScripts(['submit', 'states-districts', 'onboarding1']); ?>
<script>
function googleTranslateElementInit() {
    new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</html>
