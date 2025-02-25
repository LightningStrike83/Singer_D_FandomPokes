export function contactForm() {
    const form = document.querySelector("#contact-form");
    const errorMessage = document.querySelector("#error-text");
    const errorCon = document.querySelector("#other-errors");

    function submitForm(event) {
        event.preventDefault();

        const url = "../includes/contact-form.php";
        const formData = new URLSearchParams(new FormData(event.target)).toString();

        fetch(url, {
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
                errorCon.innerHTML = "";

                if (responseText.errors) {
                    const errors = Object.values(responseText.errors);

                    errors.forEach(error => {
                        const p = document.createElement("p");
                        p.textContent = error;
                        errorCon.appendChild(p);
                    });
                } else {
                    form.reset();
                    errorMessage.textContent = "Thank you for your message! We'll be in contact as soon as possible!";
                }
            })
            .catch(error => {
                errorMessage.textContent = `Sorry, something went wrong! ${error}`;
                errorCon.innerHTML = "";
            });
    }

    form.addEventListener("submit", submitForm);

}