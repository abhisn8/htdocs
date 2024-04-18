<?php include "includes/components/html-header.php"; displayTitle("Contact Us"); importStyleSheets(['landing-page', 'language-dialog']); ?>
<?php include "admin/includes/functions/events.php"; ?>

<style>
    footer {
        width: 100vw;
        position: absolute;
        bottom: 0;
    }
</style>
<body>
    <header>
        <nav class="navbar flex full-width justify-sp-bt align-center">
            <img width="110px"  src="./assets/img/logo.png" alt="Gurupuraskar Logo">
            <div id="google_translate_element"></div>
        </nav>
    </header>
    <main class="flex gap-20px" style="flex-flow: column;">
        <div>
            <h2>Contact Us</h2>
            <pre>
SAHYOG FOUNDATION,
<?php echo getEventDetail("location") . "\n"; ?>
Mobile: <?php echo getEventDetail("mobile") . "\n"; ?>
Website: <?php echo getEventDetail("website") . "\n"; ?>
Email: <?php echo getEventDetail("email") . "\n"; ?>
            </pre>
        </div>
    </main>
    <?php include "includes/components/index-footer.php"; ?>
</body>
<script>
function googleTranslateElementInit() {
    new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</html>