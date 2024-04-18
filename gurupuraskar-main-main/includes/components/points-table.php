<?php
function generatePointUserName($code) {
    $num = getUserPhone($code);
    $name = getUserName($code);

    return substr($name, 0, 5) . substr($num, 5);
}

// Displays the table of all points of a user.
function displayAllPoints($uc, $type, $selected, $id = "all-table") {
    $activities = getActivity($uc, $type);
    $table = '';
    $selected = $selected ? "selected" : "";
    
    foreach ($activities as $key => $value) {
        $sign = $value['activity_balance_type'] === "CRE" ? '+' : '-';

        if ($value['activity_from'] === "Gurupuraskar") {
            $fromImg = "";
            $fromUser = "Gurupuraskar";
        } else {
            $fromUser = "User " . generatePointUserName($value['activity_from']);

            if (getUserGender($value['activity_from']) == "male") {
                $fromImg = <<<DELIMETER
                <img src="./assets/svg/avatar-man.svg" alt="">
                DELIMETER;
            } else {
                $fromImg = <<<DELIMETER
                <img src="./assets/svg/avatar-woman.svg" alt="">
                DELIMETER;
            }
        }

        $table .= <<<DELIMETER
        <tr>
            <td>{$value['activity_name']}</td>
            <td class="flex align-center gap-10px">
                {$fromImg}
                {$fromUser}
            </td>
            <td>{$value['activity_date']}</td>
            <td>{$sign}{$value['activity_points']} {$value['activity_points_name']}</td>
            <td>{$value['activity_balance']} {$value['activity_points_name']}</td>
        </tr>
        DELIMETER;
    }

    return <<<DELIMETER
    <tbody id="{$id}" class="toggle-tables {$selected} full-width">
        {$table}
    </tbody>
    DELIMETER;
}
?>