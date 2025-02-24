export function hamburgerMenu() {
    const hamburgerIcon = document.querySelector("#hamburger-menu img")

    function openHamburgerMenu() {
        const hamburgerCon = document.querySelector("#hamburger-menu-con")
        hamburgerCon.style.visibility = "visible"
        hamburgerCon.style.opacity = "1" 
        hamburgerCon.style.display = "flex"
    }

    hamburgerIcon.addEventListener("click", openHamburgerMenu)
}