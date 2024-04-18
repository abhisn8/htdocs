const resendBtn = document.querySelector(".resend-otp-btn");
var seconds = 60;
if (resendBtn) {
    resendBtn.disabled = true;
}

function updateTime() {
    if (resendBtn) {
        resendBtn.innerText = `Didn't recieve OTP? Resend OTP in ${seconds} secs.`;
    }
}

const timeInterval = setInterval(() => {
    if (seconds === 0) {
        resendBtn.disabled = false;
        resendBtn.innerText = "Didn't recieve OTP? Click here to resend OTP";
        clearInterval(timeInterval);
    } else {
        seconds--;
        updateTime();
    }
}, 1000);