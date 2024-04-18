<?php include "includes/components/html-header.php"; displayTitle("Settings"); importStyleSheets(["admin-panel", "input", "settings", "popup"]); ?>
<?php include "../includes/functions/security.php"; ?>
<?php include "includes/functions/security.php"; ?>
<?php include "includes/functions/events.php"; ?>
<?php include "../includes/functions/cookies.php"; ?>

<?php
if (!isAdminLoggedIn()) {
    redirect("index");
}

// Responds on the submission of new registeration fee.
if (isset($_POST['edit-price'])) {
    $newFee = $_POST['new-price'];
    updateEventDetail("price", $newFee);
}

// Responds on the submission of date.
if (isset($_POST['submit-date'])) {
    $newDate = $_POST['new-date'];
    updateEventDetail("date", $newDate);
}

// Responds on the submission of time.
if (isset($_POST['edit-time'])) {
    $newTime = $_POST['new-time'];
    updateEventDetail("time", $newTime);
}

// Responds on the submission of address.
if (isset($_POST['edit-address'])) {
    $newAddress = $_POST['new-address'];
    updateEventDetail("address", $newAddress);
}

// Responds on the submission of foundation's location.
if (isset($_POST['edit-location'])) {
    $newLocation = $_POST['new-location'];
    updateEventDetail("location", $newLocation);
}

// Responds on the submission of mobile.
if (isset($_POST['edit-mobile'])) {
    $newMobile = $_POST['new-mobile'];
    updateEventDetail("mobile", $newMobile);
}

// Responds on the submission of website.
if (isset($_POST['edit-website'])) {
    $newWebsite = $_POST['new-website'];
    updateEventDetail("website", $newWebsite);
}

// Responds on the submission of email.
if (isset($_POST['edit-email'])) {
    $newEmail = $_POST['new-email'];
    updateEventDetail("email", $newEmail);
}

// Saves about us page content.
if (isset($_POST['save-about-us'])) {
    $content = $_POST['about-us-content'];
    updateEventDetail("about_us_content", $content);    
}

// Saves gallery page content.
if (isset($_POST['save-gallery'])) {
    $content = $_POST['gallery-content'];
    updateEventDetail("gallery", $content);    
}

// Resets the cycle of web application.
if (isset($_POST['reset-cycle-btn'])) {
    $stmt = $connection->prepare(
        "UPDATE app_config SET app_reset = true WHERE id = 1;
        UPDATE users SET user_class = 'ON1';
        UPDATE users_score SET user_score = 0;
        TRUNCATE assessment_form_responses;
        TRUNCATE `notifications`;"
    );
    $stmt->execute();

    redirect("settings");
}

// Locks the app.
if (isset($_POST['lock-btn'])) {
    $newConfig = $_POST['newConfig'];

    if ($newConfig === "unlock") {
        $config = 0;
    } elseif($newConfig === "lock") {
        $config = 1;
    }

    $stmt = $connection->prepare("UPDATE app_config SET app_locked = :s1 WHERE id = 1");
    $stmt->bindValue(":s1", $config);
    $stmt->execute();

    redirect("settings");
}
?>

<body>
    <?php include "includes/components/mobile-navbar.php"; ?>

    <main>
        <div class="tab-nav flex align-center">
            <img src="./../assets/svg/settings-logo.svg" alt="">
            <h4>Settings</h4>
        </div>

        <?php include "includes/components/sidebar.php"; ?>

        <div class="settings flex column justify-center align-start">
            <div class="settings-title">
                <h3>SETTINGS</h3>
            </div>
            <div class="main-settings">
                <h3>Gurupuraskar event</h3>
                <div class="edit-buttons flex column justify-start align-center">
                    <div class="edit-btn flex justify-sp-bt align-center">
                        <h4><?php echo getEventDetail("date"); ?></h4>
                        <button id="edit-date-btn" class="edit-popup-btns flex justify-center align-center" type="button">
                            EDIT
                            <img src="./../assets/svg/chevron-right-blue.svg" alt="">
                        </button>
                    </div>
                    <div id="edit-time-btn" class="edit-btn flex justify-sp-bt align-center">
                        <h4><?php echo getEventDetail("time"); ?></h4>
                        <button class="edit-popup-btns flex justify-center align-center" type="button">
                            EDIT
                            <img src="./../assets/svg/chevron-right-blue.svg" alt="">
                        </button>
                    </div>
                    <div id="edit-address-btn" class="edit-btn flex column justify-start gap-15px">
                        <div class="row-1 flex justify-sp-bt align-center">
                            <h4>Address:</h4>
                            <button class="edit-popup-btns flex justify-center align-center" type="button">
                                EDIT
                                <img src="./../assets/svg/chevron-right-blue.svg" alt="">
                            </button>
                        </div>
                        <div class="row-2">
                            <h4><?php echo getEventDetail("address"); ?></h4>
                        </div>
                    </div>
                    <div class="edit-price-btn flex justify-sp-bt align-center">
                        <h4><?php echo getEventDetail("price"); ?></h4>
                        <button id="edit-price-btn" class="edit-popup-btns flex justify-center align-center" type="button">
                            EDIT
                            <img src="./../assets/svg/chevron-right-blue.svg" alt="">
                        </button>
                    </div>
                </div>
                <h3 style="padding-top: 25px;">Contact Details</h3>
                <div class="contact-edits edit-buttons flex column justify-start align-center">
                    <div class="edit-btn flex justify-sp-bt align-center">
                        <h4><?php echo getEventDetail("location"); ?></h4>
                        <button id="edit-date-btn" class="edit-popup-btns flex justify-center align-center" type="button">
                            EDIT
                            <img src="./../assets/svg/chevron-right-blue.svg" alt="">
                        </button>
                    </div>
                    <div id="edit-time-btn" class="edit-btn flex justify-sp-bt align-center">
                        <h4><?php echo getEventDetail("mobile"); ?></h4>
                        <button class="edit-popup-btns flex justify-center align-center" type="button">
                            EDIT
                            <img src="./../assets/svg/chevron-right-blue.svg" alt="">
                        </button>
                    </div>
                    <div id="edit-time-btn" class="edit-btn flex justify-sp-bt align-center">
                        <h4><?php echo getEventDetail("website"); ?></h4>
                        <button class="edit-popup-btns flex justify-center align-center" type="button">
                            EDIT
                            <img src="./../assets/svg/chevron-right-blue.svg" alt="">
                        </button>
                    </div>
                    <div id="edit-time-btn" class="edit-btn flex justify-sp-bt align-center">
                        <h4><?php echo getEventDetail("email"); ?></h4>
                        <button class="edit-popup-btns flex justify-center align-center" type="button">
                            EDIT
                            <img src="./../assets/svg/chevron-right-blue.svg" alt="">
                        </button>
                    </div>
                </div>

                <h3 style="padding: 25px 0px;">About Us</h3>
                <form action="" method="POST" class="flex column justify-center align-start">
                    <textarea name="about-us-content" id="about-us-text"><?php echo getEventDetail("about_us_content"); ?></textarea>
                    <button id="save-about-us-content" class="edit-popup-btns flex justify-center align-center" name="save-about-us" type="submit">Save</button>
                </form>

                <h3 style="padding: 25px 0px;">Gallery</h3>
                <form action="" method="POST" class="flex column justify-center align-start">
                    <textarea name="gallery-content" id="gallery-text"><?php echo getEventDetail("gallery"); ?></textarea>
                    <button id="save-gallery-content" class="edit-popup-btns flex justify-center align-center" name="save-gallery" type="submit">Save</button>
                </form>

                <h3 class="app-settings-title">Gurupuraskar app settings</h3>
                <div class="app-setting">
                    <button class="lock-btn" name="lock-app" type="submit">
                        <?php
                        if (isAppLocked()) {
                            echo "Unlock application";
                        } else {
                            echo "Lock application";
                        }
                        ?>
                    </button>
                    <h4 class="app-setting-title">This option locks the application and as a result, the following will happen:</h4>
                    <ul>
                        <li>Teachers cannot review other teachers.</li>
                        <li>Leaderboard does not update.</li>
                        <li>Teachers can still get / convert ARP and RP</li>
                        <li>Teachers can still register for the event and application.</li>
                    </ul>
                    <h3 class="app-setting-note">NOTE: This option exists only to lock the application before the start of the main event, to let the organisers prepare for the main event.</h3>
                </div>
                <div class="app-setting">
                    <button class="reset-btn" name="reset-cycle" type="button">Reset cycle</button>
                    <h4 class="app-setting-title">This option does the following:</h4>
                    <ul>
                        <li>Resets the leaderboard.</li>
                        <li>Restarts onboarding for every teacher. (Teachers will need to pay the registration fee and refill their self-assessment form)</li>
                        <li>Points are not reset.</li>
                    </ul>
                    <h3 class="app-setting-note">NOTE: This option is only to be used after the main event has been completed.</h3>
                </div>
            </div>
        </div>
    </main>
    
    <?php include "includes/components/mobile-sidebar.php"; ?>

    <section id="edit-date-form" class="edit-popups popup-bg flex justify-center align-center">
        <form method="POST" class="popup flex column justify-center align-center gap-20px">
            <h3>Edit Date</h3>
            <div class="input-field full-width flex column align-start">
                <span class="input-field-title flex full-width justify-start gap-10px">
                    <h5>Date</h5>
                </span>
                <input type="date" name="new-date" value="<?php echo getEventDetail("date"); ?>">
            </div>
            <div class="popup-btns flex justify-center align-center">
                <button>
                    <h3 class="cancel-popup-btn fw-200">Cancel</h3>
                </button>
                <button name="submit-date" type="submit">
                    <h3>Edit</h3>
                </button>
            </div>
        </form>
    </section>

    <section id="edit-time-form" class="edit-popups popup-bg flex justify-center align-center">
        <form method="POST" class="popup flex column justify-center align-center gap-20px">
            <h3>Edit Time</h3>
            <div class="input-field full-width flex column align-start">
                <span class="input-field-title flex full-width justify-start gap-10px">
                    <h5>Time</h5>
                </span>
                <input type="time" name="new-time" value="<?php echo getEventDetail("time"); ?>">
            </div>
            <div class="popup-btns flex justify-center align-center">
                <button>
                    <h3 class="cancel-popup-btn fw-200">Cancel</h3>
                </button>
                <button name="edit-time" type="submit">
                    <h3>Edit</h3>
                </button>
            </div>
        </form>
    </section>

    <section id="edit-address-form" class="edit-popups popup-bg flex justify-center align-center">
        <form method="POST" class="popup flex column justify-center align-center gap-20px">
            <h3>Edit Address</h3>
            <div class="input-field full-width flex column align-start">
                <span class="input-field-title flex full-width justify-start gap-10px">
                    <h5>Address</h5>
                </span>
                <textarea name="new-address" cols="30" rows="10">
                    <?php echo getEventDetail("address"); ?>
                </textarea>
            </div>
            <div class="popup-btns flex justify-center align-center">
                <button>
                    <h3 class="cancel-popup-btn fw-200">Cancel</h3>
                </button>
                <button name="edit-address" type="submit">
                    <h3>Edit</h3>
                </button>
            </div>
        </form>
    </section>

    <section id="edit-price-form" class="edit-popups popup-bg flex justify-center align-center">
        <form method="POST" class="popup flex column justify-center align-center gap-20px">
            <h3>Edit Registeration Fee</h3>
            <div class="input-field full-width flex column align-start">
                <span class="input-field-title flex full-width justify-start gap-10px">
                    <h5>Registeration Fee</h5>
                </span>
                <input type="number" name="new-price" value="<?php echo getEventDetail("price"); ?>">
            </div>
            <div class="popup-btns flex justify-center align-center">
                <button>
                    <h3 class="cancel-popup-btn fw-200">Cancel</h3>
                </button>
                <button name="edit-price" type="submit">
                    <h3>Edit</h3>
                </button>
            </div>
        </form>
    </section>

    <section id="edit-location-form" class="edit-popups popup-bg flex justify-center align-center">
        <form method="POST" class="popup flex column justify-center align-center gap-20px">
            <h3>Edit Foundation Address</h3>
            <div class="input-field full-width flex column align-start">
                <span class="input-field-title flex full-width justify-start gap-10px">
                    <h5>Foundation Address</h5>
                </span>
                <input type="text" name="new-location" value="<?php echo getEventDetail("location"); ?>">
            </div>
            <div class="popup-btns flex justify-center align-center">
                <button>
                    <h3 class="cancel-popup-btn fw-200">Cancel</h3>
                </button>
                <button name="edit-location" type="submit">
                    <h3>Edit</h3>
                </button>
            </div>
        </form>
    </section>

    <section id="edit-mobile-form" class="edit-popups popup-bg flex justify-center align-center">
        <form method="POST" class="popup flex column justify-center align-center gap-20px">
            <h3>Edit Mobile Number</h3>
            <div class="input-field full-width flex column align-start">
                <span class="input-field-title flex full-width justify-start gap-10px">
                    <h5>Mobile Number</h5>
                </span>
                <input type="text" name="new-mobile" value="<?php echo getEventDetail("mobile"); ?>">
            </div>
            <div class="popup-btns flex justify-center align-center">
                <button>
                    <h3 class="cancel-popup-btn fw-200">Cancel</h3>
                </button>
                <button name="edit-mobile" type="submit">
                    <h3>Edit</h3>
                </button>
            </div>
        </form>
    </section>

    <section id="edit-website-form" class="edit-popups popup-bg flex justify-center align-center">
        <form method="POST" class="popup flex column justify-center align-center gap-20px">
            <h3>Edit Website</h3>
            <div class="input-field full-width flex column align-start">
                <span class="input-field-title flex full-width justify-start gap-10px">
                    <h5>Website</h5>
                </span>
                <input type="text" name="new-website" value="<?php echo getEventDetail("website"); ?>">
            </div>
            <div class="popup-btns flex justify-center align-center">
                <button>
                    <h3 class="cancel-popup-btn fw-200">Cancel</h3>
                </button>
                <button name="edit-website" type="submit">
                    <h3>Edit</h3>
                </button>
            </div>
        </form>
    </section>

    <section id="edit-email-form" class="edit-popups popup-bg flex justify-center align-center">
        <form method="POST" class="popup flex column justify-center align-center gap-20px">
            <h3>Edit Email Address</h3>
            <div class="input-field full-width flex column align-start">
                <span class="input-field-title flex full-width justify-start gap-10px">
                    <h5>Email Address</h5>
                </span>
                <input type="email" name="new-email" value="<?php echo getEventDetail("email"); ?>">
            </div>
            <div class="popup-btns flex justify-center align-center">
                <button>
                    <h3 class="cancel-popup-btn fw-200">Cancel</h3>
                </button>
                <button name="edit-email" type="submit">
                    <h3>Edit</h3>
                </button>
            </div>
        </form>
    </section>

    <section id="delete-prompt-popup" class="popup-bg flex justify-center align-center">
        <form method="POST" class="popup flex column justify-center align-center">
            <input type="hidden" name="newConfig" value="<?php echo isAppLocked() ? "unlock" : "lock"; ?>">
            <h3><?php echo isAppLocked() ? "Unlock Application?" : "Lock Application?"; ?></h3>
            <div class="popup-btns flex justify-center align-center">
                <button id="cancel-deleting-btn">
                    <h3 class="fw-200">Cancel</h3>
                </button>
                <button type="submit" name="lock-btn">
                    <h3><?php echo isAppLocked() ? "Unlock" : "Lock"; ?></h3>
                </button>
            </div>
        </form>
    </section>

    <section id="reset-popup" class="popup-bg flex justify-center align-center">
        <form method="POST" class="popup flex column justify-center align-center">
            <h3>Reset cycle?</h3>
            <div class="popup-btns flex justify-center align-center">
                <button id="cancel-reset-btn">
                    <h3 class="fw-200">Cancel</h3>
                </button>
                <button type="submit" name="reset-cycle-btn">
                    <h3>Reset</h3>
                </button>
            </div>
        </form>
    </section>
</body>
<script src="https://cdn.tiny.cloud/1/pb8kaadv6oyydiiu9gaiyqjing0fqidubtt0085gqft12fxp/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
  tinymce.init({
    selector: 'textarea#about-us-text',
    plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
    tinycomments_mode: 'embedded',
    tinycomments_author: 'Author name',
    mergetags_list: [
      { value: 'First.Name', title: 'First Name' },
      { value: 'Email', title: 'Email' },
    ],
    ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
  });
  tinymce.init({
    selector: 'textarea#gallery-text',
    plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
    tinycomments_mode: 'embedded',
    tinycomments_author: 'Author name',
    mergetags_list: [
      { value: 'First.Name', title: 'First Name' },
      { value: 'Email', title: 'Email' },
    ],
    ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
  });
</script>
<?php include "../includes/components/script.php"; importScripts(['settings']); ?>
</html>