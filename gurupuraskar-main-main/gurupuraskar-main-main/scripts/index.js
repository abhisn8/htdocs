// Function for closing the popup of failure of payment.
const closeFailButton = document.querySelector("#closePaymentFailBtn");

if (closeFailButton) {
    closeFailButton.addEventListener("click", () => {
        window.location.href = "index.php"; // Redirects the user to index page.
    });
}

// Function for printing the window.
const closeSuccessButton = document.querySelector("#closePaySuccessBtn");
if (closeSuccessButton) {
    closeSuccessButton.addEventListener("click", () => {
        window.location.href = "index.php"; // Redirects the user to index page.
    });   
}

// Function for printing the window.
const printBtn = document.querySelector("#printReceipt");
if (printBtn) {
    const name = document.querySelector("#userName").innerText;
    const email = document.querySelector("#userEmail").innerText;
    const phone = document.querySelector("#userPhn").innerText;
    const pan = document.querySelector("#userPan").innerText;
    const amnt = document.querySelector("#userAmnt").innerText;
    const date = document.querySelector("#userDate").innerText;
    const ref = document.querySelector("#userRef").innerText;

    printBtn.addEventListener("click", () => {
        window.open(`print.php?r=donation&name=${name}&email=${email}&phone=${phone}&pan=${pan}&amount=${amnt}&date=${date}&ref=${ref}`, "_blank");
    });
}