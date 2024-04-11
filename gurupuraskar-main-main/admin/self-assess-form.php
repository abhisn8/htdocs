<?php include "includes/components/html-header.php"; displayTitle("Self Assessment Form"); importStyleSheets(["admin-panel", "input", "sa-form"]); ?>
<?php include "../includes/functions/security.php"; ?>
<?php include "includes/functions/security.php"; ?>
<?php include "includes/functions/question.php"; ?>
<?php include "../includes/functions/cookies.php"; ?>

<?php
// Redirects the useadmin to the login page if the admin is not logged in.
if (!isAdminLoggedIn()) {
    redirect("index");
}

// Deletes a question.
if (isset($_POST['delete-question'])) {
    $queCode = $_POST['deleteQuestionCode'];

    $stmt = $connection->prepare(
        "DELETE FROM `assessment_form_questions` WHERE `question_code` = :s1;
        DELETE FROM `assessment_questions_options` WHERE `question_code` = :s1;"
    );
    $stmt->bindParam(":s1", $queCode);
    $stmt->execute();

    redirect("self-assess-form");
}
// Deletes an option of a question.
if (isset($_GET['a']) && $_GET['a'] === "deleteOption") {
    $queCode = $_GET['que'];
    $optCode = $_GET['opt'];

    $stmt = $connection->prepare(
        "DELETE FROM `assessment_questions_options` WHERE `question_code` = :s1 AND `question_option_code` = :s2"
    );
    $stmt->bindParam(":s1", $queCode);
    $stmt->bindParam(":s2", $optCode);
    $stmt->execute();

    redirect("self-assess-form");
}

// Adds another choice to the question.
if (isset($_POST['add-new-choice'])) {
    $stmt = $connection->prepare(
        "SELECT * FROM assessment_form_questions WHERE question_type = 'mcq' OR question_type = 'dropdown'"
    );
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($result as $key => $value) {
        $qCode = $value['question_code'];
        $option = $_POST[$qCode . "-new-choice"];
        $optionCode = randomString();

        if (isset($option) && !empty($option)) {
            $stmt = $connection->prepare(
                "INSERT INTO `assessment_questions_options`(`question_code`, `question_option_code`, `question_option_title`)
                VALUES (:s1, :s2, :s3)"
            );
            $stmt->bindParam(":s1", $qCode);
            $stmt->bindParam(":s2", $optionCode);
            $stmt->bindParam(":s3", $option);
            $stmt->execute();
        } else {
            continue;
        }
    }

    redirect("self-assess-form");
}

// Submits the new questions to the database.
if (isset($_POST['save-questions'])) {
    $stmt = $connection->prepare(
        "SELECT * FROM assessment_questions_code"
    );
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($result as $key => $value) {
        $qCode = $value['question_code'];

        if (isset($_POST[$qCode . "-question"])) {
            $qTitle = $_POST[$qCode . "-question"];
            $qType = $value['question_type'];
            
            if ($qType === "mcq" || $qType === "dropdown") {
                $qOptions = $_POST[$qCode . "-options"];
                $qOptions = explode(",", $qOptions);

                $stmt = $connection->prepare(
                    "INSERT INTO `assessment_form_questions`(`question_code`, `question_title`, `question_type`)
                    VALUES (:s1, :s2, :s3)"
                );
                $stmt->bindParam(":s1", $qCode);
                $stmt->bindParam(":s2", $qTitle);
                $stmt->bindParam(":s3", $qType);
                $stmt->execute();

                foreach ($qOptions as $option) {
                    $optionCode = randomString();
                    $option = trim($option);

                    $stmt = $connection->prepare(
                        "INSERT INTO `assessment_questions_options`
                        (`question_code`, `question_option_code`, `question_option_title`)
                        VALUES (:s1, :s2, :s3)"
                    );
                    $stmt->bindParam(":s1", $qCode);
                    $stmt->bindParam(":s2", $optionCode);
                    $stmt->bindParam(":s3", $option);
                    $stmt->execute();
                }
            } elseif ($qType === "text" || $qType === "number") {
                $stmt = $connection->prepare(
                    "INSERT INTO `assessment_form_questions`(`question_code`, `question_title`, `question_type`)
                    VALUES (:s1, :s2, :s3)"
                );
                $stmt->bindParam(":s1", $qCode);
                $stmt->bindParam(":s2", $qTitle);
                $stmt->bindParam(":s3", $qType);
                $stmt->execute();
            }
        } else {
            continue;
        }
    }

    $stmt = $connection->prepare(
        "TRUNCATE TABLE `assessment_questions_code`"
    );
    $stmt->execute();

    redirect("self-assess-form");
}
?>
<body>
    <?php include "includes/components/mobile-navbar.php"; ?>

    <main>
        <div class="tab-nav flex align-center">
            <img src="./../assets/svg/form-logo.svg" alt="">
            <h4>Self-Assessment Form</h4>
        </div>

        <?php include "includes/components/sidebar.php"; ?>

        <div class="form-editor">
            <div class="fe-title">
                <h3>FORM EDITOR</h3>
                <p>Click on an option to add to the form.</p>
            </div>
            <div class="fe-buttons flex column justify-center align-center gap-10px">
                <button id="add-text-field" type="button" class="full-width flex justify-start align-center" type="button">
                    <div class="form-btn-logo flex justify-center align-center">
                        <img src="./../assets/svg/text-field-logo.svg" alt="">
                    </div>
                    <p>Text Field</p>
                </button>
                <button id="add-number-field" type="button" class="full-width flex justify-start align-center" type="button">
                    <div class="form-btn-logo flex justify-center align-center">
                        <img src="./../assets/svg/number-field-logo.svg" alt="">
                    </div>
                    <p>Number Field</p>
                </button>
                <button id="add-mcq-field" type="button" class="full-width flex justify-start align-center" type="button">
                    <div class="form-btn-logo flex justify-center align-center">
                        <img src="./../assets/svg/multiple-choice-logo.svg" alt="">
                    </div>
                    <p>Multiple Choice</p>
                </button>
                <button id="add-select-field" type="button" class="full-width flex justify-start align-center" type="button">
                    <div class="form-btn-logo flex justify-center align-center">
                        <img src="./../assets/svg/dropdown-logo.svg" alt="">
                    </div>
                    <p>Drop Down</p>
                </button>
            </div>
        </div>

        <form method="POST" class="sa-form">
            <div class="sa-form-title">
                <p>SELF-ASSESSMENT FORM</p>
            </div>
            <ol class="sa-form-questions">
                <?php
                $stmt = $connection->prepare(
                    "SELECT * FROM `assessment_form_questions`"
                );
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if ($result) {
                    foreach ($result as $key => $value) {
                        if ($value['question_type'] === "mcq" || $value['question_type'] === "dropdown") {
                            $qType = getQuestionTypeTitle($value['question_type']);
                            $options = getQuestionOptions($value['question_code']);
                            $qCode = $value['question_code'];

                            echo <<<DELIMETER
                            <li class="input-field">
                                <div class="flex justify-sp-bt align-center">
                                    <p>{$value['question_title']} ({$qType})</p>
                                    <button class="deleteQuestion" title="Delete {$value['question_title']}" type="button" id="{$value['question_code']}">
                                        <img src="./../assets/svg/dustbin-red.svg" alt="" srcset="">
                                    </button>
                                </div>
                                <div class="first flex row justify-start align-center gap-15px">
                                    {$options}
                                    <button type="button" class="add-choice-btn">+ Add choice</button>
                                </div>
                                <form method="POST">
                                    <input type="text" class="new-choice-input" name="{$qCode}-new-choice" placeholder="Press Enter after adding a new choice">
                                    <input type="submit" class="add-new-choice-btn" name="add-new-choice" value="">
                                </form>
                            </li>
                            DELIMETER;
                        } else {
                            $qType = getQuestionTypeTitle($value['question_type']);

                            echo <<<DELIMETER
                            <li class="input-field">
                                <div class="flex justify-sp-bt align-center">
                                    <p>{$value['question_title']} ({$qType})</p>
                                    <button class="deleteQuestion" title="Delete {$value['question_title']}" type="button" id="{$value['question_code']}">
                                        <img src="./../assets/svg/dustbin-red.svg" alt="" srcset="">
                                    </button>
                                </div>  
                            </li>
                            DELIMETER;
                        }
                    }
                }
                ?>
            <div class="sa-buttons flex align-center">
                <button name="save-questions" type="submit" class="flex justify-sp-bt align-center" type="button">
                    <h3>Save form</h3>
                    <img src="./../assets/svg/right-arrow.svg" alt="">
                </button>
            </div>
            </ol>
        </form>
    </main>

    <?php include "includes/components/mobile-sidebar.php"; ?>

    <section id="delete-prompt-popup" class="popup-bg flex justify-center align-center">
        <form method="POST" class="popup flex column justify-center align-center">
            <input type="hidden" name="deleteQuestionCode" value="">
            <h3>Delete this question</h3>
            <div class="popup-btns flex justify-center align-center">
                <button id="cancel-deleting-btn">
                    <h3 class="fw-200">Cancel</h3>
                </button>
                <button type="submit" name="delete-question">
                    <h3>Delete</h3>
                </button>
            </div>
        </form>
    </section>
</body>
<?php include "../includes/components/script.php"; importScripts(['sa-form']); ?>
</html>