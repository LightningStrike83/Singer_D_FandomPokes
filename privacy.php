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
    <link rel="stylesheet" href="css/grid.css?version=0.1">
    <link rel="stylesheet" href="css/main.css?version=0.1">
    <script type="module" src="js/main.js?version=0.1"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollToPlugin.min.js"></script>
    <title>Fandom PokePartners- Privacy Policy</title>
</head>
<body data-page="privacy" class="dm">
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

    <section id="privacy-info-con" class="grid-con">
        <p id="privacy-update-text" class="col-span-full privacy-text">Last Updated: February 24th, 2025</p>
        <h3 id="privacy-title" class="col-span-full privacy-text">Privacy Policy</h3>
        <p class="col-span-full privacy-text">This privacy policy details how Fandom PokePartners collects, uses, and safeguards user information. No personal information is required to access this website or view any regular pages.</p>
        <div id="privacy-info" class="col-span-full">
            <ul>
                <li><span class="privacy-title">Information Collection:</span><br>Fandom PokePartners gathers email addresses from users during registration and login processes to enable access to some of the website's features.</li>
                <li><span class="privacy-title">Use of Information:</span><br>The email addresses collected are solely used for user authentication, communication purposes, and to ensure a fair experience within Fandom PokePartners. <br> Members may fill out a public profile with information they wish to post. This is entirely optional and we recommend users do not post personally identifiable information.</li>
                <li><span class="privacy-title">Protection of Information:</span><br>Fandom PokePartners is committed to ensuring the security and confidentiality of all collected email addresses. We have organizational and technical processes and procedures in place to protect your personal information. However, no electronic transmission over the internet or information storage technology can be guaranteed to be 100% secure, so we cannot promise or guarantee that hackers, cybercriminals, or other unauthorized third parties will not be able to defeat our security and improperly collect, access, steal, or modify your information.</li>
                <li><span class="privacy-title">Account Deletion:</span><br>To request the deletion of a user account, and its associated user data, please use the contact form on our <a class="privacy-link" href="contact.php">contact page</a>.<br>Account deletion may occur without notice if the information contained breaks the </li>
                <li><span class="privacy-title">Third-Party Disclosure:</span><br>Fandom PokePartners does not engage in the sale of users' email addresses or any personal information to third parties without explicit consent, except where required by law.</li>
                <li><span class="privacy-title">Updates to Privacy Policy:</span><br>This Privacy Policy may be periodically updated. The updated version will be indicated by an updated “Revised” date and the updated version will be effective as soon as it is accessible. If we make material changes to this privacy notice, we will notify you by prominently posting a notice of such changes. We encourage you to review this privacy notice frequently to be informed of how we are protecting your information.</li>
                <li><span class="privacy-title">Cookies and Tracking:</span><br>Fandom PokePartners does not use cookies or tracking for any of the features found within the website.</li>
                <li><span class="privacy-title">Advertising:</span><br>Fandom PokePartners does not intend to use any form of advertising services within the website. No personal data will be collected for the use of advertising services but may be subject to change. In the event of a change, this policy will be updated and a prominent notice of these changes will be displayed to encourage users to review.</li>
                <li><span class="privacy-title">Contact Information:</span><br>For any inquiries or concerns regarding this Privacy Policy or the use of pokedoku.com, please contact us through our <a class="privacy-link" href="contact.php">contact page</a>.<br>
                By using Fandom PokePartners, you agree to adhere to the terms outlined in this Privacy Policy. If you do not agree with our policies and practices, please do not submit any information to the website.</li>
                <!-- <li><span class="privacy-title"></span><br></li> -->
            </ul>
        </div>
    </section>

    <section class="grid-con">
        <div class="col-start-2 col-end-4 m-col-start-6 m-col-end-8">
            <p id="top-text" class="dm">To Top ↑</p>
        </div>
    </section>

    <footer class="full-width-grid-con">
        <p id="footer-disclaimer" class="col-start-2 col-span-1">All images used are used for a transformative work and nonprofit. The images are copyrighted or are a registered trademark, sourced from the various Wikias/Fandoms. The contributor claims fair use. No copyright infringement is intended.<br><br>Certain materials are included under fair use exemption of the U.S. Copyright Law and are restricted from further use.<br><br>Fandom PokePartners is a fansite and are not official in any shape or form, nor affiliated, sponsored, or endorsed by any of the series, creators, parent companies, or affiliated persons found throughout the website. The content displayed in this website is meant for informational purposes only and is not official in any shape or form.<br><br><a href="privacy.php">Privacy Policy</a> | <a href="contact.php">Contact Us</a></p>
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

</body>
</html>