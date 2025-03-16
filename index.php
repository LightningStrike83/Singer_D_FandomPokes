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
    <meta name="apple-mobile-web-app-title" content="Fandom PokePartners">
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
                <img class="dm" src="images/ham_menu.svg" alt="Hamburger Menu">
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
            <a id="header-logo" class="dm" href="index.php"><img src="images/logo3.svg" alt="Logo for Fandom PokePartners"></a>

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
            <p id="update-text" class="dm">Last Content Update: <span id="patch-open">March 16th, 2025</span></p>
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
        <p id="footer-disclaimer" class="col-start-2 col-span-1">All images used are used for a transformative work and nonprofit. The images are copyrighted or are a registered trademark, sourced from the various Wiki/Fandom pages and galleries. The contributor claims fair use. No copyright infringement is intended.<br><br>Certain materials are included under fair use exemption of the U.S. Copyright Law and are restricted from further use.<br><br>Fandom PokePartners is a fansite and are not official in any shape or form, nor affiliated, sponsored, or endorsed by any of the series, creators, parent companies, or affiliated persons found throughout the website. Fandom PokePartners is not affiliated or endorsed by Fandom. The content displayed in this website is meant for informational purposes only and is not official in any shape or form.<br><br><a href="privacy.php">Privacy Policy</a> | <a href="toc.php">Terms and Conditions</a> | <a href="contact.php">Contact</a></p>
    </footer>

    <section id="hamburger-menu-con" class="full-width-grid-con mobile-menu dm">
        <h1 class="hidden">Mobile-Menu</h1>
        <div class="col-start-2 col-span-1 mobile-links">
            <div class="col-span-1 mobile-close">
                <div>
                    <p class="close-button">X</p>
                </div>
            </div>
            <a href="index.php">Character Database</a>
            <div class="hamburger-divider"></div>
            <a href="suggestion.php">Suggest</a>
            <div class="hamburger-divider"></div>
            <?php if(!isset($_SESSION['username'])) {
                    echo '<a href="login.html">Login</a><div class="hamburger-divider"></div><a href="register.html">Register</a><div class="hamburger-divider"></div><a href="contact.php">Contact</a>';
                } else {
                    $username = $_SESSION['username'];
                    $id = $_SESSION['id']; 
                    echo '<a href="profile.php?id='.$id.'">Profile</a><div class="hamburger-divider"></div>
                    <a href="contact.php">Contact</a><div class="hamburger-divider"></div><a class="logout" href="logout.php">Logout</a>';
                } ?>
            
        </div>
    </section>

    <section id="pokemon-submission-con" class="full-width-grid-con lightbox dm">
        <h2 class="hidden">Pokemon Submission Rules</h2>

        <div id="pokemon-select-con" class="col-start-2 col-span-1">
            <div class="col-span-1 mobile-close">
                <div>
                    <p class="close-button">X</p>
                </div>
            </div>

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
            <div class="col-span-1 col-start-4 m-col-start-12 mobile-close">
                <div>
                    <p class="close-button">X</p>
                </div>
            </div>
            <h3 id="update-title" class="col-span-full">Update Notes: March 16th, 2025</h3>
            <div id="update-info" class="col-span-full">
                <h3>Series / Subseries Added:</h3>
                <p>-Ben 10 (OG)
                -Ben 10 (Reboot)<br>
                -Ben 10: Alien Force / Ultimate Alien<br>
                -Ben 10: Omniverse<br>
                -Boruto: Naruto Next Generations<br>
                -Comics<br>
                -Comics<br>
                -DC Animated Movie Universe<br>
                -DC Animated Universe (DCAU)<br>
                -DC Extended Universe (DCEU)<br>
                -DC Universe (DCU)<br>
                -Doki Doki Literature Club<br>
                -Fairy Tail<br>
                -Fairy Tail 100 Years Quest<br>
                -Fire Emblem 0 (Cipher)<br>
                -Fire Emblem Awakening<br>
                -Fire Emblem Engage<br>
                -Fire Emblem Fates<br>
                -Fire Emblem Heroes<br>
                -Fire Emblem Three Houses / Three Hopes<br>
                -Fire Emblem Warriors<br>
                -Fire Emblem: Geneology of the Holy War / Thracia 776<br>
                -Fire Emblem: Path of Radiance / Radiant Dawn<br>
                -Fire Emblem: Sacred Stones<br>
                -Fire Emblem: Shadow Dragon / New Mystery of the Emblem<br>
                -Fire Emblem: Shadows of Valentia<br>
                -Fire Emblem: The Binding Blade<br>
                -Fire Emblem: The Blazing Blade<br>
                -Genshin Impact<br>
                -Hazbin Hotel<br>
                -Honkai Impact 3rd<br>
                -Honkai Star Rail<br>
                -Marvel Cinematic Universe (MCU)<br>
                -Metroid<br>
                -Miraculous: Tales of Ladybug & Cat Noir<br>
                -Naruto<br>
                -Naruto Shippuden<br>
                -Persona 3<br>
                -Persona 4<br>
                -Persona 5<br>
                -Project Sekai<br>
                -Smosh<br>
                -Sonic (game series)<br>
                -Spiderverse (Film Series)<br>
                -Super Mario (series)<br>
                -Sword Art Online<br>
                -Sword Art Online Alternative: Gun Gale Online<br>
                -The Legend of Zelda: Breath of the Wild / Tears of the Kingdom<br>
                -The Legend of Zelda: Echoes of Wisdom<br>
                -Tokyo Mirage Sessions #FE<br>
                -Trails in the Sky<br>
                -Vocaloid<br>
                -Xenoblade Chronicles<br>
                -Yu-Gi-Oh! 5D's<br>
                -Yu-Gi-Oh! Arc-V<br>
                -Yu-Gi-Oh! Duel Monsters<br>
                -Yu-Gi-Oh! Go Rush!!<br>
                -Yu-Gi-Oh! GX<br>
                -Yu-Gi-Oh! Sevens<br>
                -Yu-Gi-Oh! VRAINS<br>
                -Yu-Gi-Oh! Zexal
                </p>

                <h3>Characters Added:</h3>
                <p>-Adrien Agreste (Cat Noir)<br>
                -Akiyama Mizuki<br>
                -Akiza Izinski<br>
                -Amy Rose<br>
                -Alastor<br>
                -Alya Cesaire (Rena Rouge)<br>
                -Ann Takamaki (Panther)<br>
                -Asuna Yuuki<br>
                -Azura<br>
                -Batman (Terry McGinnis)<br>
                -Ben Tennyson<br>
                -Ben Tennyson<br>
                -Ben Tennyson<br>
                -Ben Tennyson<br>
                -Blue Maiden (Skye Zaizen)<br>
                -Captain America (Steve Rogers)<br>
                -Celine<br>
                -Cerise Bianca (Chrysalis)<br>
                -Chloe Bourgeois (Queen Bee)<br>
                -Chumley Huffington<br>
                -Dr. Ivo "Eggman" Robotnik<br>
                -Eirika<br>
                -Eliwood<br>
                -Elysia<br>
                -Ephraim<br>
                -Fae<br>
                -Faris<br>
                -Firefly<br>
                -Forrest<br>
                -Futaba Sakura (Oracle)<br>
                -Gabriel Agreste (Hawkmoth)<br>
                -Ganondorf<br>
                -Goro Akechi (Crow / Black Mask)<br>
                -Harley Quinn<br>
                -Harley Quinn<br>
                -Harley Quinn<br>
                -Harley Quinn<br>
                -Hatsune Miku<br>
                -Hector<br>
                -Henry<br>
                -Hilda Valentine Goneril<br>
                -Jack Atlas<br>
                -Jiraiya<br>
                -Joey Wheeler<br>
                -Joker (Ren Amamiya)<br>
                -Kamisato Ayaka<br>
                -Kevin Levin<br>
                -Kiria Kurono<br>
                -Kirito (Kazuto Kirigaya)<br>
                -Lavenza<br>
                -Leanne<br>
                -Lianna<br>
                -Link<br>
                -LLEN (Kohirumaki Karen)<br>
                -Loki<br>
                -Lucy Heartfilia<br>
                -Lyn<br>
                -Makoto Niijima (Queen)<br>
                -Marianne von Edmund<br>
                -Marinette Dupain-Cheng (Ladybug)<br>
                -Metal Sonic<br>
                -Miles "Tails" Prower<br>
                -Mitsuru Kijiro<br>
                -Monika<br>
                -Morgana (Mona)<br>
                -Naruto Uzumaki<br>
                -Naruto Uzumaki<br>
                -Naruto Uzumaki<br>
                -Nino Lahiffe (Carapace)<br>
                -Noir (Haru Okumura)<br>
                -Princess Ilana Rostovic<br>
                -Princess Peach<br>
                -Princess Rosalina<br>
                -Princess Zelda<br>
                -Princess Zelda<br>
                -Reinhardt<br>
                -Rhino (Aleksei Sytsevich)<br>
                -Rinea<br>
                -Rise Kujikawa<br>
                -Rowan<br>
                -Ryuji Sakamoto (Skull)<br>
                -Sae Niijima<br>
                -Samus Aran<br>
                -Sanganomiya Kokomi<br>
                -Seto Kaiba<br>
                -Sir Pentious<br>
                -Shark (Reginald Kastle)<br>
                -Shulk<br>
                -Silver the Hedgehog<br>
                -Spider-Man (Miles Morales) (Earth 1610B)<br>
                -Spider-Man Noir (Peter Parker) (Earth-90214)<br>
                -Sonic the Hedgehog<br>
                -Strea<br>
                -Sumire Yoshizawa (Violet)<br>
                -Takuto Maruki<br>
                -The Chosen<br>
                -Tita Russell<br>
                -Tsubasa Oribe<br>
                -Valentino<br>
                -Valjean<br>
                -Vellian Crowler<br>
                -Waluigi<br>
                -Xane<br>
                -Yami Bakura<br>
                -Yudias Velgear<br>
                -Yuga Ohdo<br>
                -Yukino Agria<br>
                -Yuri Leclerc<br>
                -Yusuke Kitagawa (Fox)<br>
                -Yuya Sakaki<br>
                -Zoe Lee (Vesperia)
                </p>
            </div>
        </div>
    </section>

    <section id="primary-info-con" class="full-width-grid-con lightbox dm">
        <div class="wrapper-con">
            <div id="welcome-con" class="col-start-2 col-span-1 info-con">
                <div class="mobile-close col-start-2 col-span-1">
                    <p class="close-button">X</p>
                </div>
                
                <div id="intro-con">
                    <img id="intro-logo" src="images/logo3-dark.svg" alt="Logo of Fandom PokePartners">
                    <h3>Welcome to Fandom PokePartners</h3>
                </div>
                <p>Fandom PokePartners is a non-profit database featuring characters from fictional media alongside suggestions of Pokemon that they may use or befriend. This website's primary goal is to inspire creatives and provide a space for fans to share their ideas. All character entries and Pokemon suggestions are submissions from fans.</p>

                <h4>How to Use The Site:</h4>
                <ul>
                    <li>Use the select lists to narrow down characters by their series and populate either the Character List box (desktop) or character select list (mobile) with characters</li>
                    <li>On desktop, click on the character you wish to view from the Character List</li>
                    <li>On mobile, use the select list to select the character you wish to view</li>
                    <li>You can submit a Pokemon for the character by clicking the "Submit A Pokemon For This Character" button and filling out a quick form (approved automatically)</li>
                    <li>You can visit the character's wiki / fandom page by clicking or tapping their name if it has an <img class="external-icon" src="./images/icons/white-external.svg" alt="External Link Icon"> icon</li>
                    <li>To submit a character, click on the suggestion page, accept the terms of submission, and fill out the form (requires developer approval)</li>
                    <li>To upvote a partner suggestion, create an account and click the respective arrow in the Pokemon's container</li>
                    <li>Fill out your profile with fandom related information by clicking the "Edit Profile" button on your profile page</li>
                    <li>Please take a moment to review the <a href="toc.php">terms and conditions</a> and <a href="privacy.php">privacy policy</a></li>
                    <li>If you run into any issues or wish to contact the developer, please visit the <a href="contact.php">contact page</a> and send the dev a message</li>
                </ul>

                <h4>Creator & Associated Link:</h4>
                <ul>
                    <li>Fandom PokePartners is developed, designed, and operated by <a target="_blank" href="http://localhost/Singer_D_FandomPokes/profile.php?id=1">LightningBeyond</a></li>
                    <li>Feel free to check out Lightning's other Pokemon-inspired website <a target="_blank" href="https://littlerootdreams.com/index.html">Littleroot Dreams</a></li>
                </ul>

                <h4>Disclaimers & Credits:</h4>
                <ul>
                    <li>Fandom PokePartners is not official in any capacity nor has any relations to anyone from The Pokemon Company or any creators or series that are found within the website</li>
                    <li>All images are sourced from their respective wiki / fandom pages which are attributed as fair use</li>
                    <li>Pokemon images are sourced from spriters-resource, originally from Pokemon Home</li>
                    <li>Design inspiration for the website came from <a target="_blank" href="https://pokedoku.com/">PokeDoku</a> and <a target="_blank" href="https://pkmn.net/?action=rater">PKMN.net's Name Rater</a></li>
                    <li>Profile Edit icons and External Link icon are sourced from <a target="_blank" href="https://icons8.com/">Icons8</a></li>
                    <li>Pokeball Profile pictures were graciously given by one of the dev's best friends</li>
                </ul>

                <h4>Special Thanks:</h4>
                <ul>
                    <li><a href="https://www.tumblr.com/ducessaeva" target="_blank">DucessaEva</a> for design review and alpha testing</li>
                    <li>Sophia for the icons for the profile pages and design help</li>
                    <li>Yumichan216 for design review and advice</li>
                    <li>TwistedTempoGaming, <a target="_blank" href="https://sunbiscuit.wixsite.com/portfolio">sunbiscuit</a> for inspiration and support</li>
                </ul>
            </div>
        </div>
    </section>
</body>
</html>