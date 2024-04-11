// Function for implementing the toggle button functionality.
const toggleBtns = document.querySelectorAll(".nav-toggles"); // All the buttons.
const toggleTables = document.querySelectorAll(".toggle-tables"); // All the tables.

for (let i = 0; i < toggleBtns.length; i++) {
    toggleBtns[i].addEventListener("click", () => {
        removeSelected(toggleBtns);
        removeSelected(toggleTables);
        toggleBtns[i].classList.toggle("selected");
        toggleTables[i].classList.toggle("selected");
    });
}


// Function for removing all the buttons/tables from selected position.
function removeSelected(l) {
    for (let i = 0; i < l.length; i++) {
        l[i].classList.remove("selected");
    }
}
// Function for adding all the buttons/tables from selected position.
function addSelected(l) {
    for (let i = 0; i < l.length; i++) {
        l[i].classList.add("selected");
    }
}

document.querySelector("#get-arp-btn").addEventListener("click", () => {
    document.querySelector(".points-converter-bg").style.display = "flex";
});

// Closes points converter.
const closeConverterBtn = document.querySelectorAll("#close-converter-btn");
const pointsPopups = document.querySelectorAll(".points-converter-bg");

if (closeConverterBtn) {
    for (let i = 0; i < closeConverterBtn.length; i++) {
        closeConverterBtn[i].addEventListener("click", () => {
            for (let j = 0; j < pointsPopups.length; j++) {
                pointsPopups[j].style.display = "none";
            }
        });
    }
}

// Payment Form
const payForm = document.querySelector("#convert-rp-form");
const payBtn = document.querySelector("#convert-arp-btn");
const pointsInput = document.querySelector("[name=points-needed]");
let points = "";
const warn = document.querySelector("#warn-rp");

payBtn.addEventListener("click", () => {
    points = Number(pointsInput.value);

    if (points !== "" && points >= 10 && points <= maxPoints) {
        console.log(points);

        payForm.submit();
    } else {
        if (points > maxPoints) {
            warn.style.display = "block";
            warn.innerHTML = `You don’t have any RP to convert to ARP`;
        } else if(points === "") {
            warn.style.display = "block";
            warn.innerHTML = `Please enter a valid amount of score.`;
        } else if (points < 10) {
            warn.style.display = "block";
            warn.innerHTML = `Points should be greater than 10.`;
        }
    }
});

const closePaySuccess = document.querySelector("#closePaymentSuccess");
if (closePaySuccess) {
    closePaySuccess.addEventListener("click", () => {
        document.querySelector("#paySuccessPopup").style.display = "none";
    });
}

const donateBtn = document.querySelector("#donate-btn");
const donateForm = document.querySelector("#donation-form");

if (donateBtn) {
    donateBtn.addEventListener("click", () => {
        document.querySelector("#points-converter").style.display = "none";
        donateForm.style.display = "flex";
    });
}

// Copies the referral code to the clipboard of user.
const copyBtn = document.querySelector(".copy-btn");
const code = document.querySelector("#referral-code").innerText;
if (copyBtn) {
    copyBtn.addEventListener("click", () => {
        navigator.clipboard.writeText(code).then(() => {
            alert(`Copied to clipboard.`)
        }).catch(err => {
            console.error('Unable to copy text to clipboard', err);
        });
    })
}

// Script for donation of 
const donateAmountBtn = document.querySelector("#donateAmountBtn");
const donationForm = document.querySelector("#donationForm");
const donationAmount = document.querySelector("#donationAmount");
const donationWarning = document.querySelector("#warn-donation");

donateAmountBtn.addEventListener("click", (e) => {
    const amount = donationAmount.value;
    e.preventDefault();
    if (amount !== "" && amount >= 10) {
        console.log("donated");
        donationForm.submit();
    } else {
        if (amount < 10) {
            donationWarning.innerText = "Donation amount should be greater than 10 rupees";
        } else {
            donationWarning.innerText = "Please enter a valid amount";
        }
    }
});