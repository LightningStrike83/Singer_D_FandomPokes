export function registerUser() {
    const baseURL = "http://localhost/Singer_D_FandomPokes/lumen/public/"
    const registerForm = document.querySelector("#register-form")

    function registerInfo(event) {
        event.preventDefault()

        const registerError = document.querySelector("#register-error")
        const emailSelect = document.querySelector("#register-email")
        const userSelect = document.querySelector("#register-username")
        const passwordSelect = document.querySelector("#register-password")
        const emailInput = emailSelect.value
        const userInput = userSelect.value
        const passwordInput = passwordSelect.value

        registerError.innerHTML = ""

        console.log(emailInput, userInput)

        console.log(`${baseURL}register/check/user/${userInput}`)

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
                            registerError.innerHTML = 'Thank you for registering! Please login <a href="login.html">here</a>'
                        })
                    } else if (response.length > 0) {
                        registerError.textContent = "Sorry, that email has already been registered."
                    }
                })
            } else if (response.length > 0) {
                console.log("boo")
                registerError.innerHTML = "Sorry, that username has already been registered."
            }
        })
    }

    registerForm.addEventListener("submit", registerInfo)
}