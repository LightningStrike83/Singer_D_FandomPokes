export function registerUser() {
    const baseURL = "http://localhost/Singer_D_FandomPokes/lumen/public/"
    const registerForm = document.querySelector("#register-form")

    function registerInfo(event) {
        event.preventDefault()

        const registerError = document.querySelector("#register-error")
        const emailSelect = document.querySelector("#register-email")
        const userSelect = document.querySelector("#register-username")
        const passwordSelect = document.querySelector("#register-password")
        const birthdaySelect = document.querySelector("#register-birthday")
        const privacyCheck = document.querySelector("#privacy-policy-check")
        const emailInput = emailSelect.value
        const userInput = userSelect.value
        const passwordInput = passwordSelect.value
        const birthdayInput = birthdaySelect.value
        const birthdate = new Date(birthdayInput)
        const today = new Date()
        const minAge = new Date(today.getFullYear() - 13, today.getMonth(), today.getDate())

        registerError.innerHTML = ""

        if (!birthdayInput) {
            registerError.innerHTML = "<p>Please enter your date of birth</p>"
        } else if (privacyCheck.checked !== true) {
            registerError.innerHTML = "<p>Sorry, but you must agree with the privacy policy to register for an account</p>"
        } else if (birthdate > minAge) {
            registerError.innerHTML = "<p>Sorry, but you must be 13 years or older to register for an account</p>"
        } else if (userInput === emailInput) {
            registerError.innerHTML = "<p>Sorry, but username and email must be different</p>"
        } else {
            fetch(`${baseURL}register/check/user/${userInput}`)
            .then(response => response.json())
            .then(function(response) {
                if (response.length === 0) {
                    fetch(`${baseURL}register/check/email/${emailInput}`)
                    .then(response => response.json())
                    .then(function(response) {
                        if (response.length === 0) {
                            const formData = {
                                username: userInput,
                                password: passwordInput,
                                email: emailInput
                            }

                            fetch(`${baseURL}register`, {
                                method: "POST",
                                headers: {
                                    "Content-Type": "application/json" 
                                },
                                body: JSON.stringify(formData)
                            })
                            .then(response => response.json())
                            .then(function(response) {
                                registerError.innerHTML = '<p>Thank you for registering! Please login <a class="register-login-link" href="login.html">here</a></p>'
                            })
                            .catch(error => {
                                registerError.innerHTML = `<p>Sorry, something went wrong. ${error}</p>`
                            })
                        } else if (response.length > 0) {
                            registerError.innerHTML = "<p>Sorry, that email has already been registered.</p>"
                        }
                    })
                    .catch(error => {
                        registerError.innerHTML = `<p>Sorry, something went wrong. ${error}</p>`
                    })
                } else if (response.length > 0) {
                    registerError.innerHTML = "<p>Sorry, that username has already been registered.</p>"
                }
            })
            .catch(error => {
                registerError.innerHTML = `<p>Sorry, something went wrong. ${error}</p>`
            })
        }

        gsap.to(window, { duration: 1, scrollTo: (registerError)})
    }

    registerForm.addEventListener("submit", registerInfo)
    document.addEventListener("DOMContentLoaded", (event) => {
        gsap.registerPlugin(ScrollToPlugin)});
}