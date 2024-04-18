document.querySelector("#hamburger-btn").addEventListener("click", () => {
    const notifs = document.querySelector(".sidebar");
    notifs.style.display = notifs.style.display === "flex" ? "none" : "flex";
});
document.querySelector("#sidebar-close-btn").addEventListener("click", () => {
    const notifs = document.querySelector(".sidebar");
    notifs.style.display = "none";
});

const donationToggleBtns = document.querySelectorAll(".donation-toggle-btns");
const donationTables = document.querySelectorAll(".donation-table");

for (let i = 0; i < donationToggleBtns.length; i++) {
    donationToggleBtns[i].addEventListener("click", () => {
        disableAllBtns();
        disableAllTables();
        
        enableBtn(donationToggleBtns[i]);

        const tableClass = donationToggleBtns[i].classList[1];
        enableTable(document.querySelector(`tbody.${tableClass}`));
    });
}

function enableTable(table) {
    table.style.display = "contents";
}

function disableAllTables() {
    for (let i = 0; i < donationTables.length; i++) {
        donationTables[i].style.display = "none";
    }
}

function enableBtn(btn) {
    btn.classList.add("selected");
}

function disableAllBtns() {
    for (let i = 0; i < donationToggleBtns.length; i++) {
        donationToggleBtns[i].classList.remove("selected");
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
        window.open(`https://gurupuraskar.com/print.php?r=user&c=${code}`, "_blank");
    });
}