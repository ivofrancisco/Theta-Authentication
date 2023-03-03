/**
 * Manages files
 */
class FileManager {
    //Open file upload dialog box
    open(element) {
        element.target.nextElementSibling.click();
    }

    //Open project file upload dialog box
    openProjectUploader(element) {
        element.target.previousElementSibling.click();
    }

    // Select image file and Allows
    // users to see the file name before uploading
    select(element) {
        const imgFile = element.files[0];
        element.previousElementSibling.children[1].style.opacity = "1";
        element.previousElementSibling.children[1].textContent = imgFile.name;
        //element.classList.remove("empty");
    }

    // Remove a specified file
    // from the DOM
    removeFile(element, attr) {
        element.parentElement.children[2].setAttribute("name", attr);
        element.parentElement.style.display = "none";
    }

    // Display image file
    // selected by user
    replaceFile(element) {
        const imgFile = element.files[0];
        let imagePreview = element.previousElementSibling;
        if (imgFile) {
            const reader = new FileReader();
            reader.addEventListener("load", function () {
                imagePreview.setAttribute("src", this.result);
            });
            reader.readAsDataURL(imgFile);
            //element.classList.remove("empty");
        }
    }

    // Inserts file uploader into the DOM
    addUploader(wrapper) {
        let div = document.createElement("div");
        div.setAttribute("class", "g-uploader loaded gallery");
        const uploader = `
            <img src="/storage/images/add_image.svg" class="clickable" alt="upload image">
            <input type="file" name="photos[]" class="photo empty" style="display: none">
        `;
        div.innerHTML = uploader;
        wrapper.appendChild(div);
    }
}

export default FileManager;
