export function lightboxFunctions() {
    const mobileClose = document.querySelectorAll(".close-button")

    function closeBox(event) {
        const lightbox = event.target.parentNode.parentNode.parentNode.parentNode

        lightbox.style.display = "none"

        if (lightbox.style.opacity === "0") {
            lightbox.style.opacity = "1"
        } else if (lightbox.style.opacity === "1") {
            lightbox.style.opacity = "0"
        }

        if (lightbox.style.visibility === "hidden") {
            lightbox.style.visibility = "visible"
        } else if (lightbox.style.visibility === "visible") {
            lightbox.style.visibility = "hidden"
        }
    }

    mobileClose.forEach(close => close.addEventListener("click", closeBox))
}