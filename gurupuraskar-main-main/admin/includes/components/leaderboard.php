<?php
// Function for getting the first user on leaderboard.
function firstUserInLeaderboard($rank, $name, $addr, $point) {
    return <<<DELIMETER
    <div class="score full-width first">
        <h4 class="score-number">{$rank}.</h4>
        <div class="score-details flex column gap-5px">
            <div class="row-1 full-width flex justify-sp-bt align-center">
                <h4 class="name">{$name}</h4>
                <div class="stars flex justify-center align-center gap-5px">
                    <img src="./../assets/svg/star-gold.svg">
                    <img src="./../assets/svg/star-gold.svg">
                    <img src="./../assets/svg/star-gold.svg">
                </div>
            </div>
            <div class="row-2 full-width flex justify-sp-bt align-center">
                <h4 class="address fw-200">{$addr}</h4>
                <h4 class="score-points fw-200">{$point} points</h4>
            </div>
        </div>
    </div>
    DELIMETER;
}

// Function for getting the second user on leaderboard.
function secondUserInLeaderboard($rank, $name, $addr, $point) {
    return <<<DELIMETER
    <div class="score full-width second">
        <h4 class="score-number">{$rank}.</h4>
        <div class="score-details flex column gap-5px">
            <div class="row-1 full-width flex justify-sp-bt align-center">
                <h4 class="name">{$name}</h4>
                <div class="stars flex justify-center align-center gap-5px">
                    <img src="./../assets/svg/star-silver.svg">
                    <img src="./../assets/svg/star-silver.svg">
                    <img src="./../assets/svg/star-silver.svg">
                </div>
            </div>
            <div class="row-2 full-width flex justify-sp-bt align-center">
                <h4 class="address fw-200">{$addr}</h4>
                <h4 class="score-points fw-200">{$point} points</h4>
            </div>
        </div>
    </div>
    DELIMETER;
}

// Function for getting the third user on leaderboard.
function thirdUserInLeaderboard($rank, $name, $addr, $point) {
    return <<<DELIMETER
    <div class="score full-width third">
        <h4 class="score-number">{$rank}.</h4>
        <div class="score-details flex column gap-5px">
            <div class="row-1 full-width flex justify-sp-bt align-center">
                <h4 class="name">{$name}</h4>
                <div class="stars flex justify-center align-center gap-5px">
                    <img src="./../assets/svg/star-bronze.svg">
                    <img src="./../assets/svg/star-bronze.svg">
                    <img src="./../assets/svg/star-bronze.svg">
                </div>
            </div>
            <div class="row-2 full-width flex justify-sp-bt align-center">
                <h4 class="address fw-200">{$addr}</h4>
                <h4 class="score-points fw-200">{$point} points</h4>
            </div>
        </div>
    </div>
    DELIMETER;
}

// Function for getting a user in leaderboard.
function userInLeaderboard($rank, $name, $addr, $point) {
    echo <<<DELIMETER
    <div class="score full-width">
        <h4 class="score-number">{$rank}.</h4>
        <div class="score-details flex column gap-5px">
            <div class="row-1 full-width flex justify-sp-bt align-center">
                <h4 class="name">{$name}</h4>
            </div>
            <div class="row-2 full-width flex justify-sp-bt align-center">
                <h4 class="address fw-200">{$addr}</h4>
                <h4 class="score-points fw-200">{$point} points</h4>
            </div>
        </div>
    </div>
    DELIMETER;
}
?>