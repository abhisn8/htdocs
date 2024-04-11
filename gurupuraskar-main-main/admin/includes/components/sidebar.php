<div class="desktop-sidebar flex column justify-sp-bt align-center">
    <div class="topbar full-width">
        <div class="sidebar-nav full-width flex justify-center align-center">
            <div class="logo flex justify-start align-center gap-10px">
                <img width="50px" src="./../assets/img/logo.png" alt="">
                <h2>Gurupuraskar</h2>
            </div>
        </div>
        <div class="navigations flex column justify-center align-center">

        <?php
        // All the names of pages and their respective icons.
        $arr = [
            ["admin-panel", "self-assess-form", "leaderboard", "donations", "settings"],
            ["Teachers", "Self-Assessment Form", "Leaderboard", "Donations", "Settings"],
            ["user-account", "form-logo", "leaderboard", "donations", "settings"]
        ];

        $file = basename($_SERVER['PHP_SELF'], ".php");

        for ($i=0; $i < 5; $i++) {
            if ($file === $arr[0][$i]) {
                echo <<<DELIMETER
                <a href="{$arr[0][$i]}.php" class="navigation-btn selected full-width flex justify-start align-center gap-20px" type="button">
                    <img src="./../assets/svg/{$arr[2][$i]}.svg" alt="">
                    <h4>{$arr[1][$i]}</h4>
                </a>
                DELIMETER;
            } else {
                echo <<<DELIMETER
                <a href="{$arr[0][$i]}.php" class="navigation-btn full-width flex justify-start align-center gap-20px" type="button">
                    <img src="./../assets/svg/{$arr[2][$i]}-white.svg" alt="">
                    <h4>{$arr[1][$i]}</h4>
                </a>
                DELIMETER;
            }
        }
        ?> 
        </div>
    </div>
    <form method="POST" class="bottombar full-width">
        <button type="submit" name="logout_admin" class="full-width flex justify-center align-center gap-10px">
            <img src="./../assets/svg/logout.svg" alt="">
            <h3>Logout</h3>
        </button>
    </form>
</div>

<?php
if (isset($_POST['logout_admin'])) {
    if (logoutAdmin()) {
        redirect("index");
    }
}
?>