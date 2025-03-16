<!DOCTYPE html>
<html lang="en">
<?php
session_start();

require_once('includes/connect.php');
$query = 'SELECT username, user_controllers.id FROM user_controllers WHERE user_controllers.id = :userId ORDER BY username ASC';

$stmt = $connection->prepare($query);
$userId = $_GET['id'];
$stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

$stmt = null;
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
    <title>Fandom PokePartners- <?php echo $row['username']; ?></title>
</head>
<body data-page="profile" class="dm">
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

    <section id="profile-info-con" class="grid-con dm">
        <div id="profile-error-con" class="col-span-full"></div>
        <div id="main-info-con" class="col-span-full m-col-span-3" <?php echo 'data-match="'.$row['id'].'"' ?>>
            <div id="profile-image-con">
                <img id="profile-image" src="images/pokeball-full.svg" alt="<?php echo $row['username'].' icon' ?>">
            </div>

            <?php
                echo '<h3 id="profile-username" class="dm">'.$row['username'].'</h3>';
            ?>
        </div>

        <div id="extra-info-con" class="col-span-full m-col-span-9">
            <div id="tab-con">
                <p id="first-tab" class="profile-tab dm tab-selected" data-link="profile-text">Profile Info</p>
                <p id="middle-tab" class="profile-tab dm" data-link="upvoted">Upvoted (<span id="upvote-count-text">...</span>)</p>
                <p class="profile-tab dm" data-link="submission">Character Submissions (<span id="submissions-count-text">...</span>)</p>
            </div>

            <div id="profile-text-con" class="profile-info-box dm">
                <div class="profile-info-con" id="fav-pokemon-home"><p class="profile-info"><b>Favourite Pokemon:</b><span id="profile-fav-pokemon" class="dynamic-text"></span></p></div>
                <div class="profile-info-divider"></div>
                <div class="profile-info-con text-input" id="fav-trainer-home" data-input="fav_trainer"><p class="profile-info"><b>Favourite Pokemon Trainers:</b><span id="profile-fav-trainer" class="dynamic-text"></span></p></div>
                <div class="profile-info-divider"></div>
                <div class="profile-info-con text-input" id="fav-series-home" data-input="fav_series"><p class="profile-info"><b>Favourite Series:</b><span id="profile-fav-series" class="dynamic-text"></span></p></div>
                <div class="profile-info-divider"></div>
                <div class="profile-info-con text-input" id="fav-characters-home" data-input="fav_characters"><p class="profile-info"><b>Favourite Character (s):</b><span id="profile-fav-character" class="dynamic-text"></span></p></div>
                <div class="profile-info-divider"></div>
                <div class="profile-info-con text-input" id="fandoms-home" data-input="fandoms"><p class="profile-info"><b>Fandoms Interested In:</b><span id="profile-fandoms" class="dynamic-text"></span></p></div>
            </div>
            <div id="upvoted-con" class="profile-info-box dm"></div>
            <div id="submission-con" class="profile-info-box dm"></div>
        </div>
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

    <section id="icon-con" class="dm">
        <h3 id="pokeball-title"> Select An Icon</h3>
        <div id="ball-icon-home">
            <img class="pokeball-icon" src="images/icons/pokeball.svg" alt="Pokeball Icon">
            <img class="pokeball-icon" src="images/icons/greatball.svg" alt="Great Ball Icon">
            <img class="pokeball-icon" src="images/icons/ultraball.svg" alt="Ultra Ball Icon">
            <img class="pokeball-icon" src="images/icons/masterball.svg" alt="Master Ball Icon">
            <img class="pokeball-icon" src="images/icons/premierball.svg" alt="Premier Ball Icon">
            <img class="pokeball-icon" src="images/icons/quickball.svg" alt="Quick Ball Icon">
            <img class="pokeball-icon" src="images/icons/duskball.svg" alt="Dusk Ball Icon">
            <img class="pokeball-icon" src="images/icons/diveball.svg" alt="Dive Ball Icon">
            <img class="pokeball-icon" src="images/icons/friendball.svg" alt="Friend Ball Icon">
            <img class="pokeball-icon" src="images/icons/dreamball.svg" alt="Dream Ball Icon">
        </div>

        <p id="pokeball-credit">Pokeball Icons made by Sophia</p>
    </section>
</body>
</html>