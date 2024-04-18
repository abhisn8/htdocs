// Function for checking that the user is using PC or mobile.
function isMobileDevice() {
    return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
}
// Image popup script
const imgPopup = document.querySelector(".image-popup-bg");
const closeImg = document.querySelector("#close-img-popup");
const uploadUnit = document.querySelector("#upload-unit");
const uploadControllers = document.querySelector("#upload-controllers");

if (isMobileDevice()) {
    uploadUnit.innerHTML += `<button type="button" id="show-img-popup" style="background-color: var(--color-bright-green); border-radius: 5px; color: #fff; padding: 10px; border: none;">Upload</button>`;
} else {
    uploadUnit.innerHTML += `<input type="file" name="user-img" id="user-img-input" capture="camera" accept="image/*" required>`;
}


const showImgPopup = document.querySelector("#show-img-popup");
const selectCamera = document.querySelector("#select-camera");
const selectUpload = document.querySelector("#select-upload");

if (selectCamera) {
    selectCamera.addEventListener('click', () => {
        closeImg.click();
        uploadControllers.innerHTML = `<input type="file" name="user-img" id="user-img-input" capture="camera" accept="image/*" required>`;
        uploadControllers.querySelector('input').click();
    });
}

if (selectUpload) {
    selectUpload.addEventListener('click', () => {
        closeImg.click();
        uploadControllers.innerHTML = `<input type="file" name="user-img" id="user-img-input" required>`;
        uploadControllers.querySelector('input').click();
    });
}

if (closeImg) {
    closeImg.addEventListener('click', () => {
        imgPopup.style.display = "none";
    });
}

if (showImgPopup) {
    showImgPopup.addEventListener('click', () => {
        imgPopup.style.display = "flex";
    });
}
