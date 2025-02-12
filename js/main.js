import { darkmode } from "./modules/dark-mode.js";
import { populationFunctionality } from "./modules/population.js";
import { smoothScroll } from "./modules/scroll.js";

if (document.body.dataset.page === "home") {
    populationFunctionality()
}

smoothScroll()
darkmode()