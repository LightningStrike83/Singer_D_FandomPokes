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
    <title>Fandom PokePartners- Privacy Policy</title>
</head>
<body data-page="privacy" class="dm">
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

    <section id="privacy-info-con" class="grid-con dm">
        <p id="privacy-update-text" class="col-span-full privacy-text">Last Updated: March 5th, 2025</p>
        <h3 id="privacy-title" class="col-span-full privacy-text">Privacy Policy</h3>
        <p class="col-span-full privacy-text">This privacy policy details how Fandom PokePartners collects, uses, and safeguards user information. No personal information is required to access this website or view any regular pages. Registering for an account is optional and is only required to utilize the "upvote" feature on the website.</p>
        <div id="privacy-info" class="col-span-full">
            <ul>
                <li><span class="privacy-title">Registration:</span><br>To register for an account, you must be at least 13 years of age or older. Fandom PokePartners does not allow persons under the age of 13 to register for an account. If we discover that an account was created by a user under 13, we will promptly delete the account and all associated identifiable information, including email addresses and any user-provided data.</li>
                <li><span class="privacy-title">Information Collection:</span><br>Fandom PokePartners gathers email addresses from users during registration and login processes to enable access to some of the website's features. <br>Email addresses and names are collected for contact with Fandom PokePartners. This information is used solely for those purposes, and users have the option to withhold any personal data when communicating with us, with the exception of necessary fields for contacting us. Requests of deletion of contact-related information can be made by contacting us directly through our contact page.<br> A birth date is required for registration but is only used for age verification. This information is not stored, logged, or retained in any capacity beyond the immediate registration check.<br>Information on a user's profile is completely optional and is collected, stored, and displayed with the intent that the user consents to share this information publicly.<br>
                Fandom PokePartners and its affiliates do not knowingly collect personal information from children under the age of 13. If we receive credible information that a registered user is under 13, we will take immediate action to remove their account and delete any associated personal data.</li>
                <li><span class="privacy-title">Use of Information:</span><br>The email addresses collected are solely used for user authentication, communication purposes, responding to inquiries, and to ensure a fair experience within Fandom PokePartners and are stored indefinitely for account-related purposes. They may not be changed, except through special request by <a class="privacy-link" href="contact.php">contacting us</a>.<br> Members may fill out a public profile with information they wish to post. This is entirely optional and we recommend users do not post personally identifiable or sensitive information. Any such information is at the user's discretion and risk. This information is stored indefinitely for account related purposes but may be updated at any point by the user, with the exception being their username.<br>The birth dates are not stored, displayed, or used in any capacity beyond the registration check.<br>Users have the right to request access to, correct, or delete any personal information we hold.</li>
                <li><span class="privacy-title">Accuracy of Information:</span><br>In accordance with PIPEDA, Fandom PokePartners encourages its users to keep information up to date to ensure accuracy. While we encourage users to ensure the accuracy of the information they share, this is not mandatory as the information is entirely optional and cosmetic in nature, and it does not affect any of the services provided.</li>
                <li><span class="privacy-title">Protection of Information:</span><br>Fandom PokePartners is committed to ensuring the security and confidentiality of all collected email addresses. Organizational and technical processes and procedures are in place to protect your personal information, including (but not limited to) using https encryption and using PDO to prevent against SQL injection. However, no electronic transmission over the internet or information storage technology can be guaranteed to be 100% secure, so we cannot promise or guarantee that hackers, cybercriminals, or other unauthorized third parties will not be able to defeat our security and improperly collect, access, steal, or modify your information.</li>
                <li><span class="privacy-title">Account Deletion:</span><br>To request the deletion of a user account, and its associated user data, please use the contact form on our <a class="privacy-link" href="contact.php">contact page</a>.<br>Account deletion may occur without notice if:<br>-The user is discovered to be under the age of 13<br>-The information on the profile contains information that may be deemed private, sensitive, or offensive. The aforementioned information is subject to the developer's discretion.<br>-If the user is discovered to be a bot<br>If an account is deleted, all associated data, including email addresses and any user-provided content, will be permanently removed from our systems.</li>
                <li><span class="privacy-title">Third-Party Disclosure:</span><br>Fandom PokePartners does not engage in the sale of users' email addresses or any personal information to third parties without explicit consent, except where required by law. We may disclose personal information to comply with legal obligations, such as in response to subpoenas or court orders.<br>Fandom PokePartners uses third-party services to host the website and send communications. We use Web Hosting Canada for website hosting and Gmail for email communications. These providers are obligated to handle personal data in accordance with applicable privacy and security standards. Fandom PokePartners are not responsible for the privacy practices of these external sites.</li>
                <li><span class="privacy-title">Updates to Privacy Policy:</span><br>This Privacy Policy may be periodically updated. The updated version will be indicated by an updated “Revised” date and the updated version will be effective as soon as it is accessible. If we make material changes to this privacy notice, we will notify you by prominently posting a notice of such changes. We encourage you to review this privacy notice frequently to be informed of how we are protecting your information.</li>
                <li><span class="privacy-title">Cookies, Tracking, and Storage:</span><br>Fandom PokePartners does not use cookies or tracking for any of the features found within the website. SessionStorage is used solely to verify if a user has agreed to rules for submitting to the database. No other instance of SessionStorage is used throughout the site or for any other purpose.</li>
                <li><span class="privacy-title">Links To Other Websites:</span><br>This website may contain links that redirect to other websites that are not covered by this privacy policy. We are not responsible for the content or privacy practices of these external sites. We encourage users to review the privacy policies of any third-party websites they visit to understand how their information may be collected and used.</li>
                <li><span class="privacy-title">Advertising:</span><br>Fandom PokePartners does not intend to use any form of advertising services within the website. We do not collect personal data for advertising purposes, nor do we share personal data with third-party advertisers. In the event of a change, this policy will be updated and a prominent notice of these changes will be displayed to encourage users to review.</li>
                <li><span class="privacy-title">Contact Information:</span><br>For any inquiries or concerns regarding this Privacy Policy, the use of Fandom PokePartners, or if you have concerns about how your data is being handled, please contact us through our <a class="privacy-link" href="contact.php">contact page</a>.<br>If you believe an account has been created by a user under the age of 13, please contact us immediately so appropriate action can be taken.</li>
                <li><span class="privacy-title">Agreement:</span><br>By using Fandom PokePartners, you agree to adhere to the terms outlined in this Privacy Policy. If you do not agree with our policies and practices, please do not register or submit any information to the website.</li>
                <!-- <li><span class="privacy-title"></span><br></li> -->
            </ul>
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

</body>
</html>