export function profilePopulation() {
    const baseURL = "http://localhost/Singer_D_FandomPokes/lumen/public/"
    const upvoteCount = document.querySelector("#upvote-count-text")
    const submissionCount = document.querySelector("#submissions-count-text")
    const pkHome = document.querySelector("#login-con")
    const pk = pkHome.dataset.id
    const skHome = document.querySelector("#main-info-con")
    const sk = skHome.dataset.match
    const profileTabs = document.querySelectorAll(".profile-tab")
    const ballIcons = document.querySelectorAll(".pokeball-icon")

    let userData = {
        icon: "",
        fav_pokemon: "",
        fav_trainer: "",
        fav_series: "",
        fav_characters: "",
        fandoms: "",
    }
    
    function profileCheck() {
        if (pk === sk) {
            document.body.classList.add("match")
        }
    }

    profileCheck()

    function contentPopulation() {
        fetch(`${baseURL}/upvotes/${sk}`)
        .then(response => response.json())
        .then(function(response) {
            const upvoteCon = document.querySelector("#upvoted-con")

            upvoteCount.textContent = response.length

            response.forEach(upvote => {
                const div = document.createElement("div")
                const title = document.createElement("p")
                const pokemonImage = document.createElement("img")
                const characterImage = document.createElement("img")
                const imageDiv = document.createElement("div")

                title.textContent = `${upvote.character_name} and ${upvote.species_name}`
                pokemonImage.src = `./images/pokemon/${upvote.number}.png`
                characterImage.src = `./images/characters/${upvote.id}.png`

                div.setAttribute("class", "profile-content-con")
                imageDiv.setAttribute("class", "profile-image-con")
                title.setAttribute("class", "profile-info-title")

                imageDiv.appendChild(characterImage)
                imageDiv.appendChild(pokemonImage)
                div.appendChild(title)
                div.appendChild(imageDiv)

                upvoteCon.appendChild(div)
            })
        })

        fetch(`${baseURL}/submitter/${sk}`)
        .then(response => response.json())
        .then(function(response) {
            const submissionCon = document.querySelector("#submission-con")

            submissionCount.textContent = response.length

            response.forEach(character => {
                const div = document.createElement("div")
                const title = document.createElement("p")
                const name = document.createElement("p")
                const characterImage = document.createElement("img")
                const infoDiv = document.createElement("div")

                title.textContent = `${character.subseries_name}`
                name.textContent = `${character.name}`

                characterImage.src = `./images/characters/${character.id}.png`

                div.setAttribute("class", "profile-content-con")
                infoDiv.setAttribute("class", "character-submit-info")
                title.setAttribute("class", "profile-info-title")
                name.setAttribute("class", "character-name-submission")

                div.appendChild(title)
                infoDiv.appendChild(characterImage)
                infoDiv.appendChild(name)
                div.appendChild(infoDiv)

                submissionCon.appendChild(div)
            })
        })
    }

    contentPopulation()

    function changeBox() {
        const link = this.dataset.link
        const infoBoxes = document.querySelectorAll(".profile-info-box")
        const thisBox = document.querySelector(`#${link}-con`)

        infoBoxes.forEach(box => box.style.display = "none")

        profileTabs.forEach(tab => tab.style.backgroundColor = "#fff")
        
        this.style.backgroundColor = "rgb(222, 222, 222)"
        thisBox.style.display = "flex"
    }

    function createEditButton() {
        const button = document.createElement("button")

        button.innerHTML = "Edit Profile"
        button.addEventListener("click", activateEditMode)

        if (document.body.classList.contains("match")) {
            skHome.appendChild(button)
        }
    }

    function activateEditMode() {
        const profileImage = document.querySelector("#profile-image-con")
        const textCon = document.querySelector("#profile-text-con")
        const editImageIcon = document.createElement("img")
        const editInfoIcon = document.createElement("img")

        editImageIcon.src = "./images/icons/edit.svg"
        editImageIcon.addEventListener("click", openIconMenu)
        editImageIcon.setAttribute("class", "edit-icon")

        editInfoIcon.src = "./images/icons/edit.svg"
        editInfoIcon.addEventListener("click", openInfoMenu)
        editInfoIcon.setAttribute("class", "edit-icon")
        editInfoIcon.setAttribute("id", "edit-profile-icon")

        profileImage.appendChild(editImageIcon)
        textCon.appendChild(editInfoIcon)
    }

    function openIconMenu() {
        const iconCon = document.querySelector("#icon-con")
        var button = this.getBoundingClientRect()

        if (iconCon.style.display === "block") {
            iconCon.style.display = "none"
        } else {
            iconCon.style.display = "block"
            iconCon.style.left = `${button.left + window.scrollX}px`; 
            iconCon.style.top = `${button.top + window.scrollY}px`;
        }
    }

    function openInfoMenu() {
        const select = document.createElement("select")
        const favPokemon = document.querySelector("#fav-pokemon-home")
        const textInputs = document.querySelectorAll(".text-input")

        select.addEventListener("change", submitFavPokemon)

        fetch(`${baseURL}species/all`)
        .then(response => response.json())
        .then(function(response) {
            const defaultOption = document.createElement("option")

            defaultOption.innerText = "--Please Select A Pokemon--"
            defaultOption.selected = true
            defaultOption.disabled = true

            select.appendChild(defaultOption)

            response.forEach(item => {
                const option = document.createElement("option")

                option.innerText = item.name

                select.appendChild(option)
            })
        })
        .catch(error => {
        })

        textInputs.forEach(info => {
            const input = document.createElement("input")
            const button = document.createElement("button")

            input.setAttribute("class", "profile-input-text")
            input.maxLength = "1000"

            button.addEventListener("click", submitInfo)
            button.innerText = "Submit"
            button.setAttribute("class", "profile-info-submit-button")

            info.appendChild(input)
            info.appendChild(button)
        })

        favPokemon.appendChild(select)
    }

    function changeIcon() {
        const ballImage = document.querySelector("#profile-image")

        ballImage.src = this.src

        userData.icon = this.src

        postData()
    }

    function submitFavPokemon() {
        const favPokemonText = document.querySelector("#profile-fav-pokemon")
        userData.fav_pokemon = this.options[this.selectedIndex].innerText

        postData()
        
        favPokemonText.textContent = this.options[this.selectedIndex].innerText
    }

    function submitInfo() {
        const parentNode = this.parentNode
        const inputText = parentNode.querySelector("input")
        const variableSearch = parentNode.dataset.input
        const dynamicText = parentNode.querySelector(".dynamic-text")

        userData[variableSearch] = inputText.value;

        postData()
        dynamicText.textContent = inputText.value

        console.log(userData)
    }

    function postData() {
        fetch(`${baseURL}user/update/${pk}`, {
            method: "POST",
            headers: {
                "Content-Type": "application/json" 
            },
            body: JSON.stringify(userData)
        })
        .then(response => response.json())
        .then(function(response) {

        })
    }

    function loadUserData() {
        fetch(`${baseURL}load/${sk}`)
        .then(response => response.json())
        .then(function(response) {
            const ballImage = document.querySelector("#profile-image")
            const favPokemonText = document.querySelector("#profile-fav-pokemon")
            const favTrainerText = document.querySelector("#profile-fav-trainer")
            const favSeriesText = document.querySelector("#profile-fav-series")
            const favCharacterText = document.querySelector("#profile-fav-character")
            const fandomText = document.querySelector("#profile-fandoms")

            userData = {
                icon: response[0].icon,
                fav_pokemon: response[0].fav_pokemon,
                fav_trainer: response[0].fav_trainer,
                fav_series: response[0].fav_series,
                fav_characters: response[0].fav_characters,
                fandoms: response[0].fandoms,
            }

            console.log(response[0].icon)

            ballImage.src = response[0].icon
            favPokemonText.textContent = response[0].fav_pokemon
            favTrainerText.textContent = response[0].fav_trainer
            favSeriesText.textContent = response[0].fav_series
            favCharacterText.textContent = response[0].fav_characters
            fandomText.textContent = response[0].fandoms
        })
    }

    createEditButton()
    loadUserData()
 
    profileTabs.forEach(tab => tab.addEventListener("click", changeBox))
    ballIcons.forEach(ball => ball.addEventListener("click", changeIcon))
}