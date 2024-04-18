<?php
// Checks that the question code exists in the database.
function questionExists($qCode) {
    global $connection;

    $stmt = $connection->prepare(
        "SELECT question_code FROM `assessment_questions_code` WHERE `question_code` = :s1"
    );
    $stmt->bindParam(":s1", $qCode);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        return true;
    } else {
        return false;
    }
}

// Gets the question type of a question
function getQuestionTypeTitle($questionType) {
    $qType = "";

    switch ($questionType) {
        case 'mcq':
            $qType = "Multiple Choice";
            break;

        case 'dropdown':
            $qType = "Dropdown";
            break;

        case 'number':
            $qType = "Number Field";
            break;
            
        default:
            $qType = "Text Field";
            break;
    }

    return $qType;
}

// Gets all the options of a question of the mcq and dropdown.
function getQuestionOptions($qcode) {
    global $connection;

    $stmt = $connection->prepare("SELECT * FROM assessment_questions_options WHERE question_code = :s1");
    $stmt->bindParam(":s1", $qcode);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $options = "";

    foreach ($result as $key => $value) {
        $options .= <<<DELIMETER
        <div class="flex justify-start align-center gap-10px">
            <h4 class="fw-200">{$value['question_option_title']}</h4>
            <a href="self-assess-form.php?a=deleteOption&que={$qcode}&opt={$value['question_option_code']}">
                <img src="./../assets/svg/dustbin-red.svg" alt="" srcset="">
            </a>
        </div>
        DELIMETER;
    }

    return $options;
}
?>