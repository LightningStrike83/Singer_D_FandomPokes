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
                    echo '<div id="login-con"><a href="login.html">Login</a><li class="link-divider">/</li><a href="register.html">Register</a></div>';
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
        <p id="update-text" class="col-start-2 col-span-2 dm">Last Content Update: Sept. 24, 2025</p>
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
</body>
</html>