<?php include "includes/components/html-header.php"; displayTitle("Settings"); importStyleSheets(['forgotpass']); ?>
<?php include "includes/functions/security.php"; ?>
<?php include "includes/functions/cookies.php"; ?>
<?php include "includes/functions/user.php"; ?>
<?php include "includes/functions/pop-up-form.php"; ?>
<?php include "includes/functions/referals.php"; ?>

<body>
    <section class="body">
        <aside class="back-btn-desk">
            <img src="./assets/svg/back-btn.svg" alt="Back button.">
        </aside>
        <section class="container">
            <header>
                <nav class="navbar flex full-width justify-sp-bt align-center">
                    <h2>Gurupuraskar</h2>
                    <div class="language-dialog flex align-center justify-sp-bt">
                        <div class="dialog-logo flex align-center justify-sp-bt">
                            <img src="./assets/svg/globe.svg" alt="Logo of a globe.">
                            <h4 class="language-dialog-name">English</h4>
                        </div>
                        <img src="./assets/svg/chevrondown.svg" alt="Down arrow button for languages.">
                    </div>
                </nav>
                <div class="back-btn-mobile full-width flex row align-center">
                    <img src="./assets/svg/back-btn.svg" alt="Back button.">
                    <h5>Forgot Password</h5>
                </div>
            </header>
            <article class="input-form full-width flex column align-start">
                <h3 class="register-title">Forgot Password</h3>
                <h5 class="forgot-pass-instruction">Enter your email and we will send you a recovery code to that email</h5 class="forgot-pass">

                <div class="input-field full-width flex column align-start gap-5px">
                    <span class="input-field-title flex full-width justify-start gap-10px">
                        <h5 id="input-field-title">Email</h5>
                        <h5>*</h5>
                    </span>
                    <input type="text" name="" id="">
                </div>
                <div class="input-field full-width flex column align-start gap-5px" style="display: none;">
                    <span class="input-field-title flex full-width justify-start gap-10px">
                        <h5 id="input-field-title">Email</h5>
                        <h5>*</h5>
                    </span>
                    <input type="text" name="" id="">
                </div>
                <img src="./assets/svg/captcha-test.svg" alt="">
                <div class="form-buttons full-width flex align-center">
                    <button id="continue-btn" class="register-btn flex justify-sp-ard align-center">
                        <h4>Continue</h4>
                        <img src="./assets/svg/right-arrow.svg">
                    </button>
                </div>
            </article>
            <div class="banner-img full-width flex justify-center align-center">
                <img src="./assets/svg/landing-page-img.svg" alt="Banner image for website.">
            </div>
        </section>
    </section>
</body>
<?php include "./includes/components/script.php"; importScripts(['forgot-pass', 'language']); ?>
</html>