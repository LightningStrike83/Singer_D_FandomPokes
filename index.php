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
    <title>Fandom PokePartners- Character Database</title>
</head>
<body data-page="home" class="dm">
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

    <div id="update-con" class="full-width-grid-con">
        <div id="head-info-con" class="col-span-full">
            <p id="home-about-text" class="dm"><span class="more-info dm">?</span> About the Site</p>
            <p id="update-text" class="dm">Last Content Update: <span id="patch-open">March 4th, 2025</span></p>
        </div>
    </div>

    <section id="error-con" class="grid-con">
        <h2 class="hidden">Error Handling</h2>
        <p class="col-span-full base-error" id="home-error-message"></p>
    </section>

    <section class="grid-con">
        <h2 class="hidden">Series Lists</h2>

        <div class="select-con col-span-full">
            <select class="select-list dm" id="main-select"></select>
        </div>


        <div class="select-con col-span-full">
            <select class="select-list dm" id="sub-select">
                <option disabled selected value="none">--Please Select A Series First--</option>
            </select>
        </div>
    </section>

    <section class="grid-con">
        <h2 class="hidden">Character and Partner Display</h2>
        <div id="character-list-select" class="select-con col-span-full">
            <select class="select-list dm" id="character-list">
                <option disabled selected value="none">--Please Select A Subseries First--</option>
            </select>
        </div>
        <div id="character-list-con" class="col-span-3 dm">
            <p id="character-list-title" class="dm">Character List</p>
        </div>
        <div id="character-partner-con" class="col-span-full m-col-span-9 dm"></div>
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

    <section id="pokemon-submission-con" class="full-width-grid-con lightbox dm">
        <h2 class="hidden">Pokemon Submission Rules</h2>

        <div id="pokemon-select-con" class="col-start-2 col-span-1">
            <h3 id="select-title" class="col-span-full">Submit A Pokemon</h3>
            
            <form id="pokemon-submit-form">
                <label for="character">Character:</label>
                <input id="pokemon-submit-character" type="text" disabled>

                <label for="pokemon">Pokemon:</label>
                <select class="dm" id="pokemon-submit-select"></select>

                <label for="shiny" id="shiny-label">Shiny?:</label>

                <div id="shiny-checkbox-con">
                    <input type="checkbox" id="pokemon-submit-shiny"><label for="shiny" id="shiny-label-click">The Pokemon is shiny</label>
                </div>

                <input type="submit" value="Submit" id="submit-pokemon" class="dm">
            </form>

            <p id="submit-poke-text"></p>
        </div>

        <div class="col-span-1 mobile-close">
            <p class="close-button">X</p>
        </div>
    </section>

    <section id="vote-box">
        <h2 class="hidden">Login Vote Warning Box</h2>
        <p>Sorry, you must be logged in to vote</p>
    </section>

    <section id="upvote-prevent-box">
    <h2 class="hidden">Duplicate Vote Warning Box</h2>
        <p>Sorry, you have already voted for that Pokemon for that character</p>
    </section>

    <section id="update-lb-con" class="full-width-grid-con lightbox dm">
        <h2 class="hidden">Update Notes</h2>

        <div id="update-info-con" class="col-start-2 col-span-1 grid-con">
            <h3 id="update-title" class="col-span-full">Update Notes: March 4th, 2025</h3>
            <div id="update-info" class="col-span-full">
                <h3>Series / Subseries Added:</h3>
                <p>-Smosh<br>
                -Vocaloid<br>
                -Yu-Gi-Oh! Duel Monsters<br>
                -Yu-Gi-Oh! GX<br>
                -Yu-Gi-Oh! 5D's<br>
                -Yu-Gi-Oh! Zexal<br>
                -Yu-Gi-Oh! Arc-V<br>
                -Yu-Gi-Oh! VRAINS<br>
                -Yu-Gi-Oh! Sevens<br>
                -Yu-Gi-Oh! Go Rush!!<br>
                -Marvel Cinematic Universe (MCU)<br>
                -DC Universe (DCU)<br>
                -Spiderverse (Film Series)<br>
                -Marvel Comics<br>
                -DC Comics<br>
                -DC Extended Universe (DCEU)<br>
                -DC Animated Universe (DCAU)<br>
                -The Legend of Zelda: Breath of the Wild / Tears of the Kingdom<br>
                -The Legend of Zelda: Echoes of Wisdom<br>
                -Fire Emblem: Shadow Dragon / New Mystery of the Emblem<br>
                -Fire Emblem: Shadows of Valentia<br>
                -Fire Emblem: Geneology of the Holy War / Thracia 776<br>
                -Fire Emblem: The Binding Blade<br>
                -Fire Emblem: The Blazing Blade<br>
                -Fire Emblem: Sacred Stones<br>
                -Fire Emblem: Path of Radiance / Radiant Dawn<br>
                -Fire Emblem Awakening<br>
                -Fire Emblem Fates<br>
                -Fire Emblem Three Houses / Three Hopes<br>
                -Fire Emblem Heroes<br>
                -Fire Emblem Engage<br>
                -Tokyo Mirage Sessions #FE<br>
                -Fire Emblem 0 (Cipher)<br>
                -Ben 10 (OG)<br>
                -Fire Emblem Warriors<br>
                -Persona 3<br>
                -Persona 4<br>
                -Persona 5<br>
                -Sword Art Online<br>
                -Sword Art Online Alternative: Gun Gale Online<br>
                -Trails in the Sky<br>
                -Super Mario (series)<br>
                -Ben 10: Alien Force / Ultimate Alien<br>
                -Ben 10: Omniverse<br>
                -Ben 10 (Reboot)<br>
                -Genshin Impact<br>
                -Honkai Impact 3rd<br>
                -Honkai Star Rail<br>
                -Naruto<br>
                -Naruto Shippuden<br>
                -Hazbin Hotel<br>
                -Boruto: Naruto Next Generations<br>
                -Fairy Tail<br>
                -Fairy Tail 100 Years Quest<br>
                -DC Animated Movie Universe<br>
                -Project Sekai<br>
                -Metroid<br>
                -Miraculous: Tales of Ladybug & Cat Noir<br>
                -Doki Doki Literature Club<br>
                -Xenoblade Chronicles</p>

                <h3>Characters Added:</h3>
                <p>-The Chosen<br>
                -Hatsune Miku<br>
                -Hilda Valentine Goneril<br>
                -Xane<br>
                -Joey Wheeler<br>
                -Seto Kaiba<br>
                -Rhino (Aleksei Sytsevich)<br>
                -Asuna Yuuki<br>
                -Miles Morales (Earth 1610B)<br>
                -Princess Peach<br>
                -Yuri Leclerc<br>
                -Noir (Haru Okumura)<br>
                -Tita Russell<br>
                -Marianne von Edmund<br>
                -Joker (Ren Amamiya)<br>
                -Rise Kujikawa<br>
                -Mitsuru Kijiro<br>
                -Kirito (Kazuto Kirigaya)<br>
                -Ben Tennyson<br>
                -Ben Tennyson<br>
                -Princess Rosalina<br>
                -Ben Tennyson<br>
                -Ben Tennyson<br>
                -Akiza Izinski<br>
                -Blue Maiden (Skye Zaizen)<br>
                -Shark (Reginald Kastle)<br>
                -Chumley Huffington<br>
                -Vellian Crowler<br>
                -Kamisato Ayaka<br>
                -Firefly<br>
                -Henry<br>
                -Celine<br>
                -Azura<br>
                -Eirika<br>
                -Ephraim<br>
                -Rinea<br>
                -Loki<br>
                -Tsubasa Oribe<br>
                -Kiria Kurono<br>
                -Hector<br>
                -Naruto Uzumaki<br>
                -Naruto Uzumaki<br>
                -Alastor<br>
                -Jiraiya<br>
                -Jiraiya<br>
                -Naruto Uzumaki<br>
                -Lucy Heartfilia<br>
                -Yukino Agria<br>
                -Jack Atlas<br>
                -Kevin Levin<br>
                -LLEN (Kohirumaki Karen)<br>
                -Harley Quinn<br>
                -Harley Quinn<br>
                -Harley Quinn<br>
                -Harley Quinn<br>
                -Princess Ilana Rostovic<br>
                -Faris<br>
                -Elysia<br>
                -Captain America (Steve Rogers)<br>
                -Akiyama Mizuki<br>
                -Yuya Sakaki<br>
                -Princess Zelda<br>
                -Link<br>
                -Princess Zelda<br>
                -Ganondorf<br>
                -Samus Aran<br>
                -Fae<br>
                -Reinhardt<br>
                -Leanne<br>
                -Rowan<br>
                -Lianna<br>
                -Valjean<br>
                -Yuga Ohdo<br>
                -Yudias Velgear<br>
                -Marinette Dupain-Cheng (Ladybug)<br>
                -Adrien Agreste (Cat Noir)<br>
                -Gabriel Agreste (Hawkmoth)<br>
                -Alya Cesaire (Rena Rouge)<br>
                -Nino Lahiffe (Carapace)<br>
                -Chloe Bourgeois (Queen Bee)<br>
                -Zoe Lee (Vesperia)<br>
                -Cerise Bianca (Chrysalis)<br>
                -Morgana (Mona)<br>
                -Ryuji Sakamoto (Skull)<br>
                -Ann Takamaki (Panther)<br>
                -Makoto Niijima (Queen)<br>
                -Yusuke Kitagawa (Fox)<br>
                -Futaba Sakura (Oracle)<br>
                -Goro Akechi (Crow / Black Mask)<br>
                -Sumire Yoshizawa (Violet)<br>
                -Lavenza<br>
                -Sae Niijima<br>
                -Takuto Maruki<br>
                -Monika<br>
                -Valentino<br>
                -Sanganomiya Kokomi<br>
                -Batman (Terry McGinnis)<br>
                -Yami Bakura<br>
                -Shulk
                </p>
            </div>
        </div>

        <div class="col-span-1 mobile-close">
            <p class="close-button">X</p>
        </div>
    </section>

    <section id="primary-info-con" class="full-width-grid-con lightbox dm">
        <div class="mobile-close col-start-2 col-span-1">
            <p class="close-button">X</p>
        </div>

        <div id="welcome-con" class="col-start-2 col-span-1">
            <h3>Welcome to Fandom PokePartners</h3>
            <p>Fandom PokePartners is a non-profit database of characters from fictional media with suggestions of Pokemon that they may use. This website's primary focus is to inspire creatives</p>

            <h4>How to Use The Site:</h4>
            <ul>
                <li>Use the select lists to narrow down characters by their series and populate either the Character List box (desktop) or character select list (mobile) with characters</li>
                <li>On desktop, click on the character you wish to view from the Character List</li>
                <li>On mobile, use the select list to select the character you wish to view</li>
                <li>You can submit a Pokemon for the character by clicking the "Submit A Pokemon For This Character" button and filling out a quick form (approved automatically)</li>
                <li>To submit a character, click on the suggestion page, accept the terms of submission, and fill out the form (requires developer approval)</li>
                <li>To upvote a partner suggestion, create an account and click the respective arrow in the Pokemon's container</li>
                <li>Fill out your profile with fandom related information by clicking the "Edit Profile" button on your profile page</li>
                <li>If you run into any issues or wish to contact the developer, please visit the <a href="contact.php">contact page</a></li>
            </ul>

            <h4>Disclaimers:</h4>
            <ul>
                <li>Fandom PokePartners is not official in any capacity nor has any relations to anyone from The Pokemon Company or any creators or series that are found within the website</li>
                <li>All images are sourced from their respective wiki / fandom pages which are attributed as fair use</li>
                <li>Pokemon images are sourced from spriters-resource, originally from Pokemon Home</li>
            </ul>

            <h4>Special Thanks:</h4>
            <ul>
                <li>DucessaEva for design review and alpha testing</li>
                <li>Sophia for the icons for the profile pages and design help</li>
                <li>TwistedTempoGaming, sunbiscuit, and Yumichan216 for inspiration and support</li>
            </ul>
        </div>
    </section>
</body>
</html>