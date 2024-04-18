// Onboarding 1 script.
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

// For selecting the select menus for editing.
if (isEdit) {
    const genderSelect = document.querySelector("#gender-select");
    const userState = document.querySelector("#user-state");
    const userDistrict = document.querySelector("#user-district");
    const insType = document.querySelector("#type-of-institute");
    const userJob = document.querySelector("#job-select");
    const instState = document.querySelector("#institute-state");
    const instDistrict = document.querySelector("#institute-district");

    genderSelect.value = gender;

    insType.value = type;
    userJob.value = job;
}