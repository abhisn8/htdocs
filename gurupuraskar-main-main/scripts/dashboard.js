// Code for disabling/enabling the button for submiting reward points.
const rewardBtn = document.querySelector("#reward-btn");
const rewardInput = document.querySelector("#reward-input");
const pointsForm = document.querySelector("#points-form");

// Function for selecting a user's job titles.
const categoriesLabels = document.querySelectorAll(".popup-categories .cat-container");
const categoriesInput = document.querySelectorAll(".popup-categories .cat-container input");
const categoriesForm = document.querySelector("#roles-form");
const submitCategoriesBtn = document.querySelector("#submit-roles");
const categoriesWarning = document.querySelector("#cats-warning");

let selectedCount = 0;

for (let i = 0; i < categoriesInput.length; i++) {
    categoriesInput[i].addEventListener("click", () => {
        if (selectedCount >= 0 && selectedCount <= 16) {
            if (categoriesInput[i].checked) {
                categoriesLabels[i].classList.add("selected");
                selectedCount++;
                console.log(selectedCount);
            } else {
                categoriesLabels[i].classList.remove("selected");
                selectedCount--;
                console.log(selectedCount);
            }
        }
        // if (selectedCount < 3) {
        // } else {
        //     categoriesLabels[i].classList.remove("selected");
        //     selectedCount--;
        // }
    });
}

if (submitCategoriesBtn) {
    submitCategoriesBtn.addEventListener("click", (e) => {
        e.preventDefault();
        if (selectedCount >= 1) {
            categoriesForm.submit();
        } else {
            categoriesWarning.style.display = "block";
        }
    });
}

// Closes the success popup.
let continueBtn = document.querySelector(".continue-success-btn");
if (continueBtn) {
    continueBtn.addEventListener("click", () => {
        document.querySelector(".success-popup-bg").style.display = "none";
    });
}

const closeBtn1 = document.querySelector(".popup-close-btn");
if (closeBtn1) {
    closeBtn1.addEventListener("click", () => {
        document.querySelector(".popup-categories-bg").style.display = "none";
    });
}

const closeBtn = document.querySelector("#popup-form-close-btn");
if (closeBtn) {
    closeBtn.addEventListener("click", () => {
        console.log("Clicked");
        document.querySelector(".popup-form-bg").style.display = "none";
    });
}

// Displays leaderboard for all india and district.
const allButton = document.querySelector("#show-all-btn");
const districtButton = document.querySelector("#show-district-btn");

const allLeaderboard = document.querySelector("#pan-india-leaderboard");
const districtLeaderboard = document.querySelector("#district-leaderboard");

allButton.addEventListener("click", () => {
    districtLeaderboard.style.display = "none";
    districtButton.querySelector("h3").classList.remove("selected");
    allLeaderboard.style.display = "flex";
    allButton.querySelector("h3").classList.add("selected");
});

districtButton.addEventListener("click", () => {
    allLeaderboard.style.display = "none";
    allButton.querySelector("h3").classList.remove("selected");
    districtLeaderboard.style.display = "flex";
    districtButton.querySelector("h3").classList.add("selected");
});

// Script for opening and closing the event details' popup.
const showDetailsBtn = document.querySelector("#showEventDetailsBtn");
const detailsPopup = document.querySelector("#eventDetailsPopup");
const closeDetailsBtn = document.querySelector("#closeDetailsBtn");

showDetailsBtn.addEventListener("click", () => {
    detailsPopup.style.display = "flex";
});
closeDetailsBtn.addEventListener("click", () => {
    detailsPopup.style.display = "none";
});

// Scripts for tooltips.
// Score tooltip
document.querySelector("#dashToolTipQue").addEventListener("mouseover", () => {
    document.querySelector("#scoreToolTip").style.display = "block";
});
document.querySelector("#dashToolTipQue").addEventListener("mouseout", () => {
    document.querySelector("#scoreToolTip").style.display = "none";
});
// Require ARP tool tip
document.querySelector("#arpToolTipQue").addEventListener("mouseover", () => {
    document.querySelector("#requiredArpToolTip").style.display = "block";
});
document.querySelector("#arpToolTipQue").addEventListener("mouseout", () => {
    document.querySelector("#requiredArpToolTip").style.display = "none";
});
// Review popup tool tip
const reviewToolTipQue = document.querySelector("#reviewToolTipQue");
const reviewToolTip = document.querySelector("#reviewToolTip");

if (reviewToolTipQue) {
    reviewToolTipQue.addEventListener("mouseover", () => {
        reviewToolTip.style.display = "block";
    });
    reviewToolTipQue.addEventListener("mouseout", () => {
        reviewToolTip.style.display = "none";
    });
}