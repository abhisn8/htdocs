<?php include "includes/components/html-header.php"; displayTitle("Admin Panel"); importStyleSheets(["popup-form", "input", "admin-panel"]); ?>
<?php include "../includes/components/popups.php"; ?>
<?php include "../includes/functions/user.php"; ?>
<?php include "../includes/functions/score.php"; ?>
<?php include "../includes/functions/security.php"; ?>
<?php include "includes/components/user-data.php"; ?>
<?php include "../includes/components/points-table.php"; ?>
<?php include "../includes/functions/points-activity.php"; ?>
<?php include "../includes/functions/cookies.php"; ?>
<?php include "includes/functions/security.php"; ?>
<?php include "../includes/components/transaction-table.php"; ?>
<?php include "../includes/components/settings-dropdowns.php"; ?>

<?php
if (!isAdminLoggedIn()) {
    redirect("index");
}

// Gets the user code of a user for displaying all the data.
if (isset($_GET['ui'])) {
    $userDataId = $_GET['ui'];
} else {
    $stmt = $connection->prepare(
        "SELECT user_code FROM users_data ORDER BY id DESC LIMIT 1"
    );
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    $userDataId = $result ? $result['user_code'] : "";
}

// Edits the scores.
if (isset($_POST['edit-score'])) {
    $scoreType = $_POST['score-type'];
    $newScore = $_POST['new-score'];

    if (isset($scoreType) && isset($newScore)) {
        $stmt = $connection->prepare("UPDATE users_score SET user_{$scoreType} = :s1 WHERE user_code = :s2");
        $stmt->bindParam(":s1", $newScore);
        $stmt->bindParam(":s2", $userDataId);
        $stmt->execute();
    }
}

// Blocks a user from using the app.
if (isset($_POST['block-user'])) {
    $uc = $_POST['user-code'];

    if (isUserBlocked($uc)) {
        $stmt = $connection->prepare(
            "UPDATE users SET user_blocked = false WHERE user_code = :s1"
        );
        $stmt->bindParam(":s1", $uc);
        $stmt->execute();
    } else {
        $stmt = $connection->prepare(
            "UPDATE users SET user_blocked = true WHERE user_code = :s1"
        );
        $stmt->bindParam(":s1", $uc);
        $stmt->execute();   
    }
}

// Deletes a user from the app.
if (isset($_POST['delete-user'])) {
    $uc = $_POST['user-code'];

    $stmt = $connection->prepare(
        "DELETE FROM `users` WHERE user_code = :s1;
        DELETE FROM `users_data` WHERE user_code = :s1;
        DELETE FROM `users_score` WHERE user_code = :s1;
        DELETE FROM `activity` WHERE user_code = :s1
        DELETE FROM `assessment_form_response` WHERE user_code = :s1
        DELETE FROM `notifications` WHERE user_code = :s1
        DELETE FROM `referrals` WHERE user_code = :s1"
    );
    $stmt->bindParam(":s1", $uc);
    $stmt->execute();

    unlink("../user-data/{$uc}.jpg");

    redirect("admin-panel");
}

function returnIfFilled($text) {
    return isset($text) ? $text : "";
}

if (isset($_POST['submit-user-info'])) {
    $userCode = $_POST['user-code']; // Creates a unique user code.
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
    $ref = returnIfFilled($_POST['user-referral']); // Gets the referral code.


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
        `user_referral_code` = :s21,
        `user_kgid`= :s22
        WHERE user_code = :s23" 
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
    $stmt->bindValue(":s21", $ref);
    $stmt->bindValue(":s22", $kgid);
    $stmt->bindValue(":s23", $userCode);
    $stmt->execute();
}
?>

<body>
    <?php include "includes/components/mobile-navbar.php"; ?>

    <main>
        <div class="tab-nav flex align-center">
            <img src="./../assets/svg/user-account.svg" alt="">
            <h4>Teachers</h4>
            <h4 class="fw-200"><?php echo getUsersCount(); ?> Teachers</h4>
        </div>

        <div class="searchbar-container">
            <form method="GET" class="searchbar flex justify-start align-center">
                <img src="./../assets/svg/search-icon.svg" alt="">
                <input type="text" name="q" placeholder="Search teacher by name or ID" required>
            </form>
        </div>

        <div class="users-list flex column">
            <?php
            if (isset($_GET['q'])) {
                $q = $_GET['q'];
                $p = "%" . $q . "%";

                $stmt = $connection->prepare(
                    "SELECT * FROM users INNER JOIN users_data 
                    ON users.user_code = users_data.user_code
                    WHERE users.user_code = :s1 OR users_data.user_full_name LIKE :s2
                    ORDER BY users.id DESC"
                );
                $stmt->bindParam(":s1", $q);
                $stmt->bindParam(":s2", $p);
                $stmt->execute();

                $result = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($result) {
                    $userCode = $result['user_code'];
                    $userName = getUserName($result['user_code']);
                    $userData = ucfirst($result['user_designation']) . ", " . $result['user_district'];

                    echo <<<DELIMETER
                    <a class="user flex">
                        <div class="user-name flex justify-start align-start gap-20px">
                            <img src="./../user-data/{$userCode}.jpg" alt="{$userName} profile picture." title="{$userName}">
                            <div class="flex column justify-center align-start gap-5px">
                                <h4>{$userName}</h4>
                                <h4 class="fw-200">{$userData}</h4>
                            </div>
                        </div>
                        <div class="user-id flex">
                            <h4 class="fw-200">ID: {$userCode}</h4>
                            <img src="./../assets/svg/right-arrow-gray.svg">
                        </div>
                    </a>
                    DELIMETER;
                } else {
                    echo <<<DELIMETER
                    <h2 class="text-center">No such user!</h2>
                    DELIMETER;
                }
            } else {
                $stmt = $connection->prepare(
                    "SELECT * FROM users INNER JOIN users_data ON users.user_code = users_data.user_code ORDER BY users.id DESC"
                );
                $stmt->execute();

                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach ($result as $row) {
                    $userCode = $row['user_code'];
                    $userNameGenerated = generatePointUserName($userCode);
                    $userName = getUserName($row['user_code']);
                    $userData = ucwords($row['user_designation']) . ", " . $row['user_district'];

                    echo <<<DELIMETER
                    <a href="admin-panel.php?ui={$userCode}" class="user flex">
                        <div class="user-name flex justify-start align-start gap-20px">
                            <img src="./../user-data/{$userCode}.jpg" alt="{$userName} profile picture." title="{$userName}">
                            <div class="flex column justify-center align-start gap-5px">
                                <h4>{$userName}</h4>
                                <h4 class="fw-200">{$userData}</h4>
                            </div>
                        </div>
                        <div class="user-id flex">
                            <h4 class="fw-200">ID: {$userNameGenerated}</h4>
                            <img src="./../assets/svg/right-arrow-gray.svg">
                        </div>
                    </a>
                    DELIMETER;
                }
            }
            ?>
        </div>

        <div class="user-data">
            <?php
            if (isset($_GET['ui']) && $_GET['ui'] !== "") {
                echo displayUserData($_GET['ui']);
            } else {
                $stmt = $connection->prepare(
                    "SELECT user_code FROM users_data ORDER BY id DESC LIMIT 1"
                );
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($result) {
                    echo displayUserData($result['user_code']);
                }
            }
            ?>
            
        </div>

        <?php include "includes/components/sidebar.php"; ?>

        <div class="bottom-popup-bg">
            <div class="bottom-popup">
                <div class="back-btns flex justify-start align-center">
                    <button type="button">
                        <img src="./../assets/svg/back-btn-unfilled.svg" alt="">
                    </button>
                    <h4 class="bottom-popup-title">Account</h4>
                    <button id="close-bottom-popup" type="button">
                        <img src="./../assets/svg/close-btn-unfilled.svg" alt="">
                    </button>
                </div>

                <?php
                if (isset($_GET['ui']) && $_GET['ui'] !== "") {
                    $uc = $_GET['ui'];

                    $stmt = $connection->prepare(
                        "SELECT * FROM users_data WHERE user_code = :s1"
                    );
                    $stmt->bindParam(":s1", $uc);
                    $stmt->execute();

                    $result = $stmt->fetch(PDO::FETCH_ASSOC);
                } else {
                    $stmt = $connection->prepare(
                        "SELECT * FROM users_data ORDER BY id DESC LIMIT 1"
                    );
                    $stmt->execute();
                    $result = $stmt->fetch(PDO::FETCH_ASSOC);
                }

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
                    <form method="POST" class="user-details full-width">
                        <input type="hidden" name="user-code" value="{$result['user_code']}">
                        <div class="input-field full-width flex column">
                            <h4 class="fw-200">First name</h4>
                            <input type="text" name="user-full-name" value="{$result['user_full_name']}" placeholder="Full name">
                        </div>
                        <div class="input-field full-width flex column">
                            <h4 class="fw-200">Email</h4>
                            <input type="text" name="user-email" value="{$result['user_email']}" placeholder="Full name">
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
                            <input type="text" name="user-education" value="{$result['user_education']}" placeholder="Job Profile">
                        </div>
                        <div class="input-field full-width flex column">
                            <h4 class="fw-200">PAN or Aadhar Number</h4>
                            <input type="text" name="user-identity" value="{$result['user_identity']}" placeholder="2345265823746">
                        </div>
                        <div class="input-field full-width flex column">
                            <h4 class="fw-200">Gender</h4>
                            {$genderDropDown}
                        </div>
                        <div class="input-field full-width flex column">
                            <h4 class="fw-200">User Address</h4>
                            <input type="text" name="user-res-address" value="{$result['user_res_address']}" placeholder="District">
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
                            <input type="text" name="institute-id" value="{$result['institute_id']}" placeholder="ID">
                        </div>
                        <div class="input-field full-width flex column">
                            <h4 class="fw-200">Institute Name</h4>
                            <input type="text" name="institute-name" value="{$result['institute_name']}" placeholder="Name">
                        </div>
                        <div class="input-field full-width flex column">
                            <h4 class="fw-200">Institute Address</h4>
                            <input type="text" name="institute-address" value="{$result['institute_address']}" placeholder="Address">
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
                            <input type="text" name="institute-taluk" value="{$result['institute_taluk']}" placeholder="Taluk">
                        </div>
                        <div class="input-field full-width flex column">
                            <h4 class="fw-200">Institute Pincode</h4>
                            <input type="text" name="institute-pincode" value="{$result['institute_pincode']}" placeholder="Pincode">
                        </div>
                        <div class="input-field full-width flex column">
                            <h4 class="fw-200">Referred by</h4>
                            <input type="text" value="{$referredByUserName}" name="user-referral" id="" placeholder="Firstname Lastname">
                        </div>
                        <div class="input-field full-width flex column">
                            <h4 class="fw-200">KGID number</h4>
                            <input type="text" name="user-kgid" value="{$result['user_kgid']}" placeholder="KGID number">
                        </div>
                        <div class="buttons full-width flex justify-end align-center gap-15px">
                            <h4 class="fw-200">Cancel</h4>
                            <button name="submit-user-info" type="submit" class="flex justify-center align-center gap-20px">
                                <h3>Save Changes</h3>
                                <img src="./../assets/svg/right-arrow.svg" alt="">
                            </button>
                        </div>
                    </form>
                DELIMETER;
                ?>

                <div class="points-table">
                    <div class="title">
                        <div class="navigators flex">
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
                        <?php echo displayAllPoints($userDataId, "all", true); ?>
                        
                        <!-- Displays the table of all ARP of a user. -->
                        <?php echo displayAllPoints($userDataId, "ARP", false); ?>

                        <!-- Displays the table of all RP of a user. -->
                        <?php echo displayAllPoints($userDataId, "RP", false); ?>

                        <tbody id="referrals-table" class="toggle-tables full-width">
                        <?php
                            $stmt = $connection->prepare("SELECT * FROM `referrals` WHERE sender_user_code = :s1");
                            $stmt->bindValue(":s1", $userDataId);
                            $stmt->execute();

                            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                            foreach ($result as $row) {
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
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
                <table class="full-width transactions-table">
                    <thead>
                        <tr>
                            <th>Transaction</th>
                            <th>Reference ID</th>
                            <th>Amount</th>
                            <th>Date</th>
                            <th>Status</th>
                            <!-- <th>Action</th> -->
                        </tr>
                    </thead>
                    <tbody>
                    <?php echo displayTransactionTable($userDataId); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <?php include "includes/components/mobile-sidebar.php"; ?>

    <section id="prompt-popup" class="popup-bg flex justify-center align-center">
        <form method="POST" class="popup flex column justify-center align-center">
            <?php
            echo <<<DELIMETER
            <input type="hidden" name="user-code" value="{$userDataId}">
            DELIMETER;
            ?>
            <h3><?php echo isUserBlocked($userDataId) ? "Unblock" : "Block"; ?> <?php echo getUserName($userDataId); ?></h3>
            <div class="popup-btns flex justify-center align-center">
                <button id="cancel-blocking-btn">
                    <h3 class="fw-200">Cancel</h3>
                </button>
                <button type="submit" name="block-user">
                    <h3><?php echo isUserBlocked($userDataId) ? "Unblock" : "Block"; ?></h3>
                </button>
            </div>
        </form>
    </section>

    <section id="delete-prompt-popup" class="popup-bg flex justify-center align-center">
        <form method="POST" class="popup flex column justify-center align-center">
            <?php
            echo <<<DELIMETER
            <input type="hidden" name="user-code" value="{$userDataId}">
            DELIMETER;
            ?>
            <h3>Delete <?php echo getUserName($userDataId); ?></h3>
            <div class="popup-btns flex justify-center align-center">
                <button id="cancel-deleting-btn">
                    <h3 class="fw-200">Cancel</h3>
                </button>
                <button type="submit" name="delete-user">
                    <h3>Delete</h3>
                </button>
            </div>
        </form>
    </section>

    <section id="form-popup" class="popup-bg flex justify-center align-center">
        <form method="POST" class="popup flex column justify-center align-center gap-20px">
            <h3 id="score-title">Edit score</h3>
            <div class="input-field full-width flex column align-start">
                <span class="input-field-title flex full-width justify-start gap-10px">
                    <h5 id="score-name">Score</h5>
                </span>
                <input type="text" name="new-score" id="new-score">
            </div>
            <div class="popup-btns flex justify-center align-center">
                <input type="hidden" id="score-type" name="score-type" value="">
                <?php
                echo <<<DELIMETER
                <input type="hidden" name="user-code" value="{$userDataId}">
                DELIMETER;
                ?>
                <button id="form-cancel-btn" type="button">
                    <h3 class="fw-200">Cancel</h3>
                </button>
                <button type="submit" name="edit-score" id="edit-submit-btn">
                    <h3>Edit</h3>
                </button>
            </div>
        </form>
    </section>

    <?php
    if (isset($_GET['ui']) && $_GET['ui'] !== "") {
        $ui = $_GET['ui'];
        echo displayUserForm($ui, false);
    } else {
        $stmt = $connection->prepare(
            "SELECT user_code FROM users_data ORDER BY id DESC LIMIT 1"
        );
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $uc = $result['user_code'];

        echo displayUserForm($uc, false);
    }
    ?>
</body>
<script>
    const userState = "<?php echo $USERSTATE; ?>";
    const instituteState = "<?php echo $INSTITUTESTATE; ?>";
    const userDistrict = "<?php echo $USERDISTRICT; ?>";
    const instituteDistrict = "<?php echo $INSTITUTEDISTRICT; ?>";
</script>
<script src="../scripts/states-districts.js"></script>
<?php include "../includes/components/script.php"; importScripts(["admin-panel"]); ?>
</html>