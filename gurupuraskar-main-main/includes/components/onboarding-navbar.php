<?php
// Function for displaying the navbar for onboarding pages.
function onboardingNavbar($title, $backBtn = true) {
    $btn = $backBtn ? '<img src="./assets/svg/back-btn.svg" alt="Back button.">' : "" ;
    echo <<<DELIMETER
    <header>
        <nav class="navbar flex full-width justify-sp-bt align-center">
            <img width="110px" src="./assets/img/logo.png" alt="Gurupuraskar Logo">
            <div id="google_translate_element"></div>
        </nav>
        <div class="back-btn-mobile full-width flex row align-center">
            {$btn}
            <h5>{$title}</h5>
        </div>
    </header>
    DELIMETER;
}
?>