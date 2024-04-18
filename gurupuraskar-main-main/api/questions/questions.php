<?php
include "../../includes/config/db.php";

if (isset($_GET['q'])) {
    $query = $_GET['q'];

    if ($query === "add") {
        $qCode = $_GET['qCode'];
        $qType = $_GET['qType'];
    
        $stmt = $connection->prepare(
            "INSERT INTO `assessment_questions_code`(`question_code`, `question_type`)
            VALUES (:s1, :s2)"
        );
    
        $stmt->bindParam(":s1", $qCode);
        $stmt->bindParam(":s2", $qType);
        $stmt->execute();
    
        echo "success";
    }
}
?>