<?php
function displayDashboardFooter($page) {
    return <<<DELIMETER
    <footer class="dash-footer">
        <div class="row-1 full-width flex ">
            <h1 style="font-size: 20px;">Guru Puraskar</h1>
            <ul>
                <li>
                    <a href="about-us.php">
                        about us
                    </a>
                </li>
                <li>
                    <a href="contact-us.php">
                        contact us
                    </a>
                </li>
                <li>
                    <a href="gallery.php">
                        gallery
                    </a>
                </li>
            </ul>
            <a href="{$page}.php?action=donateMoney" class="donate-btn flex align-center">
                <h4>Donate</h4>
                <img src="./assets/svg/right-arrow-black.svg" alt="">
            </a>
        </div>
        <div class="row-2">
            <h5 class="fw-200">© 2024 SAHYOG FOUNDATION. All rights reserved.</h5>
            <div class="end-lines flex">
                <a href="terms.php">
                    <h5 class="fw-200">Terms & Conditions</h5>
                </a>
                <a href="privacy.php">
                    <h5 class="fw-200">Privacy Policy</h5>
                </a>
                <a href="refund.php">
                    <h5 class="fw-200">Refund Policy</h5>
                </a>
            </div>
        </div>
    </footer>
    DELIMETER;
}
?>