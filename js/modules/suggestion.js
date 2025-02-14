export function suggestionSubmit() {
    const baseURL = "http://localhost/Singer_D_FandomPokes/lumen/public/"
    const infoButtons = document.querySelectorAll(".more-info")
    const form = document.querySelector("#suggest-character")

    function selectPopulation() {
        const suggestPokemon = document.querySelector("#suggest-pokemon")

        fetch(`${baseURL}species/all`)
        .then(response => response.json())
        .then(function(response) {
            const defaultOption = document.createElement("option")

            defaultOption.innerText = "--Please Select A Pokemon--"
            defaultOption.selected = true
            defaultOption.disabled = true

            suggestPokemon.appendChild(defaultOption)

            response.forEach(item => {
                const option = document.createElement("option")

                option.value = item.id
                option.innerText = item.name

                suggestPokemon.appendChild(option)
            })
        })
    }

    selectPopulation()

    function openInfoBox() {
        var screen = window.matchMedia("(min-width: 728px)")
        const infoBox = document.querySelector(`#${this.dataset.info}`)
        
        if (infoBox.style.display !== "flex") {
            infoBox.style.display = "flex"
        } else {
            infoBox.style.display = "none"
        }

        if (screen.matches) {
            var button = this.getBoundingClientRect()

            infoBox.style.left = `${button.x}px`
            infoBox.style.top = `${button.y}px`
        }
    }

    function submitSuggestion(event) {
        event.preventDefault()

        const startingPokemon = document.querySelector("#suggest-pokemon")
        const suggestError = document.querySelector("#suggest-error")

        suggestError.textContent = "Submitting..."

        const suggestionInfo = {
            character_name: document.querySelector("#character_name").value,
            series: document.querySelector("#series").value,
            subseries: document.querySelector("#subseries").value,
            wiki_page: document.querySelector("#wiki_page").value,
            starting_pokemon: startingPokemon.options[startingPokemon.selectedIndex].value
        }

        console.log(suggestionInfo)

        fetch(`${baseURL}suggestion/add`, {
            method: "POST",
            headers: {
                "Content-Type": "application/json" 
            },
            body: JSON.stringify(suggestionInfo)
        })
        .then(response => response.json())
        .then(function(response) {
            suggestError.textContent = "Submitted! The request will be reviewed and will be added in the next update if approved!"

            form.reset()
        })
    }

    infoButtons.forEach(button => button.addEventListener("click", openInfoBox))
    form.addEventListener("submit", submitSuggestion)
}