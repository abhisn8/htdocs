<?php
include_once "includes/config/db.php";
include_once "includes/functions/security.php";
include_once "includes/functions/cookies.php";
include_once "includes/functions/paymentGateway.php";
include_once "includes/functions/user.php";
include_once "includes/functions/small-data.php";

if (isset($_POST) && isset($_POST['Total_Amount']) && $_POST['Response_Code'] === 'E000') {
    // Fetches data from the server
    $data = $_POST; // Stores the data in a variable.
    $sResponseCode = $data['Response_Code']; // Stores the response code in a variable.
    $sReferenceNo = $data['ReferenceNo']; // Stores the reference number in a variable.
    $sAmount = $data['Total_Amount']; // Stores the amount in a variable.
    $sOptionals = explode("|", strval($data['optional_fields'])); // Stores the optional fields in a variable.
    $process = $sOptionals[1]; // Stores the process in a variable.
    $amount = intval($data["Total_Amount"]);

    $refNum = $data['Unique_Ref_Number']; // Stores the unique reference number in a variable.
    $date = $data['Transaction_Date']; // Stores the transaction date in a variable.
    $manFields = $data['mandatory_fields']; // Stores the mandatory fields in a variable.
    $pan = $sOptionals[0];

    // Redirects the user on the basis of the process.
    switch ($process) {
        case 'onboarding':
            // Redirects the user to the onboarding page if payment is successful.
            if (!isset($_COOKIE['user_code'])) {
                $uc = getSmallData($sReferenceNo, "onboarding");
                $referrer = getReferrer($sReferenceNo);

                if ($referrer) {
                    // $_SESSION['referrer'] = $referrer;
                    // $_SESSION['referred'] = "true";
                    createCookieForMonth("referrer", $referrer);
                    createCookieForMonth("referred", "true");
                }

                // $_SESSION['user_code'] = $uc;
                createCookieForMonth("user_code", $uc);
                deleteSmallData($sReferenceNo);
                
                header("Location: onboarding2.php?paymentStatus=success");
            }

            header("Location: onboarding2.php?paymentStatus=success");
            break;
            
        case 'points':
            // Redirects the user to the dashboard if payment is successful.
            $points = $amount * 1.5;
            redirectWithQuery("dashboard-pts", "paymentStatus=success&points=" . $points . "&case=case");
            break;

        case 'arpCoversion':
            // Redirects the user to the dashboard if payment is successful.
            $points = $amount * 10;
            redirectWithQuery("dashboard-pts", "paymentStatus=success&points=" . $points . "&case=arp");
            break;

        case 'donation':
            redirectWithQuery("index", "paymentStatus=success&amount={$amount}&ref={$refNum}&date={$date}&manFields={$manFields}&pan={$pan}");
            break;

        case 'dashDonation':
            redirectWithQuery("dashboard", "paymentStatus=success&amount={$amount}");
            break;

        case 'dashPtsDonation':
            redirectWithQuery("dashboard-pts", "donationPaymentStatus=success&amount={$amount}");
            break;

        case 'dashSettingsDonation':
            redirectWithQuery("dashboard-settings", "paymentStatus=success&amount={$amount}");
            break;
    }
} else {
    if (isset($_POST['Response_Code'])) {
        $sOptionals = explode("|", strval($_POST['optional_fields'])); // Stores the optional fields in a variable.
        $process = $sOptionals[1]; // Stores the process in a variable.

        $sMandatory = explode("|", strval($_POST['mandatory_fields'])); // Stores the mandatory fields in a variable.
        $amount = $sMandatory[2]; // Stores the amount in a variable.

        $responseCode = $_POST['Response_Code']; // Gets the response code.
        $name = $sMandatory[3]; // Gets the name.

        // Redirects the user on the basis of the process.
        switch ($process) {
            case 'onboarding':
                // Redirects the user to the onboarding page if payment is successful.
                if (!isset($_COOKIE['user_code'])) {
                    $uc = getSmallData($sReferenceNo, "onboarding");
                    $referrer = getReferrer($sReferenceNo);

                    if ($referrer) {
                        // $_SESSION['referrer'] = $referrer;
                        // $_SESSION['referred'] = "true";
                        createCookieForMonth("referrer", $referrer);
                        createCookieForMonth("referred", "true");
                    }

                    // $_SESSION['user_code'] = $uc;
                    createCookieForMonth("user_code", $uc);
                    deleteSmallData($sReferenceNo);
                    
                    header("Location: onboarding2.php?paymentStatus=fail&fm={$responseCode}");
                }

                redirectWithQuery("onboarding2", "paymentStatus=fail&fm={$responseCode}"); 
                break;

            case 'points':
                $points = $amount * 1.5;
                redirectWithQuery("dashboard-pts", "paymentStatus=fail&points=" . $points . "&case=case&fm={$responseCode}");
                break;

            case 'arpCoversion':
                $points = $amount * 10;
                redirectWithQuery("dashboard-pts", "paymentStatus=fail&points=" . $points . "&case=arp&fm={$responseCode}");
                break;

            case 'donation':
                redirectWithQuery("index", "paymentStatus=fail&fm={$responseCode}&amount={$amount}&name={$name}");
                break;

            case 'dashDonation':
                redirectWithQuery("dashboard", "paymentStatus=fail&amount={$amount}");
                break;
            
            case 'dashPtsDonation':
                redirectWithQuery("dashboard-pts", "donationPaymentStatus=fail&amount={$amount}");
                break;
            
            case 'dashSettingsDonation':
                redirectWithQuery("dashboard-settings", "paymentStatus=fail&amount={$amount}");
                break;
        }
    } else {
        redirect("index");
    }
}
?>

<!-- [Response_Code] => E000 
[Unique_Ref_Number] => 231219172436850  y
[Service_Tax_Amount] => 0.00
[Processing_Fee_Amount] => 0.00
[Total_Amount] => 1.00 y
[Transaction_Amount] => 1
[Transaction_Date] => 19-12-2023 12:17:35 y
[Interchange_Value] => 
[TDR] => 
[Payment_Mode] => UPI_ICICI
[SubMerchantId] => 20
[ReferenceNo] => 777428
[ID] => 379373
[RS] => 5cc913dc672d81ef14a23811ef9379412740daeebb39e864c23eb346c253fed74271495643d72815e166a1a43c48e4d018c93780c7b65d324b879e0958f51c3c
[TPS] => null
[mandatory_fields] => 777428|20|1|Anubhav Shavaran y|Muzaffarpur|Bihar|anubhavshavaran5678@gmail.com|9162686133|sahyog foundation|0|19/Dec/2023
[optional_fields] => ABCDE1234F|
[RSV] => 2fa5af3a63906a9c60f1c77d9176524be39038e4149c8723682cb16da2f196e2e1f373ce9e2cd2118b314e4b22a22926f8c19905d0733c6f7db2b15d3eaeaa5c -->