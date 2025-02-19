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
    <link rel="stylesheet" href="css/grid.css?version=0.1">
    <link rel="stylesheet" href="css/main.css?version=0.1">
    <script type="module" src="js/main.js?version=0.1"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollToPlugin.min.js"></script>
    <title>Fandom PokePartners- <?php echo $row['username']; ?></title>
</head>
<body data-page="profile" class="dm">
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

    <section id="profile-info-con" class="grid-con">
        <div id="main-info-con" class="col-span-full m-col-span-3" <?php echo 'data-match="'.$row['id'].'"' ?>>
            <img id="profile-image" src="images/pokeball-full.svg" alt="">
            <?php
                echo '<h3 id="profile-username">'.$row['username'].'</h3>';
            ?>
        </div>

        <div id="extra-info-con" class="col-span-full m-col-span-9">
            <div id="tab-con">
                <p class="profile-tab" data-link="profile-text">Profile Info</p>
                <p id="middle-tab" class="profile-tab" data-link="upvoted">Upvoted (<span id="upvote-count-text">...</span>)</p>
                <p class="profile-tab" data-link="submission">Character Submissions (<span id="submissions-count-text">...</span>)</p>
            </div>

            <div id="profile-text-con" class="profile-info-box">
                <p class="profile-info"><b>Favourite Pokemon:</b><br><span id="profile-fav-pokemon"></span></p>
                <div class="profile-info-divider"></div>
                <p class="profile-info"><b>Favourite Pokemon Trainer:</b><br><span id="profile-fav-trainer"></span></p>
                <div class="profile-info-divider"></div>
                <p class="profile-info"><b>Favourite Character:</b><br><span id="profile-fav-character"></span></p>
                <div class="profile-info-divider"></div>
                <p class="profile-info"><b>Favourite Series:</b><br><span id="profile-fav-series"></span></p>
                <div class="profile-info-divider"></div>
                <p class="profile-info"><b>Fandoms Interested In:</b><br><span id="profile-fandoms"></span></p>
            </div>
            <div id="upvoted-con" class="profile-info-box"></div>
            <div id="submission-con" class="profile-info-box"></div>
        </div>
    </section>

    <section class="grid-con">
        <div class="col-start-2 col-end-4 m-col-start-6 m-col-end-8">
            <p id="top-text" class="dm">To Top ↑</p>
        </div>
    </section>

    <footer class="full-width-grid-con">
        <p id="footer-disclaimer" class="col-start-2 col-span-1">All images used are used for a transformative work and nonprofit. The images are copyrighted or are a registered trademark, sourced from the various Wikias/Fandoms. The contributor claims fair use. No copyright infringement is intended.<br><br>Certain materials are included under fair use exemption of the U.S. Copyright Law and are restricted from further use.<br><br>Fandom PokePartners is a fansite and are not official in any shape or form, nor affiliated, sponsored, or endorsed by any of the series, creators, parent companies, or affiliated persons found throughout the website. The content displayed in this website is meant for informational purposes only and is not official in any shape or form.</p>
    </footer>

    <section id="subseries-info" class="info-box dm full-width-grid-con">
        <p class="info-text col-start-2 col-span-1">A subseries is a title that branches under the main series / franchise. This helps users from getting overwhelmed if there's series with multiple different titles with different casts, or helps create a distinction between versions of characters. Not every series has a subseries or needs to be divided. If you're unsure, please re-enter the series name. <br><br>Examples of subseries:<br>-Yu-Gi-Oh! GX<br>-Persona 5<br>-Marvel Cinematic Universe</p>

        <div class="col-span-1 mobile-close">
            <p class="close-button">X</p>
        </div>
    </section>

    <section id="wiki-info" class="info-box dm full-width-grid-con">
        <p class="info-text col-start-2 col-span-1">Linking to a wikia / fandom page is not required, but will give the submission a priority. This helps the dev collect appropriate assets and information to use for the website.</p>

        <div class="col-span-1 mobile-close">
            <p class="close-button">X</p>
        </div>
    </section>
</body>
</html>