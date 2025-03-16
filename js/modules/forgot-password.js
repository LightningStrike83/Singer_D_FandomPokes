export function forgotPassword() {
    const baseURL = "http://localhost/Singer_D_FandomPokes/lumen/public/"
    const forgotForm = document.querySelector(".forgot-form")

    function emailValidation(event) {
        const emailSelect = document.querySelector("#fp-email")
        const emailValue = emailSelect.value
        const forgotError = document.querySelector("#forgot-error")

        event.preventDefault()

        fetch(`${baseURL}register/check/email/${emailValue}`)
        .then(response => response.json())
        .then(function(response) {
            forgotError.innerHTML = ""

            if (response.length === 0) {
                forgotError.innerHTML = `<p>Sorry, that email isn't registered in our systems.</p>`
            } else {
                const sendPassword = "../includes/forgot-password-email.php";
                const formData = new URLSearchParams(new FormData(event.target)).toString();

                fetch(sendPassword, {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded"
                    },
                    body: formData
                })
                    .then(response =>
                        response.json().catch(() => {
                            throw new Error("Invalid JSON response");
                        })
                    )
                    .then(responseText => {
                        if (responseText.errors) {
                            const errors = Object.values(responseText.errors);
            
                            errors.forEach(error => {
                                const p = document.createElement("p");
                                p.textContent = error;
                                forgotError.appendChild(p);
                            });
                        } else {
                            forgotError.innerHTML = "<p>An email has been sent with instructions on how to reset the password!</p>";

                            forgotForm.reset();
                        }
                    })
                    .catch(error => {
                        forgotError.innerHTML = `<p>Sorry, something went wrong! ${error}</p>`;
                    });
            }
        })
        .catch(error => {
            forgotError.innerHTML = `<p>Sorry, something went wrong. ${error}</p>`
        })

        gsap.to(window, { duration: 1, scrollTo: (forgotError)})
    }

    forgotForm.addEventListener("submit", emailValidation)
    document.addEventListener("DOMContentLoaded", (event) => {
        gsap.registerPlugin(ScrollToPlugin)});
}