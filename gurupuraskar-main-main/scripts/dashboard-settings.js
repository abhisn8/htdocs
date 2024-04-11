const toggleBtns = document.querySelectorAll(".settings-toggle");
for (let i = 0; i < toggleBtns.length; i++) {
    toggleBtns[i].addEventListener("click", function() {
        for (let j = 0; j < toggleBtns.length; j++) {
            toggleBtns[j].classList.remove("selected");
        }
        this.classList.add("selected");

        switch(i) {
            case 0:
                document.querySelector(".transactions-table").style.display = "none";
                document.querySelector(".user-contact-info").style.display = "flex";
                document.querySelector(".user-details").style.display = window.screen.width < 1024 ? "flex" : "grid";
                break;
            case 1:
                document.querySelector(".user-contact-info").style.display = "none";
                document.querySelector(".user-details").style.display = "none";
                document.querySelector(".transactions-table").style.display = "table";
                break;
            default:
                break;
        }
    });
}

// Script for tool tips
// Selfie popup tool tip
document.querySelector("#selfieToolTipQue").addEventListener("mouseover", () => {
    document.querySelector("#selfieToolTip").style.display = "block";
});
document.querySelector("#selfieToolTipQue").addEventListener("mouseout", () => {
    document.querySelector("#selfieToolTip").style.display = "none";
});

const stateOption = document.querySelector("#user-state");
const districtOption = document.querySelector("#user-district");

const instituteStateOption = document.querySelector("#institute-state");
const instituteDistrictOption = document.querySelector("#institute-district");

const states = data.states;

for (let i = 0; i < states.length; i++) {
    stateOption.innerHTML += `<option value="${states[i].state}">${states[i].state}</option>`;
    instituteStateOption.innerHTML += `<option value="${states[i].state}">${states[i].state}</option>`;
}

stateOption.addEventListener("change", () => {
    districtOption.innerHTML = `<option value="">Select your district</option>`;
    var state = stateOption.value;

    for (let i = 0; i < states.length; i++) {
        if (states[i].state == state) {
            for (let j = 0; j < states[i].districts.length; j++) {
                districtOption.innerHTML += `<option value="${states[i].districts[j]}">${states[i].districts[j]}</option>`;
            }
            break;
        }
    }
});

instituteStateOption.addEventListener("change", () => {
    instituteDistrictOption.innerHTML = `<option value="">Select your district</option>`;
    var state = instituteStateOption.value;

    for (let i = 0; i < states.length; i++) {
        if (states[i].state == state) {
            for (let j = 0; j < states[i].districts.length; j++) {
                instituteDistrictOption.innerHTML += `<option value="${states[i].districts[j]}">${states[i].districts[j]}</option>`;
            }
            break;
        }
    }
});

if (instituteState && instituteState !== "") {
    for (let i = 0; i < states.length; i++) {
        if (states[i].state == instituteState) {
            for (let j = 0; j < states[i].districts.length; j++) {
                if (states[i].districts[j] == instituteDistrict) {
                    instituteDistrictOption.innerHTML += `<option value="${states[i].districts[j]}" selected>${states[i].districts[j]}</option>`;       
                } else {
                    instituteDistrictOption.innerHTML += `<option value="${states[i].districts[j]}">${states[i].districts[j]}</option>`;
                }
            }
            break;
        }
    }
}

if (userState && userState !== "") {
    for (let i = 0; i < states.length; i++) {
        if (states[i].state == userState) {
            for (let j = 0; j < states[i].districts.length; j++) {
                if (states[i].districts[j] == userDistrict) {
                    districtOption.innerHTML += `<option value="${states[i].districts[j]}" selected>${states[i].districts[j]}</option>`;
                } else {
                    districtOption.innerHTML += `<option value="${states[i].districts[j]}">${states[i].districts[j]}</option>`;
                }
            }
            break;
        }
    }
}

// Function for printing the window.
const closeSuccessButton = document.querySelector("#closePrintPopupBtn");
if (closeSuccessButton) {
    closeSuccessButton.addEventListener("click", () => {
        document.querySelector("#printPopup").style.display = "none";
    });   
}

// Function for printing the window.
const printBtn = document.querySelector("#printReceipt");
if (printBtn) {
    const code = printBtn.value;

    printBtn.addEventListener("click", () => {
        window.open(`print.php?r=user&c=${code}`, "_blank");
    });
}