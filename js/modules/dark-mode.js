export function darkmode() {
    const themeEnable = document.querySelector("#theme-enable");
    const currentTheme = localStorage.getItem("theme");
    const hamburgerIcon = document.querySelector("#hamburger-menu img")
    const headerLogo = document.querySelector("#header-logo img")
    let theme = currentTheme || "light";

    function changeTheme() {
        const changeElements = document.querySelectorAll(".dm");
        const themeText = document.querySelector("#theme-text");
        const themeImage = document.querySelector("#theme-image");

        if (theme === "dark") {
            changeElements.forEach(element => element.classList.remove("dark-mode"));
            themeText.textContent = "Dark";
            themeImage.src = "images/dark-icon.png";
            hamburgerIcon.src = "images/ham_menu.svg"
            headerLogo.src = "images/logo3.svg"
            theme = "light";
        } else {
            changeElements.forEach(element => element.classList.add("dark-mode"));
            themeText.textContent = "Light";
            themeImage.src = "images/stellar-icon.png";
            hamburgerIcon.src = "images/ham_menu_dark.svg"
            headerLogo.src = "images/logo3-dark.svg"
            theme = "dark";
        }

        localStorage.setItem("theme", theme);
    }

    function checkTheme() {
        const changeElements = document.querySelectorAll(".dm");
        const themeText = document.querySelector("#theme-text");
        const themeImage = document.querySelector("#theme-image");

        if (theme === "dark") {
            changeElements.forEach(element => element.classList.add("dark-mode"));
            themeText.textContent = "Light";
            themeImage.src = "images/stellar-icon.png";
            headerLogo.src = "images/logo3-dark.svg"
            hamburgerIcon.src = "images/ham_menu_dark.svg"
        } else {
            changeElements.forEach(element => element.classList.remove("dark-mode"));
            themeText.textContent = "Dark";
            themeImage.src = "images/dark-icon.png";
            hamburgerIcon.src = "images/ham_menu.svg"
            headerLogo.src = "images/logo3.svg"
        }
    }

    themeEnable.addEventListener("click", changeTheme);
    window.addEventListener("load", checkTheme);

}