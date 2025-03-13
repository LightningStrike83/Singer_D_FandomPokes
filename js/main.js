import { contactForm } from "./modules/contact.js";
import { darkmode } from "./modules/dark-mode.js";
import { forgotPassword } from "./modules/forgot-password.js";
import { forgotUsername } from "./modules/forgot-username.js";
import { hamburgerMenu } from "./modules/hamburger.js";
import { populationFunctionality } from "./modules/home.js";
import { lightboxFunctions } from "./modules/lightbox.js";
import { profilePopulation } from "./modules/profile.js";
import { registerUser } from "./modules/register.js";
import { resetPassword } from "./modules/reset-password.js";
import { ruleCheck } from "./modules/rules.js";
import { smoothScroll } from "./modules/scroll.js";
import { suggestionSubmit } from "./modules/suggestion.js";

function showPage() {
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
    
    if (document.body.dataset.page === 'profile') {
        profilePopulation()
    }
    
    if (document.body.dataset.page === 'contact') {
        contactForm()
    }

    if (document.body.dataset.page === 'forgot-username') {
        forgotUsername()
    }

    if (document.body.dataset.page === 'forgot-password') {
        forgotPassword()
    }

    if (document.body.dataset.page === 'reset-password') {
        resetPassword()
    }
    
    smoothScroll()
    darkmode()
    lightboxFunctions()
    hamburgerMenu()
    
    setTimeout(() => {
        document.body.style.visibility = "visible"
    }, 30)
}

document.addEventListener("DOMContentLoaded", showPage)