document.addEventListener("DOMContentLoaded", () => {
    const profileButton = document.getElementById("profileButton");
    const profileDropdown = document.getElementById("profileDropdown");

    profileButton?.addEventListener("click", (e) => {
        profileDropdown?.classList.toggle("hidden");
        e.stopPropagation();
    });

    document.addEventListener("click", (e) => {
        if (!profileButton.contains(e.target) && !profileDropdown.contains(e.target)) {
            profileDropdown.classList.add("hidden");
        }
    });

    document.addEventListener("click", (e) => {
        if (!e.target.closest(".group")) {
            closeAllMenus();
        }
    });
});

function toggleMenu(button) {
    const menu = button.nextElementSibling;
    closeAllMenus();
    menu?.classList.toggle("hidden");
}

function closeAllMenus() {
    document.querySelectorAll(".group .absolute > div").forEach(el => {
        el.classList.add("hidden");
    });
}
