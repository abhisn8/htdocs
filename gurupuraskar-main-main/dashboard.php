<?php include "includes/components/html-header.php"; displayTitle("Dashboard"); importStyleSheets(['dash-notifications', 'dash-success', 'popup-categories', 'popup-form', 'input', 'language-dialog', 'dashboard', 'dashboard-footer']); ?>
<?php include "includes/components/points-table.php"; ?>
<?php include "includes/functions/security.php"; ?>
<?php include "includes/functions/cookies.php"; ?>
<?php include "includes/functions/user.php"; ?>
<?php include "includes/functions/pop-up-form.php"; ?>
<?php include "includes/components/popups.php"; ?>
<?php include "includes/functions/score.php"; ?>
<?php include "includes/components/leaderboard.php"; ?>
<?php include "includes/functions/points-activity.php"; ?>
<?php include "includes/functions/notifications.php"; ?>
<?php include "includes/functions/paymentGateway.php"; ?>
<?php include "includes/functions/transactions.php"; ?>

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
    $process = "dashDonation";

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

    redirect("dashboard");
}

// Submits the form containing the roles selected by the user.
if (isset($_POST['cat'])) {
    $response = $_POST['cat'];
   
    // Gets the job profiles seloected by user.
    if (count($response) >= 1) {
        // Getting all the responses from the user.
        // $j1 = $response[0];
        // $j2 = $response[1];
        // $j3 = $response[2];
        $user = getRandomUser($response); // Gets a random user from the database.
        // $user = findUser($j1, $j2, $j3); // Gets a random user from the database.

        // if (!userHasFilledAllQuestions($user)) {
        //     $user = getRandomUser($j1, $j2, $j3); // Gets a random user from the database.
        // }

        // Redirecting the user to the form for reviewing.
        redirectWithQuery("dashboard", "q=form&user={$user}");

    } else {
        // Redirecting the user to the same form.
        redirectWithQuery("dashboard", "q=form-categories");
    }
}

// Submits form for awarding points to a user.
if (isset($_POST['award-point'])) {
    $pts = $_POST['points']; // Gets the points to be awarded.
    $uc = $_POST['user-code']; // Gets the points to be awarded.

    if ($pts > 0 && $pts <= 100) {
        
        // Updates the users' points and activity.
        setActivity($uc, "Rewarded from Review", "RP", getCookie("user_code"), date("d/m/Y"), $pts, getUserRP($uc) + $pts, "CRE");
        
        increaseScore($uc, $pts, "rp"); // Increase the RP of the receiving user.
        increaseScore($uc, $pts, "score"); // Increase the score of the receiving user.
        
        // Descreases the score of the user who awarded the points.
        decreaseScore(getCookie("user_code"), $pts, "arp");
        // Sets the activity of the user who awarded the points.
        setActivity(getCookie("user_code"), "Rewarded to a Review", "ARP", $uc, date("d/m/Y"), $pts, getUserARP(getCookie("user_code")), "DEB");
    
        // Adds a notification to the user who was awarded the points.
        addNotification($uc, "You have recieved {$pts} RP from a review.");

        redirectWithQuery("dashboard", "q=form-success&user={$uc}&pts={$pts}");
    }
}

// Displays the self assessment for to the user.
if (isset($_POST['edit-form'])) {
    redirectWithQuery("dashboard", "q=form-self");
}

// Displays the categories for to the user to review.
if (isset($_POST['continue-btn']) && isAppLocked() === false) {
    redirectWithQuery("dashboard", "q=form-categories");
}

if (isset($_POST['submit-success'])) {
    redirectWithQuery("dashboard", "q=form-categories");
}

// Submits the self assessment form or the edit of the self assessment form.
if (isset($_POST['save-user-form'])) {
    $user_code = getCookie("user_code"); // Gets the user's code.
    // Getting all the questions' codes from the database.
    $stmt = $connection->prepare("SELECT question_code FROM assessment_form_questions");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($result as $key => $value) {
        $response = $_POST[$value['question_code']]; // Gets the user's response.

        // Inserting the user's response to the database.
        if (isset($response) && !empty($response)) {
            $answer = $response;
            // Updating the user's response to the database.
            $stmt = $connection->prepare(
                "UPDATE assessment_form_responses SET user_response = :s1
                WHERE user_code = :s2 AND question_code = :s3
            ");
            $stmt->bindValue(":s1", $answer); // Inserting the user's response.
            $stmt->bindValue(":s2", $user_code); // Inserting the user's code.
            $stmt->bindValue(":s3", $value['question_code']); // Inserting the question's code.
            $stmt->execute();
        } else {
            continue;
        }
    }

    if (userHasFilledAllQuestions($user_code)) {
        setUserStatusTo($user_code, "SAF");
    }

    redirect("dashboard"); // Redirecting the user to the dashboard.
}
?>

<body>
    <section class="body">
        <header>
            <nav class="dash-nav full-width">
                <!-- Includes the component for dashboard's navbar and notifications. -->
                <?php include "includes/components/dashboard-navbar.php"; ?>
                <?php include "includes/components/notifications.php"; ?>
            </nav>
            <div class="dash-info flex column align-start justify-center gap-15px">
                <h2>Hi <?php echo getUserName(getCookie('user_code')); // Username ?>,</h2>
                <div class="user-address flex column gap-5px">
                    <h4 class="fw-200"><?php echo ucwords(getUserJob(getCookie('user_code'))); // User's job profile. ?></h4>
                    <h4 class="fw-200"><?php echo getUserAddress(getCookie('user_code')); // User's district. ?></h4>
                </div>
                <div class="dash-score flex justify-start align-center gap-15px">
                    <button class="score-btn" type="button">
                        <h3>Your Score: <?php echo getUserScore(getCookie('user_code')); ?></h3>
                    </button>
                    <button id="showEventDetailsBtn" class="score-btn" type="button">
                        <h3>Event Details</h3>
                    </button>
                    <div id="dashToolTipQue" class="toolTipHover info-btn">
                        <img src="./assets/svg/info.svg" alt="Button, on click shows the info regarding the score.">
                        <div id="scoreToolTip" class="toolTip">Reward Points you receive will be added to your score</div>
                    </div>
                </div>
            </div>
        </header>

        <main>
            <article class="dashboard-reviews flex">
                <h3 class="reviews-title fw-200">Reviews</h3>
                <div class="reviews-container flex">
                    <div class="review flex column justify-sp-bt gap-20px">
                        <div class="review-title">
                            <h3 class="fw-200">I am ready <b>for</b> review.</h3>
                        </div>
                        <form action="" method="POST" class="review-panel full-width flex column justify-center align-start">
                            <div class="review-info flex align-center gap-10px">
                                <?php
                                if (userHasFilledAllQuestions(getCookie("user_code"))) {
                                    echo <<<DELIMETER
                                    <img src="./assets/svg/green-check.svg" alt="">
                                    <h3 class="fw-200">Completed</h3>
                                    DELIMETER;
                                } else {
                                    $num = getNumberOfUnansweredQuestions(getCookie("user_code"));

                                    echo <<<DELIMETER
                                    <h3 class="fw-200">{$num} Unanswered</h3>
                                    DELIMETER;
                                }
                                ?>
                            </div>
                            <button name="edit-form" id="ready-for-review" type="submit" class="full-width flex justify-sp-ard align-center">
                                <h3>
                                    <?php
                                    // Displays fill the form if the user has not filled the self assessment form or
                                    // displays edit form if the user has filled the self assessment form.
                                    if (getUserStatus(getCookie('user_code')) === "SAN") {
                                        echo "Fill Form";
                                    } else {
                                        echo "Edit Form";
                                    }
                                    ?>
                                </h3>
                                <img src="./assets/svg/right-arrow.svg" alt="">
                            </button>
                        </form>
                    </div>
                    <div class="review flex column justify-sp-bt gap-20px">
                        <div class="review-title">
                            <h3 class="fw-200">I am ready <b>to</b> review.</h3>
                        </div>
                        <form action="" method="POST" class="review-panel full-width flex column justify-center align-start">
                            <div class="review-info position-relative full-width flex align-center justify-sp-bt">
                                <h3 class="fw-200">
                                    <?php echo getUserARP(getCookie('user_code')); ?> ARP
                                </h3>
                                <img id="arpToolTipQue" src="./assets/svg/info-gray.svg" alt="">
                                <div id="requiredArpToolTip" class="toolTip">You need a minimum of 100 ARP to review</div>
                            </div>
                            <?php
                            $style = "text-align: center; color: red;";
                            if (isAppLocked()) {
                                $delim = <<<DELIMETER
                                <h3 style="{$style}">Application Locked. Can't Review.</h3>
                                DELIMETER;
                            } elseif (getUserARP(getCookie("user_code")) < 100) {
                                $delim = <<<DELIMETER
                                <h3 style="{$style}">You don’t have enough ARP, convert or donate to get ARP</h3>
                                DELIMETER;
                            } elseif (!userHasFilledAllQuestions(getCookie("user_code"))) {
                                $delim = <<<DELIMETER
                                <h3 style="{$style}">Please complete your questionnaire</h3>
                                DELIMETER;
                            } else {
                                $delim = <<<DELIMETER
                                <button name="continue-btn" id="ready-to-review" type="submit" class="full-width flex justify-sp-ard align-center">
                                    <h3>Continue</h3>
                                    <img src="./assets/svg/right-arrow.svg" alt="">
                                </button>
                                DELIMETER;
                            }
                            
                            echo $delim;
                            ?>
                        </form>
                    </div>
                </div>
            </article>
            <article class="dashboard-leaderboard flex column justify-center">
                <div class="leaderboard-title flex">
                    <h3 class="fw-200">LEADERBOARD</h3>
                    <div class="shifter flex align-center gap-15px">
                        <button id="show-all-btn" type="button" title="Show all the users">
                            <h3 class="selected">All</h3>
                        </button>
                        <button id="show-district-btn" type="button" title="Show all the users of your district">
                            <h3><?php echo getUserAddress(getCookie("user_code")); ?></h3>
                        </button>
                    </div>
                </div>
                <div id="pan-india-leaderboard" class="leaderboard-scores flex column align-center">
                    <?php
                    // Displays all the people and scores on the leaderboard.
                    $stmt = $connection->prepare(
                        "SELECT users.user_code AS u_code, users_data.user_full_name AS name, 
                        users_score.user_score AS score,
                        users_data.user_district AS district FROM users
                        INNER JOIN users_data ON users.user_code = users_data.user_code
                        INNER JOIN users_score ON users.user_code = users_score.user_code
                        ORDER BY users_score.user_score DESC"
                    );
                    $stmt->execute();
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    $rank = 1; // Stores the rank of the user.
                    foreach ($result as $row) {
                        switch ($rank) {
                            case 1:
                                echo firstUserInLeaderboard($rank, $row['name'], $row['district'], $row['score']);
                                break;

                            case 2:
                                echo secondUserInLeaderboard($rank, $row['name'], $row['district'], $row['score']);
                                break;

                            case 3:
                                echo thirdUserInLeaderboard($rank, $row['name'], $row['district'], $row['score']);
                                break;
                            
                            default:
                                echo userInLeaderboard($rank, $row['name'], $row['district'], $row['score']);
                                break;
                        }

                        $rank++;
                    }
                    ?>
                </div>
                <div id="district-leaderboard" class="leaderboard-scores flex column align-center">
                    <?php
                    $uc = getUserAddress(getCookie("user_code")); // Gets the user's code.
                    // Displays all the people and scores on the leaderboard.
                    $stmt = $connection->prepare(
                        "SELECT users.user_code AS u_code, users_data.user_full_name AS name,
                        users_score.user_score AS score,
                        users_data.user_district AS district FROM users
                        INNER JOIN users_data ON users.user_code = users_data.user_code
                        INNER JOIN users_score ON users.user_code = users_score.user_code
                        WHERE users_data.user_district = :s1 ORDER BY users_score.user_score DESC"
                    );
                    $stmt->bindParam(":s1", $uc);
                    $stmt->execute();
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    $rank = 1; // Stores the rank of the user.
                    foreach ($result as $key => $value) {
                        switch ($rank) {
                            case 1:
                                echo firstUserInLeaderboard($rank, $value['name'], $value['district'], $value['score']);
                                break;

                            case 2:
                                echo secondUserInLeaderboard($rank, $value['name'], $value['district'], $value['score']);
                                break;

                            case 3:
                                echo thirdUserInLeaderboard($rank, $value['name'], $value['district'], $value['score']);
                                break;
                            
                            default:
                                echo userInLeaderboard($rank, $value['name'], $value['district'], $value['score']);
                                break;
                        }

                        $rank++;
                    }
                    ?>
                </div>
            </article>
        </main>
    </section>
    
    <!-- Sidebar for mobile phones -->
    <?php include "includes/components/dashboard-sidebar.php"; ?>

    <?php
    if (isset($_GET['q']) && $_GET['q'] === "form" && isset($_GET['user']) && !empty($_GET['user'])) {
        echo userResponsePopUp($_GET['user'], true);
    }

    if (isset($_GET['q']) && $_GET['q'] === "form-success" && isset($_GET['pts'])) {
        echo displaySuccessPopUp($_GET['user'], $_GET['pts'], true);
    }
    
    if (isset($_GET['q']) && $_GET['q'] === "form-self") {
        echo displaySelfAssessForm(getCookie('user_code'));
    }

    // Displays the popup of the roles selected by the user.
    if (isset($_GET['q']) && $_GET['q'] === "form-categories") {
        if (getUserARP(getCookie("user_code")) >= 100) {
            echo displayCategoriesPopUp();
        }
    }

    echo displayEventDetails();
    ?>

    <?php
    if (isset($_GET['action']) && $_GET['action'] === "donateMoney") {
        echo displayDonateAmountForm(); 
    }
    ?>

    <?php include "includes/components/dashboard-footer.php"; echo displayDashboardFooter("dashboard"); ?>
</body>
<?php include "includes/components/script.php"; importScripts(["dashboard-navbar", 'dashboard', 'notifications']); ?>

<script>
function googleTranslateElementInit() {
    new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</html>