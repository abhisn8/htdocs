<section class="sidebar-bg">
    <form action="" method="POST" id="side-form" class="sidebar flex column justify-sp-bt align-center">
        <div class="top full-width">
            <div class="full-width flex justify-end align-center">
                <button id="sidebar-close-btn" type="button"><img src="./assets/svg/cross.svg" alt="Button to close the sidebar."></button>
            </div>
            <ul>
                <li>
                    <a href="dashboard.php">
                        <h3 class="fw-200">Dashboard</h3>
                    </a>
                </li>
                <li>
                    <a href="dashboard-pts.php">
                        <h3 class="fw-200">Points & Rewards</h3>
                    </a>
                </li>
                <li>
                    <a href="dashboard-settings.php">
                        <h3 class="fw-200">Settings</h3>
                    </a>
                </li>
            </ul>
            <!-- <div class="language-dialog flex align-center justify-sp-bt">
                <div class="dialog-logo flex align-center justify-sp-bt gap-10px">
                    <img src="./assets/svg/globe-white.svg" alt="Logo of a globe.">
                    <h4 class="language-dialog-name">English</h4>
                </div>
                <img src="./assets/svg/chevron-right-white.svg" alt="Down arrow button for languages.">
            </div> -->
            <!-- <div id="google_translate_element_mobile"></div> -->
        </div>
        <div class="bottom full-width">
            <button form="side-form" type="submit" name="side-logout-btn">Logout</button>
        </div>
    </form>
</section>

<?php
// Function for logging out the user.
if (isset($_POST['side-logout-btn'])) {
    if (logoutUser()) {
        redirect("index");
    }
}
?>