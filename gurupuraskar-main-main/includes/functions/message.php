<?php
// Function for sending message to a phone number.
function sendMessage($phNum, $message, $dltTemp="1207169945379211111") {
    $url = "http://sms.inosms.com/SMSApi/send";

    $curl = curl_init();
    $data = array(
        "userid" => "yogianish",
        "password" => "yogianis",
        "mobile" => $phNum,
        "senderid" => "GURUPU",
        "dltEntityId" => "1201169848178061614",
        "msg" => $message,
        "sendMethod" => "quick",
        "msgType" => "text",
        "dltTemplateId" => $dltTemp,
        "output" => "json",
        "duplicatecheck" => "true"
    );
    
    $data = http_build_query($data);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $resp = curl_exec($curl);
    
    if ($e = curl_error($curl)) {
        echo $e;
    } else {
        $data = json_decode($resp, true);
        if ($data['status'] === "success") {
            return true;
        }
    }
}

// Function for generating a random OTP.
function generateOTP() {
    return rand(100000, 999999);
}

// Function for creating a message for sending OTP.
function generateMessage($otp) {
    $mess = "{$otp} is your login OTP for Gurupuraskar. OTP is valid for 5 minutes. Please do not share it with anyone. - Sahayog Foundation";
    return $mess;
}

// Function for generating the a message for invite.
function generateInvitation($userName, $refCode) {
    $mess = "Hi! You have been invited to Guru Puraskar by {$userName}. Use this link to join. {$refCode} - Sahayog Foundation";
    return $mess;
}
?>