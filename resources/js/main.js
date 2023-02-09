// Toggle dropdown menu
// from main navbar
let gNavItem = document.querySelectorAll(".g-nav-item");
document.body.addEventListener("click", function (e) {
    toggleSubMenu(e, gNavItem, "ddown");
});

// Toggle dropdown menu
// from table rows
let rowMenu = document.querySelectorAll(".g-row-item-manager");
document.body.addEventListener("click", function (e) {
    toggleSubMenu(e, rowMenu, "row-toggle");
});

// Toggles dropdown menu from t
// op nav actions navbar (language switcher)
let dropMenu = document.querySelectorAll(".dropped");
document.body.addEventListener("click", function (e) {
    toggleSubMenu(e, dropMenu, "drops");
});

// Show and hide tab nav content
let tabLink = document.querySelectorAll(".s-dsh-tabs-link");
let contentItem = document.querySelectorAll(".s-dsh-content-item");

// Switching between content items;
// (heading's tables)
tabLink.forEach(function (tab, index, arr) {
    tab.addEventListener("click", function () {
        // Removing active state
        updateClass(tabLink, "active");
        // Hiding all content items (tabs)
        document
            .querySelector(".s-dsh-content-item.opened")
            .classList.remove("opened");
        // Adding active state to navbar link
        // that was clicked
        this.classList.add("active");
        // Showing tab that matches the navbar
        // link that was clicked
        contentItem[index].classList.add("opened");
    });
});

// Update Class from a
// selected element
function updateClass(group, className) {
    group.forEach((item) => {
        item.classList.remove(className);
    });
}

// Toggle a dropdown menu
function toggleSubMenu(element, group, targetClass) {
    if (element.target.classList.contains(targetClass)) {
        let parent = element.target.parentElement.classList;
        if (parent.contains("opened")) {
            parent.remove("opened");
        } else {
            updateClass(group, "opened");
            parent.add("opened");
        }
    } else {
        updateClass(group, "opened");
    }
}
