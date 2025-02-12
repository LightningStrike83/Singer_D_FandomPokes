export function lightboxFunctions() {
    const mobileClose = document.querySelectorAll(".close-button")

    function closeBox(event) {
        const lightbox = event.target.parentNode.parentNode

        lightbox.style.display = "none"
    }

    mobileClose.forEach(close => close.addEventListener("click", closeBox))
}