export function darkmode() {
    const themeEnable = document.querySelector("#theme-enable");
    const currentTheme = localStorage.getItem("theme");
    let theme = currentTheme || "light";

    function changeTheme() {
        const changeElements = document.querySelectorAll(".dm");
        const themeText = document.querySelector("#theme-text");
        const themeImage = document.querySelector("#theme-image");

        if (theme === "dark") {
            changeElements.forEach(element => element.classList.remove("dark-mode"));
            themeText.textContent = "Dark";
            themeImage.src = "images/dark-icon.png";
            theme = "light";
        } else {
            changeElements.forEach(element => element.classList.add("dark-mode"));
            themeText.textContent = "Light";
            themeImage.src = "images/stellar-icon.png";
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
        } else {
            changeElements.forEach(element => element.classList.remove("dark-mode"));
            themeText.textContent = "Dark";
            themeImage.src = "images/dark-icon.png";
        }
    }

    themeEnable.addEventListener("click", changeTheme);
    window.addEventListener("load", checkTheme);

}