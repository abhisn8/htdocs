<?php
// Function for importing all the scripts.
function importScripts($scripts) {
    foreach ($scripts as $scr) {
        echo "<script src='./scripts/{$scr}.js'></script>";
    }
}
?>