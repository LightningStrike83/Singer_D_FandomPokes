export function resetPassword() {
    const baseURL = "http://localhost/Singer_D_FandomPokes/lumen/public/"
    const resetForm = document.querySelector("#reset-password-form")
    const rpError = document.querySelector("#reset-password-error")

    function passwordReset(event) {
        const passwordInput = document.querySelector("#rp-input")
        const passwordValue = passwordInput.value
        const confirmInput = document.querySelector("#rp-confirm")
        const confirmValue = confirmInput.value
        const formKey = document.querySelector("#form-key")
        const id = formKey.dataset.pk

        event.preventDefault
        rpError.innerHTML = ""
        
        if (confirmValue === passwordValue) {
            let updateData = {
                password: passwordValue
            }

            fetch(`${baseURL}password-reset/${id}`, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json" 
                },
                body: JSON.stringify(updateData)
            })
            .then(response => response.json())
            .then(function(response) {
                rpError.innerHTML = "<p>Your password has been reset!</p>"
            })
            .catch(error => {
                rpError.innerHTML = `<p>Sorry, something went wrong. Please refresh and try again. ${error}</p>`
            })
        } else {
            rpError.innerHTML = "<p>Sorry, the two passwords do not match. Please try again.</p>"
        }

        gsap.to(window, { duration: 1, scrollTo: (rpError)})
    }

    resetForm.addEventListener("submit", passwordReset)
    document.addEventListener("DOMContentLoaded", (event) => {
        gsap.registerPlugin(ScrollToPlugin)});
}