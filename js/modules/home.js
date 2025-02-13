export function populationFunctionality() {
    const baseURL = "http://localhost/Singer_D_FandomPokes/lumen/public/"
    const mainSelect = document.querySelector("#main-select")
    const subSelect = document.querySelector("#sub-select")
    const characterSelect = document.querySelector("#character-list")
    const characterCon = document.querySelector("#character-list-con")
    const partnerCon = document.querySelector("#character-partner-con")
    const submitHomeForm = document.querySelector("#pokemon-submit-form")

    function populateMain() {
        fetch(`${baseURL}series/all`)
        .then(response => response.json())
        .then(function(response) {
            const baseOption = document.createElement("option")
            baseOption.innerText = "--Select A Series--"
            baseOption.disabled = true
            baseOption.selected = true

            mainSelect.appendChild(baseOption)

            response.forEach(series => {
                const seriesOption = document.createElement("option")
                seriesOption.innerText = series.name
                seriesOption.value = series.id

                mainSelect.appendChild(seriesOption)
            })
        })
    }

    populateMain()

    function populateSub() {
        const fetchID = mainSelect.value

        fetch(`${baseURL}subseries/${fetchID}`)
        .then(response => response.json())
        .then(function(response) {
            const baseOption = document.createElement("option")
            baseOption.innerText = "--Select A Subseries--"
            baseOption.disabled = true
            baseOption.selected = true

            subSelect.innerHTML = ""

            subSelect.appendChild(baseOption)

            console.log(response)

            response.forEach(subseries => {
                const subseriesOption = document.createElement("option")
                subseriesOption.innerText = subseries.subseries_name
                subseriesOption.value = subseries.id

                subSelect.appendChild(subseriesOption)
            })
        })
    }

    function populateCharacter() {
        const fetchID = subSelect.value

        fetch(`${baseURL}characters/${fetchID}`)
        .then(response => response.json())
        .then(function(response) {
            const baseOption = document.createElement("option")
            const characterList = document.createElement("ul")
            const title = document.createElement("p")
            baseOption.innerText = "--Select A Character--"
            baseOption.disabled = true
            baseOption.selected = true

            characterCon.innerHTML = ""
            characterSelect.innerHTML = ""

            characterSelect.appendChild(baseOption)

            characterList.setAttribute("id", "character-list")

            title.textContent = "Character List"
            title.setAttribute("id", "character-list-title")
            title.setAttribute("class", "dm")

            response.forEach(character => {
                const characterOption = document.createElement("option")
                const characterLink = document.createElement("li")

                characterOption.innerText = character.name
                characterOption.value = character.id

                characterLink.textContent = `${character.name} ►`
                characterLink.setAttribute("data-character", `${character.id}`)
                characterLink.setAttribute("class", "character dm")
                characterLink.setAttribute("data-name", `${character.name}`)
                characterLink.addEventListener("click", showPokemon)

                characterSelect.appendChild(characterOption)
                characterList.appendChild(characterLink)
            })

            characterCon.appendChild(title)
            characterCon.appendChild(characterList)

            dynamicTheme()
        })
    }

    function showPokemon(e) {
        let value = e?.currentTarget?.dataset?.character || characterSelect.value
        let nameVariable = e?.currentTarget?.dataset.name || characterSelect.options[this.selectedIndex].innerText

        fetch(`${baseURL}partners/${value}`)
        .then(response => response.json())
        .then(function(response) {
            partnerCon.innerHTML = ""

            console.log(response)

            const characterBox = document.createElement("div")
            const characterImage = document.createElement("img")
            const partnerBox = document.createElement("div")
            const name = document.createElement("h3")
            const displayDiv = document.createElement("div")
            const characterImageBox = document.createElement("div")
            const submitButton = document.createElement("button")
            const loadingText = document.createElement("p")

            displayDiv.setAttribute("id", "display-div")

            name.textContent = nameVariable
            name.setAttribute("id", "character-title")
            name.setAttribute("class", "dm")

            characterImage.src = `../images/characters/${value}.png`
            characterImage.setAttribute("class", "character-image")

            characterBox.setAttribute("id", "character-box")
            partnerBox.setAttribute("id", "partner-box")

            submitButton.innerText = "Submit A Pokemon For This Character"
            submitButton.setAttribute("id", "submit-pokemon-button")
            submitButton.setAttribute("data-key", `${value}`)
            submitButton.addEventListener("click", displayPokeSubmit)

            loadingText.setAttribute("id", "loading-text")

            characterImageBox.setAttribute("id", "character-image-box")

            characterImageBox.appendChild(characterImage)
            characterImageBox.appendChild(submitButton)
            characterImageBox.appendChild(loadingText)
            characterBox.appendChild(name)
            displayDiv.appendChild(characterImageBox)

            response.forEach(partner => {
                const div = document.createElement("div")
                const image = document.createElement("img")
                const voteBox = document.createElement("div")
                const infoBox = document.createElement("div")
                const name = document.createElement("p")
                const vote = document.createElement("p")
                const upvote = document.createElement("p")

                div.setAttribute("class", `partner-div type-${partner.type1} dm`)
                div.setAttribute("data-vote", `${partner.id}`)

                image.src = `../images/pokemon/${partner.number}.png`
                image.setAttribute("class", "pokemon-image")
                
                name.textContent = `${partner.name}`
                name.setAttribute("class", "pokemon-name")

                vote.textContent = `${partner.votes}`
                vote.setAttribute("class", "vote-count")

                upvote.textContent = "▲"
                upvote.setAttribute("class", "upvote")

                voteBox.setAttribute("class", "vote-box")

                voteBox.appendChild(upvote)
                voteBox.appendChild(vote)
                div.appendChild(image)
                infoBox.appendChild(name)
                div.appendChild(infoBox)
                div.appendChild(voteBox)
                partnerBox.appendChild(div)
            })

            displayDiv.appendChild(partnerBox)
            characterBox.appendChild(displayDiv)
            partnerCon.appendChild(characterBox)

            partnerCon.style.borderTop = "0px"

            dynamicTheme()
        })
    }

    function displayPokeSubmit() {
        const pokeSubmitCon = document.querySelector("#pokemon-submission-con")
        const loadingText = document.querySelector("#loading-text")

        loadingText.textContent = "Loading..."

        fetch(`${baseURL}species/all`)
        .then(response => response.json())
        .then(function(response) {
            const pokemonSelect = document.querySelector("#pokemon-submit-select")
            const characterName = document.querySelector("#pokemon-submit-character")
            const characterTitle = document.querySelector("#character-title")
            const button = document.querySelector("#submit-pokemon-button")
            const key = button.dataset.key
            const defaultOption = document.createElement("option")
            const text = document.querySelector("#submit-poke-text")

            text.textContent = ""

            pokemonSelect.innerHTML = ""

            defaultOption.innerText = "--Please Select A Pokemon--"
            defaultOption.selected = true
            defaultOption.disabled = true

            pokemonSelect.appendChild(defaultOption)

            characterName.value = characterTitle.textContent
            characterName.setAttribute("data-submit", `${key}`)

            response.forEach(item => {
                const option = document.createElement("option")

                option.value = item.id
                option.innerText = item.name

                pokemonSelect.appendChild(option)
            })

            pokeSubmitCon.style.display = "grid"
            loadingText.textContent = ""
        })
    }

    function dynamicTheme() {
        const currentTheme = localStorage.getItem("theme");

        if (currentTheme === "dark") {
            const changeElements = document.querySelectorAll(".dm");

            changeElements.forEach(element => {
                if (!element.classList.contains("dark-mode")) {
                    element.classList.add("dark-mode")
                }
            });
        }
    }

    function submitPartner(event) {
        event.preventDefault()

        const characterFind = document.querySelector("#pokemon-submit-character")
        const characterID = characterFind.dataset.submit
        const pokemonFind = document.querySelector("#pokemon-submit-select")
        const pokemonID = pokemonFind.options[pokemonFind.selectedIndex].value

        fetch(`${baseURL}partners/check/${characterID}/${pokemonID}`)
        .then(response => response.json())
        .then(function(response) {
            const text = document.querySelector("#submit-poke-text")

            text.textContent = ""

            if (response.length > 0) {
                text.textContent = "Sorry, this Pokemon has already been suggested for this character."

            } else {
                const partnerData = {
                    character_id: characterID,
                    species_id: pokemonID,
                    votes: 0,
                }

                console.log(partnerData)

                fetch (`${baseURL}partners/add`, {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json" 
                    },
                    body: JSON.stringify(partnerData)  
                })
                .then(function() {
                    text.textContent = "Thank you for your submission! Please close this form and refresh the result to view the submission!"
                })
            }
        })
    }

    mainSelect.addEventListener("change", populateSub)
    subSelect.addEventListener("change", populateCharacter)
    characterSelect.addEventListener("change", showPokemon)
    submitHomeForm.addEventListener("submit", submitPartner)
}