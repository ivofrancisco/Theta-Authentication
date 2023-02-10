// import './bootstrap';
import FileManager from "./FileManager";

// Instantiating file manager
const fileManager = new FileManager();

// Opening file folder
document.addEventListener("click", function (e) {
    if (e.target.classList.contains("clickable")) {
        fileManager.open(e);
    }
});

// Change file information
document.body.addEventListener("change", function (e) {
    if (e.target.classList.contains("photo")) {
        fileManager.replaceFile(e.target);
    }
});
