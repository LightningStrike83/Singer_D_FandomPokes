export function ruleCheck() {
    const acceptButtons = document.querySelectorAll(".accept-button")
    const currentAcceptance = sessionStorage.getItem("acceptance");
    const suggestCon = document.querySelector("#suggest-con")
    let accepted = currentAcceptance || "";


    function showForm() {
        const checkboxes = document.querySelectorAll(".rule-checkbox")
        const ruleError = document.querySelector("#rule-error")

        ruleError.textContent = ""

        let uncheckedBox = []

        checkboxes.forEach(box => {
            if (box.checked === true) {

            } else {
                uncheckedBox.push(box);
            }
        })
        
        if (uncheckedBox.length > 0) {
            ruleError.textContent = `Please accept the rules of: ${uncheckedBox.map(box => box.dataset.checkbox).join(", ")}`;
        } else {
            const ruleCon = document.querySelector("#rule-con")

            if (this.id === "accept-button") {
                accepted = "accepted";

                sessionStorage.setItem("acceptance", accepted);
            }

            ruleCon.style.display = "none"
            suggestCon.style.display = "flex"

            toTop()
        }
    }

    function checkAcceptance() {
        if (currentAcceptance === "accepted") {
            document.body.classList.add("accepted");

            const ruleCon = document.querySelector("#rule-con")

            ruleCon.style.display = "none"
            suggestCon.style.display = "flex"
        }
    }

    function toTop() {
        gsap.to(window, { duration: 1, scrollTo: (0)})
    }

    acceptButtons.forEach(button => button.addEventListener("click", showForm))
    window.addEventListener("load", checkAcceptance);
    document.addEventListener("DOMContentLoaded", (event) => {gsap.registerPlugin(ScrollToPlugin)});
}