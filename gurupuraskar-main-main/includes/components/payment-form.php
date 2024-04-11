<?php
function paymentForm($charge, $successUrl, $failureUrl, $txnNotifUrl) {
    date_default_timezone_set('Asia/Singapore');

    $PROCESS_URL = "https://test.ipg-online.com/connect/gateway/processing";
    $SUCCESS_URL = $successUrl;
    $FAILURE_URL = $failureUrl;
    $TXNNOTIF = $txnNotifUrl;

    $LANG = "en_EN";
    $HASH_ALGORITHM = "HMACSHA256";

    $CHARGE = $charge;
    $CURRENCY = "356";
    $CHECKOUT_OPTION = "classic";

    $TXNTYPE = "sale";
    $TXNDATE = date("Y:m:d-H:i:s");
    $TXNZONE = "Asia/Singapore";
    $AUTH_TXN = "true";

    $STORE_NAME = "3300002378";

    return <<<DELIMETER
    <form id="pay-form" method="post" action="{$PROCESS_URL}" class="form-buttons full-width">
        <input type="hidden" name="txntype" value="{$TXNTYPE}" readOnly />
        <input type="hidden" name="authenticateTransaction" value="{$AUTH_TXN}" readOnly />
        <input type="hidden" name="timezone" value="{$TXNZONE}" readOnly />
        <input type="hidden" name="checkoutoption" value="{$CHECKOUT_OPTION}" readOnly />
        <input type="hidden" name="txndatetime" value="{$TXNDATE}" readOnly />
        <input type="hidden" name="hash_algorithm" value="{$HASH_ALGORITHM}" readOnly />
        <input type="hidden" name="hashExtended" value="" readOnly />
        <input type="hidden" name="storename" value="{$STORE_NAME}" readOnly />
        <input type="hidden" name="chargetotal" value="{$CHARGE}" readOnly />
        <input type="hidden" name="currency" value="{$CURRENCY}" readOnly />
        <input type="hidden" name="language" value="{$LANG}" readOnly />
        <input type="hidden" name="responseFailURL" value="{$FAILURE_URL}" readOnly />
        <input type="hidden" name="responseSuccessURL" value="{$SUCCESS_URL}" readOnly />
        <input type="hidden" name="transactionNotificationURL" value="{$TXNNOTIF}" readOnly />
        <button type="submit" id="onboarding-2-btn" class="register-btn flex justify-sp-ard align-center">
            <h4>Continue</h4>
            <img src="./assets/svg/right-arrow.svg">
        </button>
    </form>
    DELIMETER;
}

?>