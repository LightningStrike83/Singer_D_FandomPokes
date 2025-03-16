<!DOCTYPE html>
<html lang="en">
<?php
session_start();

require_once('includes/connect.php');
$query = 'SELECT id, token FROM user_controllers WHERE token = :token';

$stmt = $connection->prepare($query);
$token = $_GET['token'];
$stmt->bindParam(':token', $token, PDO::PARAM_STR);
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
    <title>Fandom PokePartners- Reset Password</title>
</head>
<body data-page="reset-password" class="dm">
    <header class="dm">
        <div id="supplementary-header">
            <div id="theme-enable">
                <img id="theme-image" src="images/dark-icon.png" alt="Theme Icon">
                <p id="theme-enable-text">Enable <span id="theme-text">Dark</span> Mode</p>
            </div>
    
            <div id="hamburger-menu">
                <img class="dm" src="images/ham_menu.svg" alt="Hamburger Menu">
            </div>
    
            <div id="login-con">
                <a href="login.html">Login</a>
                <p class="link-divider">/</p>
                <a href="register.html">Register</a>
            </div>
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

    <section id="reset-password-form-con" class="grid-con dm">
        <div id="reset-password-form-div" class="col-span-full">
            <h3>Reset Password</h3>
            <form id="reset-password-form" method="post">
                <div id="form-key" class="hidden" data-pk="<?php $row['id'] ?>"></div>

                <label for="password">New Password:</label>
                <input id="rp-input" type="password" name="password" class="dm" required>

                <label for="confirm-password">Confirm New Password:</label>
                <input id="rp-confirm" type="password" name="password" class="dm" required>

                <input type="submit" value="Reset" class="forgot-button dm">
            </form>

            <p id="reset-password-error"></p>
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
            <div class="mobile-close">
                <div>
                    <p class="close-button">X</p>
                </div>
            </div>
            <a href="index.php">Character Database</a>
            <div class="hamburger-divider"></div>
            <a href="suggestion.php">Suggest</a>
            <div class="hamburger-divider"></div>
            <a href="login.html">Login</a>
            <div class="hamburger-divider"></div>
            <a href="register.html">Register</a>
            <div class="hamburger-divider"></div>
            <a href="contact.php">Contact</a>
        </div>
    </section>
</body>
</html>