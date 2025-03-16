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
    const profileError = document.querySelector("#profile-error-con")

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
        fetch(`${baseURL}check/${sk}`)
        .then(response => response.json())
        .then(function(response) {
            profileError.innerHTML = ""

            console.log(response)

            if (response.length > 0) {
                fetch(`${baseURL}/upvotes/${sk}`)
                .then(response => response.json())
                .then(function(response) {
                    profileError.innerHTML = ""

                    const upvoteCon = document.querySelector("#upvoted-con")

                    upvoteCount.textContent = response.length

                    if (response.length === 0) {
                        const p = document.createElement("p")

                        p.textContent = "---This user has not upvoted any partners yet---"
                        p.setAttribute("class", "empty-info")

                        upvoteCon.appendChild(p)
                    } else {
                        response.forEach(upvote => {
                            const div = document.createElement("div")
                            const title = document.createElement("p")
                            const pokemonImage = document.createElement("img")
                            const characterImage = document.createElement("img")
                            const imageDiv = document.createElement("div")
            
                            title.textContent = `${upvote.character_name} and ${upvote.species_name}`
                            pokemonImage.src = `./images/pokemon/${upvote.number}.png`
                            characterImage.src = `./images/characters/${upvote.id}.png`
                            pokemonImage.setAttribute("alt", `${upvote.species_name}`)
                            characterImage.setAttribute("alt", `${upvote.character_name}`)
            
                            div.setAttribute("class", "profile-content-con dm")
                            imageDiv.setAttribute("class", "profile-image-con")
                            title.setAttribute("class", "profile-info-title")
            
                            if (document.body.classList.contains("dark-mode")) {
                                div.classList.add("dark-mode")
                            }
            
                            imageDiv.appendChild(characterImage)
                            imageDiv.appendChild(pokemonImage)
                            div.appendChild(title)
                            div.appendChild(imageDiv)
            
                            upvoteCon.appendChild(div)
                        })
                    }
                })
                .catch(error => {
                    profileError.innerHTML = `<p>Sorry, something went wrong. Please refresh and try again. ${error}</p>`

                    gsap.to(window, { duration: 1, scrollTo: (profileError)})
                })

                fetch(`${baseURL}/submitter/${sk}`)
                .then(response => response.json())
                .then(function(response) {
                    const submissionCon = document.querySelector("#submission-con")

                    profileError.innerHTML = ""
                    submissionCount.textContent = response.length

                    if (response.length === 0) {
                        const p = document.createElement("p")

                        p.textContent = "---This user has not submitted any partners yet---"
                        p.setAttribute("class", "empty-info")

                        submissionCon.appendChild(p)
                    } else {
                        response.forEach(character => {
                            const div = document.createElement("div")
                            const title = document.createElement("p")
                            const name = document.createElement("p")
                            const characterImage = document.createElement("img")
                            const infoDiv = document.createElement("div")
            
                            title.textContent = `${character.subseries_name}`
                            name.textContent = `${character.name}`
            
                            characterImage.src = `./images/characters/${character.id}.png`
                            characterImage.setAttribute("alt", `${character.name}`)
            
                            div.setAttribute("class", "profile-content-con dm")
                            infoDiv.setAttribute("class", "character-submit-info")
                            title.setAttribute("class", "profile-info-title")
                            name.setAttribute("class", "character-name-submission")
            
                            if (document.body.classList.contains("dark-mode")) {
                                div.classList.add("dark-mode")
                            }
            
                            div.appendChild(title)
                            infoDiv.appendChild(characterImage)
                            infoDiv.appendChild(name)
                            div.appendChild(infoDiv)
            
                            submissionCon.appendChild(div)
                        })
                    }
                })
                .catch(error => {
                    profileError.innerHTML = `<p>Sorry, something went wrong. Please refresh and try again. ${error}</p>`

                    gsap.to(window, { duration: 1, scrollTo: (profileError)})
                })
            } else {
                const mainInfo = document.querySelector("#main-info-con")
                const extraInfo = document.querySelector("#extra-info-con")
                const profileCon = document.querySelector("#profile-info-con")
                const p = document.createElement("p")

                p.textContent = "--Sorry, a user with this ID does not exist--"
                p.setAttribute("id", "no-exist-text")
                p.setAttribute("class", "col-span-full dm")

                extraInfo.remove()
                mainInfo.remove()
                profileError.remove()

                profileCon.appendChild(p)
            }
        })
        .catch(error => {
            profileError.innerHTML = `<p>Sorry, something went wrong. Please refresh and try again. ${error}</p>`

            gsap.to(window, { duration: 1, scrollTo: (profileError)})
        })

        
    }

    function contentDisplay() {
        const profileCon = document.querySelector("#profile-info-con")

        contentPopulation()

        setTimeout(() => {
            profileCon.style.visibility = "visible"
        }, 200)
    }

    contentDisplay()

    function changeBox() {
        const link = this.dataset.link
        const infoBoxes = document.querySelectorAll(".profile-info-box")
        const thisBox = document.querySelector(`#${link}-con`)

        infoBoxes.forEach(box => box.style.display = "none")

        profileTabs.forEach(tab => tab.classList.remove("tab-selected"))
        
        this.classList.add("tab-selected")
        thisBox.style.display = "flex"
    }
  
    function createEditButton() {
        const button = document.createElement("button")

        button.innerHTML = "Edit Profile"
        button.setAttribute("class", "dm")
        button.addEventListener("click", activateEditMode)
        button.setAttribute("id", "edit-profile-button")

        if (document.body.classList.contains("match")) {
            skHome.appendChild(button)
        }
    }

    function activateEditMode() {
        const profileImage = document.querySelector("#profile-image-con")
        const textCon = document.querySelector("#profile-text-con")
        const editImageIcon = document.createElement("img")
        const editInfoIcon = document.createElement("img")
        const infoBoxes = document.querySelectorAll(".profile-info-box")
        const profileTab = document.querySelector("#first-tab")
        const profileCon = document.querySelector("#profile-text-con")

        if (this.classList.contains("activated")) {
            const editButtons = document.querySelectorAll(".edit-icon")

            this.classList.remove("activated")
            editButtons.forEach(button => button.remove())
        } else {
            this.classList.add("activated")

            profileTabs.forEach(tab => tab.classList.remove("tab-selected"))
            infoBoxes.forEach(box => box.style.display = "none")

            profileTab.classList.add("tab-selected")
            profileCon.style.display = "flex"

            editImageIcon.src = "./images/icons/edit.svg"
            editImageIcon.addEventListener("click", openIconMenu)
            editImageIcon.setAttribute("class", "edit-icon dm")
            editImageIcon.setAttribute("alt", "Edit Profile Image Icon")

            editInfoIcon.src = "./images/icons/edit.svg"
            editInfoIcon.addEventListener("click", openInfoMenu)
            editInfoIcon.setAttribute("class", "edit-icon dm")
            editInfoIcon.setAttribute("id", "edit-profile-icon")
            editInfoIcon.setAttribute("alt", "Edit Profile Information Icon")

            if (document.body.classList.contains("dark-mode")) {
                editImageIcon.style.backgroundColor = "#afafaf"
                editInfoIcon.style.backgroundColor = "#afafaf"
            }

            profileImage.appendChild(editImageIcon)
            textCon.appendChild(editInfoIcon)
        }
    }

    function openIconMenu() {
        const iconCon = document.querySelector("#icon-con")
        var button = this.getBoundingClientRect()
        var screen = window.matchMedia("(min-width: 728px)")

        if (iconCon.style.display === "block") {
            iconCon.style.display = "none"
        } else {
            iconCon.style.display = "block"
            iconCon.style.top = `${button.top + window.scrollY}px`;

            var box = document.querySelector("#ball-icon-home").getBoundingClientRect()

            if (screen.matches) {
                iconCon.style.left = `${button.left + window.scrollX}px`; 
            } else {
                iconCon.style.left = `${button.left - box.width + button.width}px`; 
            }
        }
    }

    function openInfoMenu() {
        const parentNode = this.parentNode

        if (parentNode.classList.contains("edit-mode")) {
            const removeSelect = parentNode.querySelector("select")
            const removeInputs = parentNode.querySelectorAll("input")
            const removeButtons = parentNode.querySelectorAll("button")

            parentNode.classList.remove("edit-mode")

            removeSelect.remove()
            removeInputs.forEach(input => input.remove())
            removeButtons.forEach(button => button.remove())
        } else {
            const select = document.createElement("select")
            const favPokemon = document.querySelector("#fav-pokemon-home")
            const textInputs = document.querySelectorAll(".text-input")
            const loadingOption = document.createElement("option")

            loadingOption.innerText = "Loading..."
            loadingOption.disabled = true
            loadingOption.selected = true
            loadingOption.setAttribute("data-loading", "loading")

            parentNode.classList.add("edit-mode")

            select.setAttribute("id", "profile-select-menu")
            select.setAttribute("class", "dm")
            select.addEventListener("change", submitFavPokemon)

            select.appendChild(loadingOption)

            if (document.body.classList.contains("dark-mode")) {
                select.classList.add("dark-mode")
            }

            fetch(`${baseURL}species/all`)
            .then(response => response.json())
            .then(function(response) {
                const defaultOption = document.createElement("option")

                profileError.innerHTML = ""

                defaultOption.innerText = "--Please Select A Pokemon--"
                defaultOption.selected = true
                defaultOption.disabled = true

                select.appendChild(defaultOption)

                response.forEach(item => {
                    const option = document.createElement("option")

                    option.innerText = item.name

                    select.appendChild(option)
                })

                const loadingOption = document.querySelector("option[data-loading='loading']");

                loadingOption.remove()
            })
            .catch(error => {
                profileError.innerHTML = `<p>Sorry, something went wrong. Please refresh and try again. ${error}</p>`

                gsap.to(window, { duration: 1, scrollTo: (profileError)})
            })

            textInputs.forEach(info => {
                const input = document.createElement("input")
                const button = document.createElement("button")

                input.setAttribute("class", "profile-input-text dm")
                input.maxLength = "1000"

                button.addEventListener("click", submitInfo)
                button.innerText = "Submit"
                button.setAttribute("class", "profile-info-submit-button dm")

                if (document.body.classList.contains("dark-mode")) {
                    button.classList.add("dark-mode")
                    input.classList.add("dark-mode")
                }

                info.appendChild(input)
                info.appendChild(button)
            })

            favPokemon.appendChild(select)
        }
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
            profileError.innerHTML = ""
        })
        .catch(error => {
            profileError.innerHTML = `<p>Sorry, something went wrong. Please refresh and try again. ${error}</p>`

            gsap.to(window, { duration: 1, scrollTo: (profileError)})
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

            profileError.innerHTML = ""

            userData = {
                icon: response[0].icon,
                fav_pokemon: response[0].fav_pokemon,
                fav_trainer: response[0].fav_trainer,
                fav_series: response[0].fav_series,
                fav_characters: response[0].fav_characters,
                fandoms: response[0].fandoms,
            }

            ballImage.src = response[0].icon
            favPokemonText.textContent = response[0].fav_pokemon
            favTrainerText.textContent = response[0].fav_trainer
            favSeriesText.textContent = response[0].fav_series
            favCharacterText.textContent = response[0].fav_characters
            fandomText.textContent = response[0].fandoms
        })
        .catch(error => {
            profileError.innerHTML = `<p>Sorry, something went wrong. Please refresh and try again. ${error}</p>`

            gsap.to(window, { duration: 1, scrollTo: (profileError)})
        })
    }

    createEditButton()
    loadUserData()
 
    profileTabs.forEach(tab => tab.addEventListener("click", changeBox))
    ballIcons.forEach(ball => ball.addEventListener("click", changeIcon))
}