import "./utilities";

import FileManager from "./FileManager";
import ThetaEditor from "./ThetaEditor";

/**
 * Instantiating file manager
 */
const fileManager = new FileManager();

/**
 * File upload related tasks
 */
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

/**
 * Instantiating ThetaEditor editor class
 */
const editor = new ThetaEditor();
// Iframe element
let iframe = document.querySelector("#richTextEditor");

/**
 * Gallery related tasks
 */

// FIle uploader wrapper
let uploads = document.querySelector(".s-uploads-wrapper");

// Changing file information on
// uploader element
document.body.addEventListener("change", function (e) {
    if (e.target.classList.contains("empty")) {
        fileManager.replaceFile(e.target);
        fileManager.addUploader(uploads);
    } else if (e.target.classList.contains("photo")) {
        fileManager.replaceFile(e.target);
    }
});

// Removing a specific photo from the DOM
document.querySelectorAll(".removable").forEach(function (icon) {
    icon.addEventListener("click", function () {
        fileManager.removeFile(this, "remove[]");
    });
});
