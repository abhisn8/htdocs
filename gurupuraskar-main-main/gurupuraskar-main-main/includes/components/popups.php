<?php
// Function for showing a popup form whih displays all the answers of a user.
function userResponsePopUp ($uc, $display = false) {
    global $connection;

    $display = $display ? "flex" : "none";
    $userGeneratedName = generatePointUserName($uc);

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
                <h4 class="fw-600">{$row['q_title']}</h4>
            </span>
            <p style="font-weight: 600; color: black;">{$row['response']}</p>
        </li>
        DELIMETER;
    }

    return <<<DELIMETER
    <section style='display: {$display}' class="popup-form-bg flex justify-center align-center">
        <section class="popup-form flex column justify-sp-bt">
            <div class="popup-top-bar full-width">
                <div class="top-bar-title full-width flex justify-sp-bt align-center">
                    <h4>Review teacher {$userGeneratedName}</h4>
                </div>
                <div class="form">
                    <ol class="form-inputs-list flex column align-start justify-start">
                        {$response}
                    </ol>
                </div>
            </div>
            <div class="popup-bottom-bar full-width flex justify-sp-ard align-center">
                <div class="form-buttons full-width flex align-center gap-10px">
                    <h4 class="fw-200">Award Points (max 100)</h4>
                    <form id="points-form" action="" method="POST" class="point-input flex justify-sp-bt align-center gap-10px">
                        <input type="hidden" name="user-code" value="{$uc}">
                        <input id="reward-input" name="points" type="number" max="100" min="0" required>
                        <button id="reward-btn" form="points-form" type="submit" name="award-point" style="width: fit-content; padding: 0px; background-color: transparent;">
                            <img class="complete-form-btn" src="./assets/svg/right-arrow-black.svg">
                        </button>
                    </form>
                </div>
            </div>
        </section>
    </section>
    DELIMETER;
}

// Function for displaying a success popup.
function displaySuccessPopUp($uc, $pt, $display = false) {
    $display = $display ? "flex" : "none";
    $userARP = getUserARP(getCookie("user_code"));

    return <<<DELIMETER
    <section style="display: {$display}" class="success-popup-bg flex justify-center align-center">
        <section class="success-popup flex column justify-sp-bt align-center">
            <div class="topbar full-width flex column justify-center align-center gap-10px">
                <img src="./assets/video/success.gif" alt="Success gif">
                <h1>{$pt} points</h1>
                <h4 class="fw-200">Awarded to teacher {$uc}</h4>
            </div>
            <form action="" method="POST" class="bottombar full-width flex justify-center column align-center gap-10px position-relative">
                <div class="full-width flex justify-sp-bt align-center">
                    <h4 class="fw-200">{$userARP}/1000 ARP</h4>
                    <img id="reviewToolTipQue" src="./assets/svg/info-gray.svg" alt="">
                    <div id="reviewToolTip" class="toolTip">You need a minimum of 100 ARP to review</div>
                </div>
                <button type="submit" name="submit-success" class="continue-success-btn full-width flex justify-sp-ard align-center">
                    <h3>Continue</h3>
                    <img src="./assets/svg/right-arrow.svg" alt="">
                </button>
                <a href="dashboard.php">Go home</a>
            </form>
        </section>
    </section>
    DELIMETER;
}

// Function for displaying payment success popup.
function displayPaymentSuccessPopup($pts, $display = false) {
    $display = $display ? "flex" : "none";

    return <<<DELIMETER
    <section id="paySuccessPopup" style="display: {$display}" class="success-popup-bg flex justify-center align-center">
        <section class="success-popup flex column justify-sp-bt align-center">
            <div class="topbar full-width flex column justify-center align-center gap-10px">
                <img src="./assets/video/success.gif" alt="Success gif">
                <h1>{$pts} points</h1>
                <h4 class="fw-200">Recieved!</h4>
            </div>
            <div class="bottombar full-width flex justify-center column align-center gap-10px">
                <button id="closePaymentSuccess" type="button" class="full-width flex justify-sp-ard align-center">
                    <h3>Continue</h3>
                    <img src="./assets/svg/right-arrow.svg" alt="">
                </button>
            </div>
        </section>
    </section>
    DELIMETER;
}

// Function for displaying payment success popup.
function displayPaymentFailurePopup($display = false, $mess) {
    $display = $display ? "flex" : "none";

    return <<<DELIMETER
    <section id="paySuccessPopup" style="display: {$display}; bottom: 0;" class="success-popup-bg flex justify-center align-center">
        <section class="success-popup flex column justify-sp-bt align-center">
            <div class="topbar full-width flex column justify-center align-center gap-10px">
                <img src="./assets/img/cross.png" alt="Failure image.">
                <h4 class="fw-200">{$mess}</h4>
            </div>
            <div class="bottombar full-width flex justify-center column align-center gap-10px">
                <button id="closePaymentSuccess" type="button" class="full-width flex justify-sp-ard align-center">
                    <h3>Continue</h3>
                    <img src="./assets/svg/right-arrow.svg" alt="">
                </button>
            </div>
        </section>
    </section>
    DELIMETER;
}

// Function for displaying the self assessment form.
function displaySelfAssessForm($uc) {
    global $connection;

    $response = ""; // Stores all the data for displaying in the form.

    // Fetching all the self assessment form questions from the databases.
    $stmt = $connection->prepare(
        "SELECT assessment_form_questions.question_code AS q_code,
        assessment_form_questions.question_title AS q_title,
        assessment_form_questions.question_type AS q_type,
        assessment_form_responses.user_response AS response FROM assessment_form_questions
        INNER JOIN assessment_form_responses ON
        assessment_form_questions.question_code = assessment_form_responses.question_code 
        WHERE user_code = :s1"
    );
    $stmt->bindValue(":s1", $uc);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Prints all the input fields for the self assessment form.
    foreach ($result as $row) {
        if ($row['q_type'] === "mcq") {
            $response .= formMCQ($row['q_code'], $row['q_title'], $row['response']);
        } elseif ($row['q_type'] === "dropdown") {
            $response .= formDropDown($row['q_code'], $row['q_title'], $row['response']);
        } else {
            $response .= formInputField($row['q_code'], $row['q_title'], $row['q_type'], $row['response']);
        }
    }
    

    return <<<DELIMETER
    <section style="display: flex;" class="popup-form-bg flex justify-center align-center">
        <form action="" method="POST" class="popup-form flex column justify-sp-bt">
            <div class="popup-top-bar full-width">
                <div class="top-bar-title full-width flex justify-sp-bt align-center">
                    <h4>Self-assessment form</h4>
                    <a href="dashboard.php">
                        <h3 id="popup-form-close-btn" class="fw-200">X</h3>
                    </a>
                </div>
                <div class="form">
                    <ol class="from-inputs-list flex column align-start justify-start">
                        {$response}
                    </ol>
                </div>
            </div>
            <div class="popup-bottom-bar full-width flex justify-center align-center">
                <div class="form-buttons full-width flex align-center gap-20px">
                    <a href="dashboard.php" class="cancel-btn">Cancel</a>
                    <button type="submit" name="save-user-form" style="width: 40%" name="continue-btn" id="continue-btn" class="register-btn flex justify-sp-ard align-center">
                        <h4>Save</h4>
                        <img src="./assets/svg/right-arrow.svg">
                    </button>
                </div>
            </div>
        </form>
    </section>
    DELIMETER;
}

// Function for displaying the popup for selecting the categories for review.
function displayCategoriesPopup() {
    return <<<DELIMETER
    <section style="display: flex" class="popup-categories-bg flex">
        <form action="" method="POST" id="roles-form" class="popup-categories flex column">
            <div class="popup-title flex column justify-center gap-10px">
                <h3 class="popup-close-btn fw-200">X</h3>
                <h3 class="title text-center">Please select atleast 1 role to review from</h3>
            </div>
            <div class="cats-container flex">
                <label class="cat-container" for="c1">
                    <input type="checkbox" name="cat[]" value="primary teacher" id="c1">
                    <h4 class="fw-200">primary teacher</h4>
                </label>
                <label class="cat-container" for="c2">
                    <input type="checkbox" name="cat[]" value="preschool teacher" id="c2">
                    <h4 class="fw-200">preschool teacher</h4>
                </label>
                <label class="cat-container" for="c3">
                    <input type="checkbox" name="cat[]" value="kindergarten" id="c3">
                    <h4 class="fw-200">kindergarten</h4>
                </label>
                <label class="cat-container" for="c4">
                    <input type="checkbox" name="cat[]" value="physical education" id="c4">
                    <h4 class="fw-200">physical education</h4>
                </label>
                <label class="cat-container" for="c5">
                    <input type="checkbox" name="cat[]" value="music teacher" id="c5">
                    <h4 class="fw-200">music teacher</h4>
                </label>
                <label class="cat-container" for="c6">
                    <input type="checkbox" name="cat[]" value="librarian" id="c6">
                    <h4 class="fw-200">librarian</h4>
                </label>
                <label class="cat-container" for="c7">
                    <input type="checkbox" name="cat[]" value="middle school teacher" id="c7">
                    <h4 class="fw-200">middle school teacher</h4>
                </label>
                <label class="cat-container" for="c8">
                    <input type="checkbox" name="cat[]" value="high school teacher" id="c8">
                    <h4 class="fw-200">high school teacher</h4>
                </label>
                <label class="cat-container" for="c9">
                    <input type="checkbox" name="cat[]" value="art teacher" id="c9">
                    <h4 class="fw-200">art teacher</h4>
                </label>
                <label class="cat-container" for="c10">
                    <input type="checkbox" name="cat[]" value="pre-university teacher" id="c10">
                    <h4 class="fw-200">pre-university teacher</h4>
                </label>
                <label class="cat-container" for="c11">
                    <input type="checkbox" name="cat[]" value="school counselor" id="c11">
                    <h4 class="fw-200">school counselor</h4>
                </label>
                <label class="cat-container" for="c12">
                    <input type="checkbox" name="cat[]" value="professor" id="c12">
                    <h4 class="fw-200">professor</h4>
                </label>
                <label class="cat-container" for="c13">
                    <input type="checkbox" name="cat[]" value="special education" id="c13">
                    <h4 class="fw-200">special education</h4>
                </label>
                <label class="cat-container" for="c14">
                    <input type="checkbox" name="cat[]" value="home-school teacher" id="c14">
                    <h4 class="fw-200">home-school teacher</h4>
                </label>
                <label class="cat-container" for="c15">
                    <input type="checkbox" name="cat[]" value="tutor" id="c15">
                    <h4 class="fw-200">tutor</h4>
                </label>
                <label class="cat-container" for="c16">
                    <input type="checkbox" name="cat[]" value="other" id="c16">
                    <h4 class="fw-200">other</h4>
                </label>
            </div>
            <h4 id="cats-warning" style="display: none; text-align: center; color: red;">Please select atleast 1 role.</h4>
            <div class="cats-btn full-width flex justify-center">
                <button id="submit-roles" name="submit-roles" type="submit" id="review-continue-btn" class="full-width flex justify-sp-ard align-center">
                    <h3>Continue</h3>
                    <img src="./assets/svg/right-arrow.svg" alt="">
                </button> 
            </div>
        </form>
    </section>
    DELIMETER;
}

// Function for displaying the popup for purchasing ARP and RP.
function displayPointsConverter($uc) {
    $userARP = getUserARP($uc);
    $userRP = getUserRP($uc);

    return <<<DELIMETER
    <section id="points-converter" class="points-converter-bg flex justify-center">
        <div id="point-converter" class="points-converter flex column align-center">
            <div class="topbar full-width flex column justify-center align-center">
                <h3 class="text-center">Get Activated Reward Points</h3>
                <form method="POST" id="convert-rp-form" class="full-width flex column align-center">
                    <div class="input-field full-width flex column align-start gap-5px">
                        <span class="input-field-title flex full-width justify-start gap-10px">
                            <h5 class="fw-200" id="input-field-title">Points needed</h5>
                        </span>
                        <input type="number" min="0" max="{$userRP}" name="points-needed" required>
                        <h5 id="warn-rp"></h5>
                    </div>
                    <h5 id="user-scores" class="fw-200">You have <strong>{$userARP}</strong> ARP / <strong>{$userRP}</strong> RP</h5>
                </form>
            </div>
            <div class="bottombar full-width flex column justify-center align-center gap-10px">
                <button type="submit" name="convert-btn" id="convert-arp-btn" class="flex justify-sp-bt align-center">
                    <h4>Convert RP to ARP</h4>
                    <img src="./assets/svg/right-arrow.svg" alt="">
                </button>
                <button id="donate-btn" type="submit" name="donate-btn" class="flex justify-sp-bt align-center">
                    <h4>Donate to get ARP</h4>
                    <img src="./assets/svg/right-arrow.svg" alt="">
                </button>
                <button type="button" id="close-converter-btn">
                    Cancel
                </button>
            </div>
        </div>
    </section>
    DELIMETER;
}

// Function for displaying the amount for donation.
function displayDonationForm() {
    return <<<DELIMETER
    <section id="donation-form" class="points-converter-bg flex justify-center">
        <form method="POST" id="donationForm" class="points-converter flex column align-center">
            <div class="topbar full-width flex column justify-center align-center">
                <h3 class="text-center">Get Activated Reward Points</h3>
                <div class="full-width flex column align-center">
                    <div class="input-field full-width flex column align-start gap-5px">
                        <span class="input-field-title flex full-width justify-start gap-10px">
                            <h5 class="fw-200" id="input-field-title">Donation Amount</h5>
                        </span>
                        <input type="number" min="10" id="donationAmount" name="donationAmount" required>
                        <h5 id="warn-donation"></h5>
                    </div>
                    <h5 id="user-scores" class="fw-200">You will be getting 150% of ARP for the donation amount.</h5>
                </div>
            </div>
            <div class="bottombar full-width flex column justify-center align-center gap-10px">
                <button id="donateAmountBtn" type="submit" name="donateAmountBtn" class="flex justify-sp-bt align-center">
                    <h4>Donate to get ARP</h4>
                    <img src="./assets/svg/right-arrow.svg" alt="">
                </button>
                <button type="button" id="close-converter-btn">
                    Cancel
                </button>
            </div>
        </form>
    </section>
    DELIMETER;
}

function displayDonateAmountForm() {
    return <<<DELIMETER
    <section style="display: flex;" class="popup-form-bg flex justify-center align-center">
        <form action="" method="POST" class="popup-form flex column justify-sp-bt">
            <div class="popup-top-bar full-width">
                <div class="top-bar-title full-width flex justify-sp-bt align-center">
                    <h4>Donate Money</h4>
                    <a href="index.php">
                        <h3 id="popup-form-close-btn" class="fw-200">X</h3>
                    </a>
                </div>
                <div class="donationForm flex column gap-15px">
                    <div class="input-field full-width flex column align-start">
                        <span class="input-field-title flex full-width justify-start gap-10px">
                            <h5>Name</h5>
                            <h5>*</h5>
                        </span>
                        <input type="text" name="user-name" value="" placeholder="Name" required>
                    </div>
                    <div class="input-field full-width flex column align-start">
                        <span class="input-field-title flex full-width justify-start gap-10px">
                            <h5>Email</h5>
                            <h5>*</h5>
                        </span>
                        <input type="email" name="user-email" value="" placeholder="Email" required>
                    </div>
                    <div class="input-field full-width flex column align-start">
                        <span class="input-field-title flex full-width justify-start gap-10px">
                            <h5>Phone Number</h5>
                            <h5>*</h5>
                        </span>
                        <input type="tel" name="user-tel" value="" placeholder="Phone number" required>
                    </div>
                    <div class="input-field full-width flex column align-start">
                        <span class="input-field-title flex full-width justify-start gap-10px">
                            <h5>PAN (Optional)</h5>
                        </span>
                        <input type="text" name="user-pan" value="" placeholder="PAN">
                    </div>
                    <div class="input-field full-width flex column align-start">
                        <span class="input-field-title flex full-width justify-start gap-10px">
                            <h5>Amount</h5>
                            <h5>*</h5>
                        </span>
                        <input type="number" name="user-amount" min="10" value="" placeholder="Amount" required>
                    </div>
                </div>
                <h5 style="color: red;">PAN is required for 80(G) exemption</h5>
            </div>
            <div class="popup-bottom-bar full-width flex justify-center align-center">
                <div class="form-buttons full-width flex align-center gap-20px">
                    <button type="submit" name="donateMoney" style="width: 40%" id="continue-btn" class="register-btn flex justify-sp-ard align-center">
                        <h4>Donate</h4>
                        <img src="./assets/svg/right-arrow.svg">
                    </button>
                </div>
            </div>
        </form>
    </section>
    DELIMETER;
}

// Popup for showing the event details.
function displayEventDetails() {
    global $connection;

    $stmt = $connection->prepare("SELECT * FROM event_details LIMIT 1");
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return <<<DELIMETER
    <section style="display: none" id="eventDetailsPopup" class="success-popup-bg flex justify-center align-center">
        <section class="success-popup flex column justify-sp-bt align-center">
            <div class="bottombar full-width flex justify-center column align-center gap-10px">
                <div class="full-width flex row justify-start align-center gap-10px">
                    <h4 class="titles">Date: </h4>
                    <h4 class="">{$row['event_date']}</h4>
                </div>
                <div class="full-width flex row justify-start align-center gap-10px">
                    <h4 class="titles">Time: </h4>
                    <h4 class="">{$row['event_time']}</h4>
                </div>
                <div class="full-width flex row justify-start align-center gap-10px">
                    <h4 class="titles">Address: </h4>
                    <h4 class="">{$row['event_address']}</h4>
                </div>
                <button id="closeDetailsBtn">Close</button>
            </div>
        </section>
    </section>
    DELIMETER;
}

function displayPaymentFailForIndex($err, $dis=true) {
    $dis = $dis ? "flex" : "none";

    return <<<DELIMETER
    <section style="display: {$dis}; position: fixed;" id="eventDetailsPopup" class="success-popup-bg flex justify-center align-center">
        <section class="success-popup flex column justify-sp-bt align-center">
            <div style="gap: 50px;" class="bottombar full-width flex justify-center column align-center">
                <div class="full-width flex justify-center column align-center gap-10px">
                    <h3>Transaction Failed</h3>
                    <h5>Error: {$err}</h5>
                </div>
                <button id="closePaymentFailBtn">Close</button>
            </div>
        </section>
    </section>
    DELIMETER;
}

function displayPaymentSuccessForIndex($name, $email, $phn, $pan, $amnt, $date, $ref, $dis=true) {
    $dis = $dis ? "flex" : "none";

    return <<<DELIMETER
    <section style="display: {$dis}; position: fixed;" id="eventDetailsPopup" class="success-popup-bg flex justify-center align-center">
        <section style="gap: 50px;" class="success-popup flex column justify-sp-bt align-center">
            <div class="flex column justify-center align-center gap-15px">
                <h2>Transaction Successful</h2>
            </div>
            <div class="bottombar full-width flex justify-center column align-center gap-10px">
                <h4 style="font-weight: 300;">Received with thanks from</h4>
                <div class="full-width flex row justify-start align-center gap-10px">
                    <h4 style="font-weight: 300;" class="titles">Name: </h4>
                    <h4 style="font-weight: 300;" id="userName">{$name}</h4>
                </div>
                <div class="full-width flex row justify-start align-center gap-10px">
                    <h4 style="font-weight: 300;" class="titles">Email: </h4>
                    <h4 style="font-weight: 300;" id="userEmail">{$email}</h4>
                </div>
                <div class="full-width flex row justify-start align-center gap-10px">
                    <h4 style="font-weight: 300;" class="titles">Phone Number: </h4>
                    <h4 style="font-weight: 300;" id="userPhn">{$phn}</h4>
                </div>
                <div class="full-width flex row justify-start align-center gap-10px">
                    <h4 style="font-weight: 300;" class="titles">PAN: </h4>
                    <h4 style="font-weight: 300;" id="userPan">{$pan}</h4>
                </div>
                <div class="full-width flex row justify-start align-center gap-10px">
                    <h4 style="font-weight: 300;" class="titles">Amount: </h4>
                    <h4 style="font-weight: 300;" id="userAmnt">{$amnt}</h4>
                </div>
                <div class="full-width flex row justify-start align-center gap-10px">
                    <h4 style="font-weight: 300;" class="titles">Date: </h4>
                    <h4 style="font-weight: 300;" id="userDate">{$date}</h4>
                </div>
                <div class="full-width flex row justify-start align-center gap-10px">
                    <h4 style="font-weight: 300;" class="titles">Reference Number: </h4>
                    <h4 style="font-weight: 300;" id="userRef">{$ref}</h4>
                </div>
                <div class="full-width flex column jutify-center gap-20px">
                    <h2>SAHYOG FOUNDATION</h2>
                    <h4 style="font-weight: 300;">* This donation is eligible for exemption u/s 80(G) of the Income Tax Act 1961 vide Certificate No: CIT(E)BLR/80G/R-207/AAOTS0874J/ITO(E)-3/Vol 2017-2018 dated 25.5.2027 extended periodically.</h4>
                    <h4 style="color: red; font-weight: 300;">NOTE: Please download a copy of this payment acknowledgement for future reference.</h4>
                </div>
                <div class="full-width flex row justify-center align-center gap-10px">
                    <button type="submit" id="printReceipt" style="width: 40%" class="register-btn flex justify-sp-ard align-center">
                        <h4>Download</h4>
                        <img src="./assets/svg/right-arrow.svg">
                    </button>
                    <button id="closePaySuccessBtn">Close</button>
                </div>
            </div>
        </section>
    </section>
    DELIMETER;
}

function displayPrintPopup($ref, $dis=true) {
    global $connection;

    $stmt = $connection->prepare("SELECT * FROM users_transaction WHERE transaction_code = :s1");
    $stmt->bindParam(":s1", $ref);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    $name = "$result[transaction_name]";
    $amnt = "$result[transaction_amount]";
    $date = "$result[transaction_date]";
    $stat = "$result[transaction_status]";
    $code = "$result[transaction_code]";

    $dis = $dis ? "flex" : "none";

    return <<<DELIMETER
    <section style="display: {$dis}; position: fixed;" id="printPopup" class="success-popup-bg flex justify-center align-center">
        <section id="transactionReceipt" style="gap: 50px;" class="success-popup flex column justify-sp-bt align-center">
            <div class="flex column justify-center align-center gap-15px">
                <h2>Transaction Successful</h2>
            </div>
            <div class="bottombar full-width flex justify-center column align-center gap-10px">
                <h4 style="text-align: start; font-weight: 300;">Received with thanks</h4>
                <div class="full-width flex row justify-start align-center gap-10px">
                    <h4 style="font-weight: 300;" class="titles">Transaction: </h4>
                    <h4 style="font-weight: 300;" class="">{$name}</h4>
                </div>
                <div class="full-width flex row justify-start align-center gap-10px">
                    <h4 style="font-weight: 300;" class="titles">Reference Number: </h4>
                    <h4 style="font-weight: 300;" class="">{$ref}</h4>
                </div>
                <div class="full-width flex row justify-start align-center gap-10px">
                    <h4 style="font-weight: 300;" class="titles">Amount: </h4>
                    <h4 style="font-weight: 300;" class="">{$amnt}</h4>
                </div>
                <div class="full-width flex row justify-start align-center gap-10px">
                    <h4 style="font-weight: 300;" class="titles">Date: </h4>
                    <h4 style="font-weight: 300;" class="">{$date}</h4>
                </div>
                <div class="full-width flex row justify-start align-center gap-10px">
                    <h4 style="font-weight: 300;" class="titles">Status: </h4>
                    <h4 style="font-weight: 300;" class="">{$stat}</h4>
                </div>
                <div class="full-width flex column jutify-center gap-20px">
                    <h2>SAHYOG FOUNDATION</h2>
                    <h4 style="font-weight: 300;">* This donation is eligible for exemption u/s 80(G) of the Income Tax Act 1961 vide Certificate No: CIT(E)BLR/80G/R-207/AAOTS0874J/ITO(E)-3/Vol 2017-2018 dated 25.5.2017 extended periodically.</h4>
                    <h4 style="color: red; font-weight: 300;">NOTE: Please download a copy of this payment acknowledgement for future reference.</h4>
                </div>
                <div class="full-width flex row justify-center align-center gap-10px">
                    <button type="submit" value="{$code}" id="printReceipt" style="width: 50%" class="register-btn flex justify-sp-ard align-center">
                        <h4>Download</h4>
                        <img src="./assets/svg/right-arrow.svg">
                    </button>
                    <button id="closePrintPopupBtn">Close</button>
                </div>
            </div>
        </section>
    </section>
    DELIMETER;  
}
?>