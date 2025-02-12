export function smoothScroll() {
    const topText = document.querySelector("#top-text")

    function toTop() {
        gsap.to(window, { duration: 1, scrollTo: (0)})
    }

    document.addEventListener("DOMContentLoaded", (event) => {
        gsap.registerPlugin(ScrollToPlugin)});
    topText.addEventListener("click", toTop)
}