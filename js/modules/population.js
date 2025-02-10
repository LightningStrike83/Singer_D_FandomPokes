export function populationFunctionality() {
    const baseURL = "http://localhost/Singer_D_FandomPokes/lumen/public/"
    const mainSelect = document.querySelector("#main-select")
    const subSelect = document.querySelector("#sub-select")
    const characterSelect = document.querySelector("#character-list")
    const characterCon = document.querySelector("#character-list-con")
    const partnerCon = document.querySelector("#character-partner-con")

    let nameVariable = ""

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
            baseOption.innerText = "--Select A Character--"
            baseOption.disabled = true
            baseOption.selected = true

            characterCon.innerHTML = ""
            characterSelect.innerHTML = ""

            characterSelect.appendChild(baseOption)

            console.log(response)

            response.forEach(character => {
                const characterOption = document.createElement("option")
                const characterLink = document.createElement("li")

                characterOption.innerText = character.name
                characterOption.value = character.id

                nameVariable = `${character.name}`

                characterLink.textContent = `${character.name} ►`
                characterLink.setAttribute("data-character", `${character.id}`)
                characterLink.setAttribute("class", "character")
                characterLink.addEventListener("click", showPokemon)

                characterSelect.appendChild(characterOption)
                characterList.appendChild(characterLink)
            })

            characterCon.appendChild(characterList)
        })
    }

    function showPokemon(e) {
        let value = e?.currentTarget?.dataset?.character || characterSelect.value

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

            displayDiv.setAttribute("id", "display-div")

            name.textContent = nameVariable
            name.setAttribute("id", "character-title")

            characterImage.src = `../images/characters/${value}.png`
            characterImage.setAttribute("class", "character-image")

            characterBox.setAttribute("id", "character-box")
            partnerBox.setAttribute("id", "partner-box")

            submitButton.innerText = "Submit A Pokemon For This Character"
            submitButton.setAttribute("id", "submit-pokemon-button")
            submitButton.setAttribute("data-key", `${value}`)

            characterImageBox.setAttribute("id", "character-image-box")

            characterImageBox.appendChild(characterImage)
            characterImageBox.appendChild(submitButton)
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

                div.setAttribute("class", `partner-div type-${partner.type1}`)

                image.src = `../images/pokemon/${partner.number}.png`
                image.setAttribute("class", "pokemon-image")
                
                name.textContent = `${partner.name}`

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
        })
    }

    mainSelect.addEventListener("change", populateSub)
    subSelect.addEventListener("change", populateCharacter)
    characterSelect.addEventListener("change", showPokemon)
}