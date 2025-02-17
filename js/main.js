import { darkmode } from "./modules/dark-mode.js";
import { populationFunctionality } from "./modules/home.js";
import { lightboxFunctions } from "./modules/lightbox.js";
import { registerUser } from "./modules/register.js";
import { ruleCheck } from "./modules/rules.js";
import { smoothScroll } from "./modules/scroll.js";
import { suggestionSubmit } from "./modules/suggestion.js";

if (document.body.dataset.page === "home") {
    populationFunctionality()
}

if (document.body.dataset.page === "suggest") {
    ruleCheck()
    suggestionSubmit()
}

if (document.body.dataset.page === 'register') {
    registerUser()
}

smoothScroll()
darkmode()
lightboxFunctions()