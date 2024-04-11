<!-- All the includes for the file. -->
<?php include "includes/components/html-header.php"; displayTitle("Onboarding"); importStyleSheets(['input', 'onboarding3', 'popup-form', 'language-dialog']); ?>
<?php include "includes/functions/security.php"; ?>
<?php include "includes/functions/cookies.php"; ?>
<?php include "includes/functions/user.php"; ?>
<?php include "includes/functions/pop-up-form.php"; ?>

<?php
// Checks that the user is logged.
if (isLoggedIn()) {
    $us = getUserStatus(getCookie("user_code")); // Gets the user's status.

    // Checks that the user has paid the admission fees or seen the form or submitted the form.
    if ($us === "SAN" || $us === "SAF") {
        redirectWithScript("dashboard.php"); // Redirecting the user to the dashboard.
    } elseif ($us === "REG") {
        // Checks that the user has registered.
        redirectWithScript("onboarding1.php"); // Redirecting the user to the onboarding page.
    } elseif ($us === "ON1") {
        // Checks that the user has filled the onboarding form 1.
        redirectWithScript("onboarding2.php"); // Redirecting the user to the payment page.
    }
} else {
    redirectWithScript("index.php");
}
?>

<?php

if (isset($_POST['continue-btn'])) {
    $user_code = getCookie("user_code"); // Gets the user's code.

    // Updating the user's class to SAF.
    setUserStatusTo($user_code, "SAF");

    // Getting all the questions' codes from the database.
    $stmt = $connection->prepare("SELECT question_code FROM assessment_form_questions");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Inserting the user's responses to the database.
    foreach ($result as $key => $value) {
        $response = trim($_POST[$value['question_code']]); // Gets the user's response.

        $stmt = $connection->prepare("INSERT INTO assessment_form_responses (question_code, user_code, user_response) VALUES (:s1, :s2, :s3)");
        $stmt->bindParam(":s1", $value['question_code']); // Inserting the question's code.
        $stmt->bindParam(":s2", $user_code); // Inserting the user's code.

        // Inserting the user's response to the database.
        if (isset($response) && !empty($response)) {
            $answer = $response;
        } else {
            $answer = "";
        }

        $stmt->bindParam(":s3", $answer); // Inserting the user's response.    
        $stmt->execute();
    }

    redirect("dashboard"); // Redirecting the user to the dashboard.
}

// Works when the skip button is clicked.
if (isset($_POST['skip-form'])) {
    $user_code = getCookie("user_code"); // Gets the user's code.
    
    // Sets that the user has skipped the self assessment form.
    setUserStatusTo(getCookie("user_code"), "SAN");

    // Getting all the questions' codes from the database.
    $stmt = $connection->prepare("SELECT question_code FROM assessment_form_questions");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Inserting the user's responses to the database.
    foreach ($result as $key => $value) {
        $response = ""; // Makes the user's response an empty string.

        $stmt = $connection->prepare("INSERT INTO assessment_form_responses (question_code, user_code, user_response) VALUES (:s1, :s2, :s3)");
        $stmt->bindParam(":s1", $value['question_code']); // Inserting the question's code.
        $stmt->bindParam(":s2", $user_code); // Inserting the user's code.
        $stmt->bindParam(":s3", $response); // Inserting the user's response.    
        $stmt->execute();
    }

    redirectWithScript("dashboard.php");
}
?>

<body>
    <section class="body">
        <aside class="back-btn-desk">
            <a href="onboarding1.php?back=true">
                <img src="./assets/svg/back-btn.svg" id="back-btn" alt="Back button.">
            </a>
        </aside>
        <section class="container">
            <!-- Navbar for onboarding pages. -->
            <?php include "includes/components/onboarding-navbar.php"; onboardingNavbar("The Final Step"); ?>

            <article class="input-form full-width flex column align-start">
                <h3 class="register-title">Almost there</h3>
                <div class="onboarding-page-navigator full-width flex align-center justify-start">
                    <span class="page-number flex justify-start align-center">
                        <img src="./assets/svg/page-checked.svg">
                        <h5>Details</h5>
                    </span>
                    <span class="separator flex align-center"><img src="./assets/svg/line-separator.svg"></span>
                    <span class="page-number flex justify-start align-center">
                        <img src="./assets/svg/page-checked.svg">
                        <h5>Registration Fee</h5>
                    </span>
                    <span class="separator flex align-center"><img src="./assets/svg/line-separator.svg"></span>
                    <span class="page-number flex justify-start align-center">
                        <img src="./assets/svg/number-3-selected.svg">
                        <h5>Self-assessment</h5>
                    </span>
                </div>
                
                <h3 class="assessment-title">What is self-assessment?</h3>

                <h4 class="assessment-text">Applicants must complete a self-assessment questionnaire to provide insights into their personality, teaching methodologies, and contributions to education.</h4>

                <form method="POST" action="" class="full-width flex column justify-center align-start gap-10px">
                    <div class="onboarding-feature flex align-center justify-sp-bt">
                        <h4>Fill self-assessment form</h4>
                        <img src="./assets/svg/right-arrow-black.svg">
                    </div>

                    <button name="skip-form" class="onboarding-feature flex align-center justify-sp-bt" style="border: none; font-size: 16px">
                        <h4>I will do this later</h4>
                        <img src="./assets/svg/right-arrow-black.svg">
                    </button>
                </form>
            </article>
            <div class="banner-img full-width flex justify-center align-center">
                <img src="./assets/svg/onboarding-page-img.svg" alt="Banner image for website.">
            </div>
        </section>
    </section>

    <section class="popup-form-bg flex justify-center align-center">
        <form action="" method="POST" class="popup-form flex column justify-sp-bt">
            <div class="popup-top-bar full-width">
                <div class="top-bar-title full-width flex justify-sp-bt align-center">
                    <h4>Self-assessment form</h4>
                    <h3 id="popup-form-close-btn" class="fw-200">X</h3>
                </div>
                <div class="form">
                    <ol class="from-inputs-list flex column align-start justify-start">
                        <?php
                        // Fetching all the self assessment form questions from the databases.
                        $stmt = $connection->prepare("SELECT * FROM assessment_form_questions");
                        $stmt->execute();

                        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        // Prints all the input fields for the self assessment form.
                        foreach ($result as $key => $value) {
                            $qType = $value['question_type']; // Gets the question type.
                            $qCode = $value['question_code']; // Gets the question code.
                            $qTitle = $value['question_title']; // Gets the question title.

                            if ($qType === "mcq") {
                                echo formMCQ($qCode, $qTitle);
                            } elseif ($qType === "dropdown") {
                                echo formDropDown($qCode, $qTitle);
                            } else {
                                echo formInputField($qCode, $qTitle, $qType);
                            }
                        }
                        ?>
                    </ol>
                </div>
            </div>
            <div class="popup-bottom-bar full-width flex justify-center align-center">
                <div class="form-buttons full-width flex align-center gap-20px">
                    <a href="#" class="cancel-btn">Cancel</a>
                    <button name="continue-btn" id="continue-btn" class="register-btn flex justify-sp-ard align-center">
                        <h4>Continue</h4>
                        <img src="./assets/svg/right-arrow.svg">
                    </button>
                </div>
            </div>
        </form>
    </section>

</body>
<script>
    document.querySelectorAll(".onboarding-feature")[0].addEventListener("click", () => {
        document.querySelector(".popup-form-bg").style.display = "flex";
    });

    document.querySelector("#popup-form-close-btn").addEventListener("click", () => {
        document.querySelector(".popup-form-bg").style.display = "none";
    });

    document.querySelector(".cancel-btn").addEventListener("click", (e) => {
        e.preventDefault();
        document.querySelector(".popup-form-bg").style.display = "none";
    });
</script>
<script>
function googleTranslateElementInit() {
    new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</html>