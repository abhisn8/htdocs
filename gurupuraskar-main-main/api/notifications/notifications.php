<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include "../../includes/config/db.php";
include "../../includes/functions/cookies.php";
include "../../includes/functions/notifications.php";

// Function for getting all notifications of a user.
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    $user = getCookie("user_code");

    switch ($action) {
        case 'getAllNotifications':
            $result = getAllUnseenNotifications($user);
            
            if ($result) {
                $jsonArray = [];
                foreach ($result as $key => $value) {
                    array_push(
                        $jsonArray,
                        array(
                            "id" => $value['id'],
                            "title" => $value['notification_title'],
                            "date" => $value['notification_date']
                        )
                    );
                }

                print_r(json_encode($jsonArray));
            } else {
                print_r(json_encode(array("status" => "no-notifications")));
            }

            break;

        case 'getUnseenNotificationsCount':
            $result = getAllUnseenNotificationsCount($user);
            print_r(json_encode(array("count" => $result)));
            break;

        case 'setNotificationsSeen':
            markAllNotificationsSeen($user);
            print_r(json_encode(array("status" => "success")));
            break;
    }
}

?>