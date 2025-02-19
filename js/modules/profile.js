export function profilePopulation() {
    const baseURL = "http://localhost/Singer_D_FandomPokes/lumen/public/"
    const upvoteCount = document.querySelector("#upvote-count-text")
    const submissionCount = document.querySelector("#submissions-count-text")
    const pkHome = document.querySelector("#login-con")
    const pk = pkHome.dataset.id
    const skHome = document.querySelector("#main-info-con")
    const sk = skHome.dataset.match
    const profileTabs = document.querySelectorAll(".profile-tab")
    
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

    profileTabs.forEach(tab => tab.addEventListener("click", changeBox))
}