import { darkmode } from "./modules/dark-mode.js";
import { populationFunctionality } from "./modules/home.js";
import { lightboxFunctions } from "./modules/lightbox.js";
import { ruleCheck } from "./modules/rules.js";
import { smoothScroll } from "./modules/scroll.js";

if (document.body.dataset.page === "home") {
    populationFunctionality()
}

if (document.body.dataset.page === "suggest") {
    ruleCheck()
}

smoothScroll()
darkmode()
lightboxFunctions()