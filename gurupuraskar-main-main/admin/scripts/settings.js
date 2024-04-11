document.querySelector("#hamburger-btn").addEventListener("click", () => {
    const notifs = document.querySelector(".sidebar");
    notifs.style.display = notifs.style.display === "flex" ? "none" : "flex";
});
document.querySelector("#sidebar-close-btn").addEventListener("click", () => {
    const notifs = document.querySelector(".sidebar");
    notifs.style.display = "none";
});

const editBtns = document.querySelectorAll(".edit-popup-btns");
const cancelBtns = document.querySelectorAll(".cancel-popup-btn");

editBtns[0].addEventListener("click", () => {
    document.querySelector("#edit-date-form").style.display = "flex";
});
editBtns[1].addEventListener("click", () => {
    document.querySelector("#edit-time-form").style.display = "flex";
});
editBtns[2].addEventListener("click", () => {
    document.querySelector("#edit-address-form").style.display = "flex";
});
editBtns[3].addEventListener("click", () => {
    document.querySelector("#edit-price-form").style.display = "flex";
});
editBtns[4].addEventListener("click", () => {
    document.querySelector("#edit-location-form").style.display = "flex";
});
editBtns[5].addEventListener("click", () => {
    document.querySelector("#edit-mobile-form").style.display = "flex";
});
editBtns[6].addEventListener("click", () => {
    document.querySelector("#edit-website-form").style.display = "flex";
});
editBtns[7].addEventListener("click", () => {
    document.querySelector("#edit-email-form").style.display = "flex";
});


cancelBtns[0].addEventListener("click", () => {
    document.querySelector("#edit-date-form").style.display = "none";
});
cancelBtns[1].addEventListener("click", () => {
    document.querySelector("#edit-time-form").style.display = "none";
});
cancelBtns[2].addEventListener("click", () => {
    document.querySelector("#edit-address-form").style.display = "none";
});
cancelBtns[3].addEventListener("click", () => {
    document.querySelector("#edit-price-form").style.display = "none";
});
cancelBtns[4].addEventListener("click", () => {
    document.querySelector("#edit-location-form").style.display = "none";
});
cancelBtns[5].addEventListener("click", () => {
    document.querySelector("#edit-mobile-form").style.display = "none";
});
cancelBtns[6].addEventListener("click", () => {
    document.querySelector("#edit-website-form").style.display = "none";
});
cancelBtns[7].addEventListener("click", () => {
    document.querySelector("#edit-email-form").style.display = "none";
});

const lockBtn = document.querySelector(".lock-btn");
const lockPopup = document.querySelector("#delete-prompt-popup");
const cancelBtn = document.querySelector("#cancel-deleting-btn");

lockBtn.addEventListener("click", () => {
    lockPopup.style.display = "flex";
});

cancelBtn.addEventListener("click", () => {
    lockPopup.style.display = "none";
});

const resetBtn = document.querySelector(".reset-btn");
const resetPopup = document.querySelector("#reset-popup");
const cancelResetBtn = document.querySelector("#cancel-reset-btn");

resetBtn.addEventListener("click", () => {
    resetPopup.style.display = "flex";
});

cancelResetBtn.addEventListener("click", () => {
    resetPopup.style.display = "none";
});