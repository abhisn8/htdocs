<?php
if (isset($_POST['download'])) {
    include_once "../includes/config/db.php";
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

    $filename = "leaderboard.csv";
    $file = fopen($filename, "a");
    $txt = "User Code, Name, District, Score\n";
    fwrite($file, $txt);

    foreach ($result as $key => $value) {
        fwrite($file, "{$value['u_code']}, {$value['name']}, {$value['district']}, {$value['score']}" . "\n");
    }

    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename=' . basename($filename));
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($filename));
    readfile($filename);

    unlink($filename);
}
?>

<?php include "includes/components/html-header.php"; displayTitle("Leaderboard"); importStyleSheets(["admin-panel", "input", "leaderboard"]); ?>
<?php include "includes/components/leaderboard.php"; ?>
<?php include "../includes/functions/security.php"; ?>
<?php include "includes/functions/security.php"; ?>
<?php include "../includes/functions/cookies.php"; ?>

<?php
if (!isAdminLoggedIn()) {
    redirect("index");
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

        <div class="options flex column justify-start">
            <div class="options-title">
                <h3>OPTIONS</h3>
            </div>
            <form method="GET" class="options-search flex justify-start align-center">
                <img src="./../assets/svg/search-icon.svg" alt="">
                <input type="search" name="q" placeholder="Search by name or ID">
            </form>
            <form method="GET" id="leaderboard-form" class="options-inputs flex column justify-start align-start">
                <div class="input-field full-width flex column align-start gap-5px">
                    <span class="input-field-title flex full-width justify-start gap-10px">
                        <h5>State</h5>
                    </span>
                    <select id="user-state" class="select-option" title="Select your state" name="user-state" id="" required>
                        <option value="">Select your state</option>
                    </select>
                </div>
                <div class="input-field full-width flex column align-start gap-5px">
                    <span class="input-field-title flex full-width justify-start gap-10px">
                        <h5>District</h5>
                    </span>
                    <select id="user-district" class="select-option" title="Select your district" name="user-district" id="" required>
                        <option value="">Select your district</option>
                    </select>
                </div>
                <div class="input-field full-width flex column align-start gap-5px">
                    <span class="input-field-title flex full-width justify-start gap-10px">
                        <h5>Sort by</h5>
                    </span>
                    <select title="Select the order of List" name="list-order" id="list-order" required>
                        <option value="">Select the order of list</option>
                        <option value="asc">Ascending</option>
                        <option value="desc">Descending</option>
                    </select>
                </div>
                <div class="flex justify-start align-center gap-20px">
                    <button form="leaderboard-form" name="search-leaderboard" type="submit" id="download-csv">Search</button>
                    <button form="download-form" name="download" type="submit" id="download-csv">Download CSV</button>
                </div>
            </form>
            <form action="" method="POST" id="download-form"></form>
        </div>

        <div class="leaderboard flex column justify-start">
            <div class="leaderboard-title flex">
                <h3>LEADERBOARD</h3>
            </div>
            <div class="leaderboard-scores flex column align-center">
                <?php
                if (isset($_GET['q']) && !empty($_GET['q'])) {
                    $q = "%" . $_GET['q'] . "%";
                    $stmt = $connection->prepare(
                        "SELECT users.user_code AS u_code, users_data.user_f_name AS f_name, 
                        users_data.user_l_name AS l_name, users_score.user_score AS score,
                        users_data.user_district AS district FROM users
                        INNER JOIN users_data ON users.user_code = users_data.user_code
                        INNER JOIN users_score ON users.user_code = users_score.user_code
                        WHERE users.user_code LIKE :q OR users_data.user_f_name LIKE :q OR users_data.user_l_name LIKE :q"
                    );
                    $stmt->bindParam(":q", $q);
                    $stmt->execute();
                    $result = $stmt->fetch(PDO::FETCH_ASSOC);

                    if ($result) {
                        echo firstUserInLeaderboard(1, $result['f_name'] . " " . $result['l_name'], $result['district'], $result['score']);
                    } else {
                        echo "<h2>No user found.<h2>";
                    }

                } else {
                    if (isset($_GET['search-leaderboard'])) {
                        $state = $_GET['user-state'];
                        $district = $_GET['user-district'];
                        $order = $_GET['list-order'];
                        $order = $order === "desc" ? "DESC" : "ASC";

                        $query = 
                        "SELECT users.user_code AS u_code, users_data.user_full_name AS name,
                        users_score.user_score AS score,
                        users_data.user_district AS district FROM users
                        INNER JOIN users_data ON users.user_code = users_data.user_code
                        INNER JOIN users_score ON users.user_code = users_score.user_code
                        WHERE users_data.user_state = :s1 AND users_data.user_district = :s2
                        ORDER BY users_score.user_score " . $order;

                        // Displays all the people and scores on the leaderboard.
                        $stmt = $connection->prepare($query);
                        $stmt->bindParam(":s1", $state);
                        $stmt->bindParam(":s2", $district);
                        $stmt->execute();
                        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    } else {
                        $query = 
                        "SELECT users.user_code AS u_code, users_data.user_full_name AS name,
                        users_score.user_score AS score,
                        users_data.user_district AS district FROM users
                        INNER JOIN users_data ON users.user_code = users_data.user_code
                        INNER JOIN users_score ON users.user_code = users_score.user_code
                        ORDER BY users_score.user_score DESC";

                        // Displays all the people and scores on the leaderboard.
                        $stmt = $connection->prepare($query);
                        $stmt->execute();
                        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    }


                    if ($stmt->rowCount() > 0) {
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
                    } else {
                        echo "<h2>No user found.<h2>";
                    }
                }
                ?>
            </div>
        </div>
    </main>

    <?php include "includes/components/mobile-sidebar.php"; ?>

    <section id="prompt-popup" class="popup-bg flex justify-center align-center">
        <div class="popup flex column justify-center align-center">
            <h3>Block Firstname Lastname</h3>
            <div class="popup-btns flex justify-center align-center">
                <button>
                    <h3 class="fw-200">Cancel</h3>
                </button>
                <button>
                    <h3>Block</h3>
                </button>
            </div>
        </div>
    </section>
    <section id="form-popup" class="popup-bg flex justify-center align-center">
        <div class="popup flex column justify-center align-center gap-20px">
            <h3>Edit score</h3>
            <div class="input-field full-width flex column align-start">
                <span class="input-field-title flex full-width justify-start gap-10px">
                    <h5>Score</h5>
                </span>
                <input type="text" name="" id="">
            </div>
            <div class="popup-btns flex justify-center align-center">
                <button>
                    <h3 class="fw-200">Cancel</h3>
                </button>
                <button>
                    <h3>Edit</h3>
                </button>
            </div>
        </div>
    </section>
</body>
<script src="./../scripts/states-districts.js"></script>
<?php include "../includes/components/script.php"; importScripts(["leaderboard"]); ?>
</html>