// document.querySelector("#download-csv").addEventListener("click", () => {
//     alert("downloading...");
// });
document.querySelector("#hamburger-btn").addEventListener("click", () => {
    const notifs = document.querySelector(".sidebar");
    notifs.style.display = notifs.style.display === "flex" ? "none" : "flex";
});
document.querySelector("#sidebar-close-btn").addEventListener("click", () => {
    const notifs = document.querySelector(".sidebar");
    notifs.style.display = "none";
});

// Onboarding 1 script.
const stateOption = document.querySelector("#user-state");
const districtOption = document.querySelector("#user-district");
const states = data.states;

for (let i = 0; i < states.length; i++) {
    stateOption.innerHTML += `<option value="${states[i].state}">${states[i].state}</option>`;
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