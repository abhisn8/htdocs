<?php include "includes/config/db.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Anubhav Shavaran">

    <?php
    // Function displays the title of the page.
    function displayTitle($string) {
        echo "<title>{$string}</title>";
    }
    ?>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&amp;display=swap">
    <link rel="stylesheet" href="./css/base.css">

    <?php
    // Function imports all the stylesheets required for the page.
    function importStyleSheets ($styleSheets) {
        foreach ($styleSheets as $styleSheet) {
            echo "<link rel='stylesheet' href='./css/{$styleSheet}.css'>";
        }
    }
    ?>
    <link rel="shortcut icon" href="./assets/img/favicon.ico" type="image/x-icon">
</head>