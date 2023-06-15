<?php
session_start();
function cleanInput($word) {
        $word = stripslashes($word);
        $word = htmlspecialchars($word);
        $word = trim($word);
        return $word;
}


function getRandomToken(){
        return hash('sha256', time() * rand() * 3228432);
    }
?>
