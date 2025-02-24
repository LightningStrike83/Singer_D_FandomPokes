<!DOCTYPE html>
<html lang="en">

<?php
session_start();

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/grid.css?version=0.1">
    <link rel="stylesheet" href="css/main.css?version=0.1">
    <script type="module" src="js/main.js?version=0.1"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollToPlugin.min.js"></script>
    <title>Fandom PokePartners</title>
</head>
<body data-page="home" class="dm">
<header>
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
                    echo '<div id="login-con" data-id="na"><a href="login.html">Login</a><li class="link-divider">/</li><a href="register.html">Register</a></div>';
                } else {
                    $username = $_SESSION['username'];
                    $id = $_SESSION['id']; 
                    echo '<div id="login-con" class="login" data-id="'.$id.'"><p>Welcome, <a class="profile-name" href="profile.php?id='.$id.'">'.$username.'</a> <li class="link-divider">/</li> <a class="logout" href="logout.php">Logout</a></p></div>';
                }
            ?>
            
        </div>

        <div id="primary-header">
            <img src="images/pokeball-full.svg" alt="">

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
        <p id="update-text" class="col-start-2 col-span-2 dm">Last Content Update: <span id="patch-open">Feb. 23, 2025</span></p>
    </div>

    <section id="error-con" class="grid-con">
        <h2 class="hidden">Error Handling</h2>
        <p class="col-span-full base-error" id="home-error-message"></p>
    </section>

    <section class="grid-con">
        <h2 class="hidden"></h2>

        <div class="select-con col-span-full">
            <select class="select-list" id="main-select"></select>
        </div>


        <div class="select-con col-span-full">
            <select class="select-list" id="sub-select">
                <option disabled selected value="none">--Please Select A Series First--</option>
            </select>
        </div>
    </section>

    <section class="grid-con">
        <div id="character-list-select" class="select-con col-span-full">
            <select class="select-list" id="character-list">
                <option disabled selected value="none">--Please Select A Subseries First--</option>
            </select>
        </div>
        <div id="character-list-con" class="col-span-2 dm">
            <p id="character-list-title" class="dm">Character List</p>
        </div>
        <div id="character-partner-con" class="col-span-full m-col-span-10 dm"></div>
    </section>

    <section class="grid-con">
        <div class="col-start-2 col-end-4 m-col-start-6 m-col-end-8">
            <p id="top-text" class="dm">To Top ↑</p>
        </div>
    </section>

    <footer class="full-width-grid-con">
        <p id="footer-disclaimer" class="col-start-2 col-span-1">All images used are used for a transformative work and nonprofit. The images are copyrighted or are a registered trademark, sourced from the various Wikias/Fandoms. The contributor claims fair use. No copyright infringement is intended.<br><br>Certain materials are included under fair use exemption of the U.S. Copyright Law and are restricted from further use.<br><br>Fandom PokePartners is a fansite and are not official in any shape or form, nor affiliated, sponsored, or endorsed by any of the series, creators, parent companies, or affiliated persons found throughout the website. The content displayed in this website is meant for informational purposes only and is not official in any shape or form.</p>
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
        </div>

        <div class="col-span-1 mobile-close">
            <p class="close-button">X</p>
        </div>
    </section>

    <section id="pokemon-submission-con" class="full-width-grid-con lightbox">
        <h2 class="hidden">Pokemon Submission Rules</h2>

        <div id="pokemon-select-con" class="col-start-2 col-span-1" class="grid-con">
            <h3 id="select-title" class="col-span-full">Submit A Pokemon</h3>
            
            <form id="pokemon-submit-form">
                <label for="character">Character:</label>
                <input id="pokemon-submit-character" type="text" disabled>

                <label for="pokemon">Pokemon:</label>
                <select id="pokemon-submit-select"></select>

                <input type="submit" value="Submit" id="submit-pokemon">
            </form>

            <p id="submit-poke-text"></p>
        </div>

        <div class="col-span-1 mobile-close">
            <p class="close-button">X</p>
        </div>
    </section>

    <section id="vote-box">
        <p>Sorry, you must be logged in to vote</p>
    </section>

    <section id="upvote-prevent-box">
        <p>Sorry, you have already voted for that Pokemon for that character</p>
    </section>

    <section id="update-lb-con" class="full-width-grid-con lightbox">
        <h2 class="hidden">Update Notes</h2>

        <div id="update-info-con" class="col-start-2 col-span-1 grid-con">
            <h3 id="update-title" class="col-span-full">Update Notes</h3>
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
                -Miraculous: Tales of Ladybug & Cat Noir<br></p>

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
</p>
            </div>
        </div>

        <div class="col-span-1 mobile-close">
            <p class="close-button">X</p>
        </div>
    </section>
</body>
</html>