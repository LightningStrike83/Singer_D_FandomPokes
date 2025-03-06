<!DOCTYPE html>
<html lang="en">
<?php
session_start();

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Atkinson+Hyperlegible+Next:ital,wght@0,200..800;1,200..800&family=Public+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="./images/favicon/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/svg+xml" href="./images/favicon/favicon.svg">
    <link rel="shortcut icon" href="./images/favicon/favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="./images/favicon/apple-touch-icon.png">
    <meta name="apple-mobile-web-app-title" content="MyWebSite">
    <link rel="manifest" href="./images/favicon/site.webmanifest">
    <link rel="stylesheet" href="css/grid.css?version=0.1">
    <link rel="stylesheet" href="css/main.css?version=0.1">
    <script type="module" src="js/main.js?version=0.1"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollToPlugin.min.js"></script>
    <title>Fandom PokePartners- Suggest A Character</title>
</head>
<body data-page="suggest" class="dm">
    <header class="dm">
        <div id="supplementary-header">
            <div id="theme-enable">
                <img id="theme-image" src="images/dark-icon.png" alt="Theme Icon">
                <p id="theme-enable-text">Enable <span id="theme-text">Dark</span> Mode</p>
            </div>

            <div id="hamburger-menu">
                <img src="images/ham_menu.svg" alt="Hamburger Menu">
            </div>

            <?php
                if(!isset($_SESSION['username'])) {
                    echo '<div id="login-con" data-id="na"><a href="login.html">Login</a><p class="link-divider">/</p><a href="register.html">Register</a></div>';
                } else {
                    $username = $_SESSION['username'];
                    $id = $_SESSION['id']; 
                    echo '<div id="login-con" class="login" data-id="'.$id.'"><p>Welcome, <a class="profile-name" href="profile.php?id='.$id.'">'.$username.'</a> <p class="link-divider">/</p> <a class="logout" href="logout.php">Logout</a></p></div>';
                }
            ?>
            
        </div>

        <div id="primary-header">
            <a id="header-logo" href="index.php"><img src="images/logo-black.svg" alt="Logo for Fandom PokePartners"></a>

            <div id="links-con">
                <ul id="links">
                    <li><a href="index.php">Character Database</a></li>
                    <li class="link-divider">/</li>
                    <li><a href="suggestion.php">Suggest</a></li>
                </ul>
            </div>
        </div>
    </header>

    <section id="error-con" class="grid-con">
        <h2 class="hidden">Error Handling</h2>
        <p class="col-span-full base-error" id="suggest-error-message"></p>
    </section>

    <section class="grid-con">
        <h2 class="hidden">Suggest A Character</h2>

        <div id="rule-con" class="col-span-full dm">
            <h3 id="read-text" class="dm"><b>Please Read The Full Rules Before Submitting</b></h3>

            <div id="fictional-rules" class="rules-text dm">
                <p><b>1.</b> Fandom PokePartners only accepts fictional characters only. While 'fictional' can be a very broad term, any characters depicted in live-action are allowed, but any real life people (including actors, voice actors, musicians, etc.) will not be accepted without notification. Fandom PokePartners wishes to maintain and respects freedom of choice for these individuals, unless if these individuals reach out and give consent to be added. Likewise, any people from real life that are depicting themselves, or are being satired, in a fictious manner will be denied for the same reasons as mentioned above, unless consent is given. <!--  Examples:<br>
                    <ul class="example-list">
                        <li>Chris Evans <b>is not allowed</b> 🚫</li>
                        <li>Steve Rogers/Captain America (MCU) <b>is allowed</b> ✅</li>
                        <li>Matt Mercer <b>is not allowed</b> 🚫</li>
                        <li>Cole Cassidy (Overwatch) <b>is allowed</b> ✅</li>
                        <li>Selena Gomez is <b>not allowed</b> 🚫</li>
                        <li>Alex Russo (Wizards of Waverly Place) <b>is allowed</b> ✅</li>
                        <li>LeBron James (Multiversus/Space Jam: A New Legacy) <b>is not allowed</b> 🚫</li>
                    </ul>-->
                </p>

                <input type="checkbox" id="fiction-box" class="rule-checkbox" data-checkbox="Rule 1"><label for="fiction-box">I understand and agree that my suggestion will be based off of a fictional character and my suggestion may be subject to denial and/or removal if it is discovered to be a real life person</label>
            </div>

            <div id="age-restriction-rules" class="rules-text dm">
                <p><b>2.</b> Fandom PokePartners does not allow suggestions based on media that are sexually explicit in nature. Characters from restricted content such as M-rated games and R-rated TV Shows and movies are allowed, but characters from specific media that are prohibited from younger audiences will not be accepted. If the source series is banned on Steam and/or needs an ID to access the material, it will not be accepted here. Any source material that contains sexual themes, such as ecchi anime series, will be accepted as long as it is not explicit and/or the depicted character is appropriate for audience viewing. <!-- Examples:<br>
                    <ul class="example-list">
                        <li>South Park <b>is allowed</b> ✅</li>
                        <li>Huniepop <b>is not allowed</b> 🚫</li>
                        <li>Ivy (Soulcalibur) <b>is allowed</b> ✅</li>
                        <li>To Love Ru <b>is allowed ✅</b></li>
                        <li>Itadaki! Seieki <b>is not allowed</b> 🚫</li>
                    </ul> -->
                </p>

                <input type="checkbox" id="age-restricted-box" class="rule-checkbox" data-checkbox="Rule 2"><label for="age-restricted-box">I understand and agree that my suggestion is not based off any sexually explicit material, and will be subject to denial and/or removal if it is discovered to be</label>
            </div>

            <div id="problematic-rules" class="rules-text dm">
                <p><b>3.</b> Fandom PokePartners does not allow suggestions based on characters or media that are widely regarded to be harmful or offensive in nature, with some exceptions. While the definition of 'harmful' can vary, this includes, but is not limited to, any source material or characters that promotes or perpetuates harmful stereotypes, discrimination, or hate, such as homophobia, transphobia, racism, anti-semetism, etc. unless the content is presented in a way that promotes positive messaging, raises constructive awareness of the issue, or is intended as satire in good faith.</p>

                <input type="checkbox" id="problematic" class="rule-checkbox" data-checkbox="Rule 3"><label for="problematic">I understand and agree that my suggestion is not considered harmful or offensive or comes from a media that is, unless it falls under the exceptions listed above, and will be subject to denial and/or removal if it is discovered to be</label>
            </div>
            
            <div id="oc-rules" class="rules-text dm">
                <p><b>4.</b> Fandom PokePartners does not allow characters that are considered to be fan-made. While the developer of this website loves and supports the creation of fan-made characters, Fandom PokePartners is intended for canon characters only. Fandom PokePartners is looking into an alternative way of sharing fan-made characters with others and have creators ask for suggestions, but these characters will not be added to and/or removed from the database.</p>

                <input type="checkbox" id="fan-made" class="rule-checkbox" data-checkbox="Rule 4"><label for="fan-made">I understand and agree that my suggestion is not a fan-made character, and will be subject to denial and/or removal if it is discovered to be</label>
            </div>

            <button id="accept-button" class="accept-button dm">Accept and Continue</button>

            <p id="rule-error"></p>
        </div>

        <div id="suggest-con" class="col-span-full dm">
            <h3>Suggest A Character</h3>

            <form id="suggest-character">
                <label for="character_name">Character Name (Required)*</label>
                <input type="text" name="character_name" id="character_name" class="dm">

                <label for="series">Series Name (Required)*</label>
                <input type="text" name="series" id="series" class="dm">

                <label for="subseries">Subseries Name <span data-info="subseries-info" class="more-info dm">?</span></label>
                <input type="text" name="subseries" id="subseries" class="dm">

                <label for="wiki_page">Wiki / Fandom Page <span data-info="wiki-info" class="more-info dm">?</span></label>
                <input type="text" name="wiki_page" id="wiki_page" class="dm">

                <label for="starting_pokemon">Starting Pokemon (Required)*</label>
                <select class="dm" id="suggest-pokemon"></select>

                <label for="shiny" id="shiny-label">Shiny?:</label>

                <div id="shiny-checkbox-con">
                    <input type="checkbox" id="pokemon-submit-shiny"><label for="shiny" id="shiny-label-click">The Pokemon is shiny</label>
                </div>

                <input type="submit" id="suggest-character-submit" class="dm">
            </form>

            <p id="suggest-error"></p>
        </div>
    </section>

    <section class="grid-con">
        <h2 class="hidden">To Top Button</h2>
        <div class="col-start-2 col-end-4 m-col-start-6 m-col-end-8">
            <p id="top-text" class="dm">To Top ↑</p>
        </div>
    </section>

    <footer class="full-width-grid-con dm">
        <p id="footer-disclaimer" class="col-start-2 col-span-1">All images used are used for a transformative work and nonprofit. The images are copyrighted or are a registered trademark, sourced from the various Wiki/Fandom pages and galleries. The contributor claims fair use. No copyright infringement is intended.<br><br>Certain materials are included under fair use exemption of the U.S. Copyright Law and are restricted from further use.<br><br>Fandom PokePartners is a fansite and are not official in any shape or form, nor affiliated, sponsored, or endorsed by any of the series, creators, parent companies, or affiliated persons found throughout the website. The content displayed in this website is meant for informational purposes only and is not official in any shape or form.<br><br><a href="privacy.php">Privacy Policy</a> | <a href="contact.php">Contact</a></p>
    </footer>

    <section id="hamburger-menu-con" class="full-width-grid-con mobile-menu dm">
        <h1 class="hidden">Mobile-Menu</h1>
        <div class="col-start-2 col-span-1 mobile-links">
            <a href="index.php">Character Database</a>
            <div class="hamburger-divider"></div>
            <a href="suggestion.php">Suggest</a>
            <div class="hamburger-divider"></div>
            <?php if(!isset($_SESSION['username'])) {
                    echo '<a href="login.html">Login</a><div class="hamburger-divider"></div><a href="register.html">Register</a>';
                } else {
                    $username = $_SESSION['username'];
                    $id = $_SESSION['id']; 
                    echo '<a href="profile.php?id='.$id.'">Profile</a><div class="hamburger-divider"></div><a class="logout" href="logout.php">Logout</a>';
                } ?>
            <div class="hamburger-divider"></div>
            <a href="contact.php">Contact</a>
        </div>

        <div class="col-span-1 mobile-close">
            <p class="close-button">X</p>
        </div>
    </section>

    <section id="subseries-info" class="info-box dm full-width-grid-con">
        <h2 class="hidden">Subseries Explanation Box</h2>
        <p class="info-text col-start-2 col-span-1">A subseries is a title that branches under the main series / franchise. This helps users from getting overwhelmed if there's series with multiple different titles with different casts, or helps create a distinction between versions of characters. Not every series has a subseries or needs to be divided. If you're unsure, please re-enter the series name. <br><br>Examples of subseries:<br>-Yu-Gi-Oh! GX<br>-Persona 5<br>-Marvel Cinematic Universe</p>

        <div class="col-span-1 mobile-close">
            <p class="close-button">X</p>
        </div>
    </section>

    <section id="wiki-info" class="info-box dm full-width-grid-con">
    <h2 class="hidden">Wiki Explanation Box</h2>
        <p class="info-text col-start-2 col-span-1">Linking to a Wiki / Fandom page is not required, but will give the submission a priority. This helps the dev collect appropriate assets and information to use for the website.</p>

        <div class="col-span-1 mobile-close">
            <p class="close-button">X</p>
        </div>
    </section>
</body>
</html>