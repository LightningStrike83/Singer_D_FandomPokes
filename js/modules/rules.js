export function ruleCheck() {
    const acceptButtons = document.querySelectorAll(".accept-button")
    const currentAcceptance = localStorage.getItem("acceptance");
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

        if (this.id === "accept-all") {
            uncheckedBox = []

            checkboxes.forEach(box => {
                box.checked = true
            })
        } 
        
        if (uncheckedBox.length > 0) {
            ruleError.textContent = `Please accept the rules of: ${uncheckedBox.map(box => box.dataset.checkbox).join(", ")}`;
        } else {
            const ruleCon = document.querySelector("#rule-con")

            if (this.id === "accept-button") {
                accepted = "accepted";

                localStorage.setItem("acceptance", accepted);
            }

            ruleCon.style.display = "none"
            suggestCon.style.display = "block"
        }
    }

    function checkAcceptance() {
        if (currentAcceptance === "accepted") {
            document.body.classList.add("accepted");

            checkButton();
        }
    }

    function checkButton() {
        if (document.body.classList.contains("accepted")) {
            const acceptButton = document.querySelector("#accept-button")
            const acceptAllButton = document.querySelector("#accept-all")

            acceptButton.style.display = "none"
            acceptAllButton.style.display = "flex"
        }
    }

    acceptButtons.forEach(button => button.addEventListener("click", showForm))
    window.addEventListener("load", checkAcceptance);
}