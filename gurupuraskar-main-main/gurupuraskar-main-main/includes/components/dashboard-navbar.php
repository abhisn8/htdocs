<?php
if (isAppLocked()) {
    echo <<<DELIMETER
    <div class="alert-bar">
          <p>Application is locked.</p>
    </div>
    DELIMETER;
}
?>
<div class="dash-links flex justify-start align-center">
    <img width="75px"  src="./assets/img/logo.png" alt="Gurupuraskar Logo">
    <ul class="desktop-controls">
        <?php
        // All the names and links of the dashboard pages.
        $arr = [
            ["dashboard", "dashboard-pts", "dashboard-settings"],
            ["Dashboard", "Points & Rewards", "Settings"]
        ];

        $file = basename($_SERVER['PHP_SELF'], ".php");

        // Looping through the array to display the links.
        for ($i=0; $i < 3; $i++) {
            if ($file === $arr[0][$i]) {
                echo <<<DELIMETER
                <li class="selected">
                    <a href='{$arr[0][$i]}.php'>
                        <h4 class='fw-200'>{$arr[1][$i]}</h4>
                    </a>
                </li>
                DELIMETER;
            } else {
                echo <<<DELIMETER
                <li>
                    <a href='{$arr[0][$i]}.php'>
                        <h4 class='fw-200'>{$arr[1][$i]}</h4>
                    </a>
                </li>
                DELIMETER;
            }
        }
        ?>
    </ul> 
</div>
<form method="POST" action="" id="nav-form" class="controls flex align-center gap-20px">
    <button class="notifications-btn margin-top-5px position-relative" type="button" title="Mobile menu button">
        <img src="./assets/svg/bell.svg" alt="">
        <div id="notification-count" class="circle flex justify-center align-center"></div>
    </button>
    <button class="hamburger-btn" type="button" title="Mobile menu button">
        <img src="./assets/svg/menu-btn.svg" alt="">
    </button>
    <div id="google_translate_element"></div>
    <button name="logout-btn" form="nav-form" type="submit" class="logout-btn flex justify-center align-center">
        <h3 class="fw-200">Logout</h3>
    </button>
</form>

<?php
// Function for logging out the user.
if (isset($_POST['logout-btn'])) {
    if (logoutUser()) {
        redirect("index");
    }
}
?>