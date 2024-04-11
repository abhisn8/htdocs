// Opens and closes the sidebar  on the mobile.
document.querySelector("#hamburger-btn").addEventListener("click", () => {
    const notifs = document.querySelector(".sidebar");
    notifs.style.display = notifs.style.display === "flex" ? "none" : "flex";
});
document.querySelector("#sidebar-close-btn").addEventListener("click", () => {
    const notifs = document.querySelector(".sidebar");
    notifs.style.display = "none";
});
document.querySelector("#cancel-deleting-btn").addEventListener("click", () => {
    document.querySelector("#delete-prompt-popup").style.display = "none";
});

const textBtn = document.querySelector("#add-text-field");
const numberBtn = document.querySelector("#add-number-field");
const mcqBtn = document.querySelector("#add-mcq-field");
const selectBtn = document.querySelector("#add-select-field");
const saForm = document.querySelector(".sa-form-questions");

textBtn.addEventListener("click", () => {
    const qCode = generateRandomCode(15);

    saForm.innerHTML += `
    <li class="input-field">
        <p>Start typing your question here. (Text field)</p>
        <input type="text" name="${qCode}-question" placeholder="Type your question">
    </li>
    `
    sendQuestionData(qCode, "text");
});

numberBtn.addEventListener("click", () => {
    const qCode = generateRandomCode(15);
    
    saForm.innerHTML += `
    <li class="input-field">
        <p>Start typing your question here. (Number field)</p>
        <input type="text" name="${qCode}-question" placeholder="Type your question">
    </li>
    `
    sendQuestionData(qCode, "number");
});

mcqBtn.addEventListener("click", () => {
    const qCode = generateRandomCode(15);

    saForm.innerHTML += `
    <li class="input-field">
        <p>Start typing your question here. (Multiple Choice)</p>
        <input type="text" name="${qCode}-question" placeholder="Type your question">
        <input type="text" name="${qCode}-options" placeholder="Type your choices separated by commas (E.g. choice 1,choice 2,etc)">
    </li>
    `

    sendQuestionData(qCode, "mcq");
});

selectBtn.addEventListener("click", () => {
    const qCode = generateRandomCode(15);

    saForm.innerHTML += `
    <li class="input-field">
        <p>Start typing your question here. (Dropdown)</p>
        <input type="text" name="${qCode}-question" placeholder="Type your question">
        <input type="text" name="${qCode}-options" placeholder="Type your choices separated by commas (E.g. choice 1,choice 2,etc)">
    </li>
    `

    sendQuestionData(qCode, "dropdown");
});

function generateRandomCode(length) {
    const characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    let randomCode = '';
    
    for (let i = 0; i < length; i++) {
      const randomIndex = Math.floor(Math.random() * characters.length);
      randomCode += characters.charAt(randomIndex);
    }

    return randomCode;
}

function sendQuestionData(qCode, qType) {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", `../api/questions/questions.php?q=add&qCode=${qCode}&qType=${qType}`, true);
    xhr.onload = function () {
        if (xhr.status >= 200 && xhr.status < 300) {
            // Successful response
            var response = xhr.responseText;
            console.log(response);
        } else {
            console.error("Request failed with status: " + xhr.status);
        }
    };
    xhr.send();
}

const addChoiceBtns = document.querySelectorAll(".add-choice-btn");
const deletePrompt = document.querySelector("#delete-prompt-popup");

for (let i = 0; i < addChoiceBtns.length; i++) {
    addChoiceBtns[i].addEventListener("click", () => {
        addChoiceBtns[i].parentNode.parentNode.querySelector(".new-choice-input").style.display = "block";
    });
}

const deleteQuestionsBtns = document.querySelectorAll(".deleteQuestion");
for (let i = 0; i < deleteQuestionsBtns.length; i++) {
    deleteQuestionsBtns[i].addEventListener("click", () => {
        deletePrompt.style.display = "flex";
        deletePrompt.querySelector("input").value = deleteQuestionsBtns[i].id;
    });
}