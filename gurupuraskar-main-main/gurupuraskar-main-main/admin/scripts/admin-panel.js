document.querySelector("#close-user-sa-form").addEventListener("click", () => {
    document.querySelector(".popup-form-bg").style.display = "none";
});
document.querySelector("#hamburger-btn").addEventListener("click", () => {
    const notifs = document.querySelector(".sidebar");
    notifs.style.display = notifs.style.display === "flex" ? "none" : "flex";
});
document.querySelector("#sidebar-close-btn").addEventListener("click", () => {
    const notifs = document.querySelector(".sidebar");
    notifs.style.display = "none";
});
document.querySelector("#block-btn").addEventListener("click", () => {
    const notifs = document.querySelector("#prompt-popup");
    notifs.style.display = "flex";
});
document.querySelector("#cancel-blocking-btn").addEventListener("click", () => {
    const notifs = document.querySelector("#prompt-popup");
    notifs.style.display = "none";
});
document.querySelector("#delete-btn").addEventListener("click", () => {
    const notifs = document.querySelector("#delete-prompt-popup");
    notifs.style.display = "flex";
});
document.querySelector("#cancel-deleting-btn").addEventListener("click", () => {
    const notifs = document.querySelector("#delete-prompt-popup");
    notifs.style.display = "none";
});
// document.querySelector("#edit-score-btn").addEventListener("click", () => {
//     const notifs = document.querySelector("#form-popup");
//     notifs.style.display = "flex";
// });

document.querySelector("#form-cancel-btn").addEventListener("click", () => {
    const notifs = document.querySelector("#form-popup");
    notifs.style.display = "none";
});
document.querySelector("#view-acc-btn").addEventListener("click", () => {
    document.querySelector(".bottom-popup-title").innerText = "Account";
    const notifs = document.querySelector(".bottom-popup-bg");
    notifs.style.display = "block";
    // document.querySelector(".bottom-popup").style.display = "block";
    document.querySelector(".user-details").style.display = "grid";
});
document.querySelector("#close-bottom-popup").addEventListener("click", () => {
    const notifs = document.querySelector(".bottom-popup-bg");
    notifs.style.display = "none";
    // document.querySelector(".bottom-popup").style.display = "none";
    document.querySelector(".user-details").style.display = "none";
    document.querySelector(".transactions-table").style.display = "none";
    document.querySelector(".points-table").style.display = "none";
    // document.querySelector(".bottom-popup").style.display = "none";
});

const popupBtn = document.querySelector("#popup-form-close-btn");
if (popupBtn) {
    popupBtn.addEventListener("click", () => {
        const notifs = document.querySelector(".popup-form-bg");
        notifs.style.display = "none";
    });
}

document.querySelector(".sa-btn").addEventListener("click", () => {
    const notifs = document.querySelector(".popup-form-bg");
    notifs.style.display = "flex";
});
document.querySelector("#view-donations-btn").addEventListener("click", () => {
    document.querySelector(".bottom-popup-title").innerText = "Transactions";
    const notifs = document.querySelector(".bottom-popup-bg");
    notifs.style.display = "block";
    // document.querySelector(".bottom-popup").style.display = "block";
    document.querySelector(".transactions-table").style.display = "table";
});

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

// Opens the points tables for score, ARP and RP.
function showHistoryPopup(btn = null) {
    document.querySelector(".bottom-popup-title").innerText = "Points Activity";
    const notifs = document.querySelector(".bottom-popup-bg");
    notifs.style.display = "block";
    document.querySelector(".points-table").style.display = "block";

    if (btn !== null) {
        toggleBtns[btn].click();
    }
}
// document.querySelector("#score-history-btn").addEventListener("click", () => {
//     showHistoryPopup();
// });
document.querySelector("#arp-history-btn").addEventListener("click", () => {
    showHistoryPopup(1);
});
document.querySelector("#rp-history-btn").addEventListener("click", () => {
    showHistoryPopup(2);
});

// Code for editting the score, arp and rp.
function displayEditScorePopup(scoreType) {
    document.querySelector("#form-popup").style.display = "flex";
    document.querySelector("#score-name").innerText = scoreType;
    document.querySelector("#score-type").value = scoreType;
    document.querySelector("#score-title").innerText = "edit " + scoreType;
    return true;
}

document.querySelector("#edit-score-btn").addEventListener("click", () => {
    displayEditScorePopup("score");
});
document.querySelector("#edit-arp-btn").addEventListener("click", () => {
    displayEditScorePopup("arp");
});
document.querySelector("#edit-rp-btn").addEventListener("click", () => {
    displayEditScorePopup("rp");
});
document.querySelector(".view-all-btn").addEventListener("click", () => {
    showHistoryPopup();
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