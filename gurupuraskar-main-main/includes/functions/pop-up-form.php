<?php
// Returns the input field for the self assessment form.
function formInputField($queCode, $queText, $queType, $value="") {
    $class = !userHasAnsweredQuestion(getCookie("user_code"), $queCode) ? "unanswered" : "";

    return <<<DELIMETER
    <li class="{$class} input-field full-width">
        <span class="input-field-title flex full-width justify-start gap-10px">
            <h4 class="fw-600">{$queText}</h4>
        </span>
        <input style="font-weight: 600;" type="{$queType}" name="{$queCode}" id="" placeholder="Type your answer" value={$value}>
        <h5 class="unanswered-warning">Please answer this question.</h5>
    </li>
    DELIMETER;
}

// Returns the input field of dropdown for the self assessment form.
function formDropDown($queCode, $queText, $value="") {
    global $connection;

    $stmt = $connection->prepare("SELECT * FROM assessment_questions_options WHERE question_code = :s1");
    $stmt->bindParam(":s1", $queCode);
    $stmt->execute();

    $qOptions = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $qOptionsList = "";

    foreach ($qOptions as $option) {
        if (!empty($option['question_option_title'])) {
            if ($value === $option['question_option_title']) {
                $qOptionsList .= <<<DELIMETER
                <option style="font-weight: 600;" selected value="{$option['question_option_title']}">{$option['question_option_title']}</option>
                DELIMETER;
            } else {
                $qOptionsList .= <<<DELIMETER
                <option style="font-weight: 600;" value="{$option['question_option_title']}">{$option['question_option_title']}</option>
                DELIMETER;
            }
        }
    }

    $class = !userHasAnsweredQuestion(getCookie("user_code"), $queCode) ? "unanswered" : "";

    return <<<DELIMETER
    <li class="{$class} input-field full-width">
        <span class="input-field-title flex full-width justify-start gap-10px">
            <h4 class="fw-600">{$queText}</h4>
        </span>
        <select name="{$queCode}">
            <option value="" disabled selected>Select your option</option>
            {$qOptionsList}
        </select>
        <h5 class="unanswered-warning">Please answer this question.</h5>
    </li>
    DELIMETER;
}

// Returns the input field of mcq for the self assessment form.
function formMCQ($queCode, $queText, $value="") {
    global $connection;

    $stmt = $connection->prepare("SELECT * FROM assessment_questions_options WHERE question_code = :s1");
    $stmt->bindParam(":s1", $queCode);
    $stmt->execute();

    $qOptions = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $qOptionsList = "";

    foreach ($qOptions as $option) {
        $title = $option['question_option_title'];
        if (!empty($title)) {
            if ($value === $title) {
                $qOptionsList .= <<<DELIMETER
                <label style="font-weight: 600;" class="flex justify-start align-center gap-15px">
                    <input checked type="radio" name="{$queCode}" value="{$title}">
                    {$title}
                </label>
                DELIMETER;
            } else {
                $qOptionsList .= <<<DELIMETER
                <label style="font-weight: 600;" class="flex justify-start align-center gap-15px">
                    <input type="radio" name="{$queCode}" value="{$title}">
                    {$title}
                </label>
                DELIMETER;
            }
            
        }
    }

    $class = !userHasAnsweredQuestion(getCookie("user_code"), $queCode) ? "unanswered" : "";

    return <<<DELIMETER
    <li class="{$class} input-field full-width">
        <span class="input-field-title flex full-width justify-start gap-10px">
            <h4 class="fw-200">{$queText}</h4>
        </span>
        <div class="flex justify-start align-center gap-15px">
            {$qOptionsList}
        </div>
        <h5 class="unanswered-warning">Please answer this question.</h5>
    </li>
    DELIMETER;
}
?>