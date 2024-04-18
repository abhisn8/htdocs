<?php
// Function for displaying the user data in admin panel.
function displayUserData($uc) {
    if (userExists($uc)) {
        $userName = getUserName($uc);
        $userJob = ucwords(getUserJob($uc));
        $userCity = getUserCity($uc);
        $userMobNum = getUserPhone($uc);

        if (userHasFilledAllQuestions($uc)) {
            $userStatus = <<<DELIMETER
            <img src="./../assets/svg/check-green.svg" alt="">
            <h3 class="fw-200">Completed</h3>
            DELIMETER;
        } else {
            $userStatus = <<<DELIMETER
            <h3 class="fw-200">Incomplete</h3>
            DELIMETER;
        }
        
        $userScore = getUserScore($uc);
        $arp = getUserARP($uc);
        $rp = getUserRP($uc);
        $userBlockStatus = isUserBlocked($uc) ? "Unblock" : "Block";

        return <<<DELIMETER
        <div class="user-info flex column justify-center align-center">
            <button class="close-btn"><img src="./../assets/svg/close-btn-unfilled.svg" alt="Back button."></button>
            <img class="user-img" src="./../user-data/{$uc}.jpg" alt="">
            <div class="user-name flex column justify-center align-center gap-5px">
                <h4>{$userName}</h4>
                <h4 class="fw-200">{$userJob}, {$userCity}</h4>
            </div>
            <div class="flex column justify-center align-center gap-10px">
                <div class="flex justify-center align-center gap-15px">
                    <img src="./../assets/svg/phone-logo.svg" alt="">
                    <h4 class="fw-200">+91 {$userMobNum}</h4>
                </div>
            </div>
            <div class="user-info-buttons flex justify-center align-center gap-10px">
                <button id="view-acc-btn" type="button"><h3>View Account</h3></button>
                <button id="block-btn"><h3>{$userBlockStatus}</h3></button>
                <button id="delete-btn"><img src="./../assets/svg/dustbin.svg" alt=""></button>
            </div>
        </div>
        <button class="sa-btn flex justify-sp-bt align-center" type="button">
            <h3 class="fw-200">Self-Assessment</h3>
            <div class="flex justify-sp-ard align-center gap-15px">
                {$userStatus}
                <img src="./../assets/svg/chevron-right-gray.svg" alt="">
            </div>
        </button>
        <div class="user-reviews flex column justify-center align-center">
            <div class="user-review full-width flex justify-sp-bt align-center">
                <h4 class="review-score">{$userScore}</h4>
                <div class="flex justify-center align-center gap-10px">
                    <button id="edit-score-btn" class="review-btns flex justify-center align-center gap-5px">
                        <h3>Edit</h3>
                        <img src="./../assets/svg/chevron-right-blue.svg" alt="">
                    </button>
                </div>
            </div>
            <div class="user-review full-width flex justify-sp-bt align-center">
                <div class="flex justify-center align-center gap-10px">
                    <img src="./../assets/svg/point-green.svg" alt="">
                    <h3 class="fw-200">{$arp}</h3>
                    <h3 class="fw-200">ARP</h3>
                </div>
                <div class="flex justify-center align-center gap-10px">
                    <button id="arp-history-btn" class="review-btns flex justify-center align-center gap-5px">
                        <h3>History</h3>
                        <img src="./../assets/svg/chevron-right-blue.svg" alt="">
                    </button>
                    <button id="edit-arp-btn" class="review-btns flex justify-center align-center gap-5px">
                        <h3>Edit</h3>
                        <img src="./../assets/svg/chevron-right-blue.svg" alt="">
                    </button>
                </div>
            </div>
            <div class="user-review full-width flex justify-sp-bt align-center">
                <div class="flex justify-center align-center gap-10px">
                    <img src="./../assets/svg/point-gold.svg" alt="">
                    <h3 class="fw-200">{$rp}</h3>
                    <h3 class="fw-200">RP</h3>
                </div>
                <div class="flex justify-center align-center gap-10px">
                    <button id="rp-history-btn" class="review-btns flex justify-center align-center gap-5px">
                        <h3>History</h3>
                        <img src="./../assets/svg/chevron-right-blue.svg" alt="">
                    </button>
                    <button id="edit-rp-btn" class="review-btns flex justify-center align-center gap-5px">
                        <h3>Edit</h3>
                        <img src="./../assets/svg/chevron-right-blue.svg" alt="">
                    </button>
                </div>
            </div>
            <button type="button" class="view-all-btn"><h3 class="fw-200">View all ></h3></button>
        </div>
        <button id="view-donations-btn" class="donations-btn full-width flex justify-sp-bt align-center">
            <h3 class="fw-200">View Donations</h3>
            <img src="./../assets/svg/chevron-right-gray.svg" alt="">
        </button>
        DELIMETER;
    }
}

// Function for displaying the self assessment form.
function displayUserForm($uc, $display = false) {
    global $connection;

    $display = $display ? "flex" : "none";

    $stmt = $connection->prepare(
        "SELECT assessment_form_questions.question_code AS q_code,
        assessment_form_questions.question_title AS q_title,
        assessment_form_responses.user_response AS response FROM assessment_form_questions
        INNER JOIN assessment_form_responses ON 
        assessment_form_questions.question_code = assessment_form_responses.question_code 
        WHERE user_code = :s1"
    );
    $stmt->bindValue(":s1", $uc);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $response = "";

    foreach ($result as $row) {
        $response .= <<<DELIMETER
        <li class="input-field full-width">
            <span class="input-field-title flex full-width justify-start gap-10px">
                <h4 class="fw-200">{$row['q_title']}</h4>
            </span>
            <p>{$row['response']}</p>
        </li>
        DELIMETER;
    }

    return <<<DELIMETER
    <section style='display: {$display}' class="popup-form-bg flex justify-center align-center">
        <section class="popup-form flex column justify-sp-bt">
            <div class="popup-top-bar full-width">
                <div class="top-bar-title full-width flex justify-sp-bt align-center">
                    <h4>Review teacher {$uc}</h4>
                    <button type="button" id="close-user-sa-form" style="background: transparent; border: none; outline: none">
                        <h3>X</h3>
                    </button>
                </div>
                <div class="form">
                    <ol class="form-inputs-list flex column align-start justify-start">
                        {$response}
                    </ol>
                </div>
            </div>
        </section>
    </section>
    DELIMETER;
}
?>