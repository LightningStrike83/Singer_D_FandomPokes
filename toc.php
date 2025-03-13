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
    <title>Fandom PokePartners- Terms and Conditions</title>
</head>
<body data-page="toc" class="dm">
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

    <section id="toc-con" class="grid-con dm">
        <p id="toc-update-text" class="col-span-full toc-text">Last Updated: March 11th, 2025</p>
        <h3 id="toc-title" class="col-span-full toc-text">Terms and Conditions</h3>
        <p class="col-span-full toc-text">Fandom PokePartners is a free to use database with an optional account system for additional user experience. These terms and conditions outline how Fandom PokePartners helps ensure the quality and experience of the website.</p>
        <div id="toc-info" class="col-span-full">
            <ul>
                <li><span class="toc-title">Updates:</span><br>These terms and conditions may be periodically updated. The updated version will be indicated by an updated “Revised” date and the updated version will be effective as soon as it is accessible. We encourage you to review these terms and conditions frequently for the latest version.</li>
                <li><span class="toc-title">Agreement:</span><br>The following terms and conditions constitute a legal agreement and are entered into by and between you and Fandom PokePartners.<br>By using Fandom PokePartners, you agree to be bound by the following Terms and Conditions, which govern your use of the website and its services. Please read the Agreement carefully.</li>
                <li><span class="toc-title">Responsibilities:</span><br>As a user of Fandom PokePartners, you agree to the following terms and conditions during continued access of the website:<br>
                -By accessing and using this website, you confirm that you understand and agree to these Terms and Conditions and the <a class="toc-link" href="privacy.php">Privacy Policy</a><br>
                -Keeping your account information in a secure location and in a way that is not easily accessible by another person<br>
                -Ensuring that your sessions while logged in, when used on a public device, are terminated via the "Logout" button<br>
                -Information you consensually supply with Fandom PokePartners is not information that can be deemed as sensitive, private, or personal<br>
                -Information you consensually supply with Fandom PokePartners is your own and / or done with explicit consent by the person that it is referencing<br>
                -Informing the web developer of any potential security breaches or unauthorized account access</li>
                <li><span class="toc-title">Prohibited Activities:</span><br>These activities are prohibited within Fandom PokePartners. Accounts may be terminated without notification if it is proven that an account has undergone any of these activities:<br>
                -Attempting to or successfully breaching any security or authorization processes<br>
                -Disrupting network services<br>
                -Introducing malicious code, viruses, trojans, or malware<br>
                -Attempting a denial of service or distributed denial of service (DDoS) attack<br>
                -Creating user accounts for others without their knowledge<br>
                -Using links within a profile (to prevent potential spam or malicious links)<br>
                -Having an inappropriate or offensive username<br>
                -Using any language that may be deemed inappropriate or offensive within a profile (which is at the discretion of Fandom PokePartners)<br>
                -Having content that may be irrelevant or illegal displayed on the profile<br><br>
                
                As well, using the profile services of Fandom PokePartners for anything other than their intended use. This is including, but not limited to:<br>-Spam<br>-Dating<br>-Advertising<br>-Gambling<br>-Politcal Campaigning</li>
                <li><span class="toc-title">Content Ownership:</span><br>Fandom PokePartners does not own the intellectual or copyright rights of the series or characters found within the website nor do they have any association with anyone that does. Fandom PokePartners operates under the assumption that all images, rights, and depictions are done with fair use as its primary intent, as the website is using everything as a transformative work and is not for profit. Users within Fandom PokePartners are implied to be under the same assumption when submitting contributions to the website. No copyright infringement is intended.</li>
                <li><span class="toc-title">Rights To Access:</span><br>As Fandom PokePartners is sourcing the content from other websites with fair use in mind, Fandom PokePartners likewise assumes that users may use the information and resources found within the website for their own personal use.<br>However, redistributing or licensing the website's content and/or code without the developer's consent is strictly prohibited.</li>
                <li><span class="toc-title">Enforcement</span><br>If Fandom PokePartners discovers a breach in the terms and conditions, we may suspend or terminate accounts that violate these terms. Likewise, if any information is deemed illegal, it will be reported to the proper authorities immediately. Fandom PokePartners may disclose any relevant information to comply with legal obligations, such as law enforcement requests or court orders.</li>
                <li><span class="toc-title">Third Party Links:</span><br>Fandom PokePartners may contain links that direct you to third-party websites that are not covered by the terms and conditions and privacy policy. Fandom PokePartners is not responsible for evaluating or examining the content found within these websites. Fandom PokePartners is not responsible or has any liability for any content found within these websites and access to these websites is to be done at the user's discretion and risk.</li>
                <li><span class="toc-title">Limitation of Liability:</span><br>Fandom PokePartners is provided 'as is' without warranties of any kind, express or implied. We are not liable for any inaccuracies, downtime, data loss, or damages arising from the use of this website. As such, users acknowledge and accept that such issues may arise.</li>
                <li><span class="toc-title">Privacy Policy:</span><br>Your use of Fandom PokePartners is also governed by our <a class="privacy-link" href="privacy.php">privacy policy</a>. Please review it to understand how we handle your information.</li>
                <li><span class="toc-title">Other Matters:</span><br>Fandom PokePartners is operated by a single developer, and as such, all maintenance, issues, contact, etc. are handled by that individual. Users of the website acknowledge that use of the website is under the control, influence, and discretion of that developer, unless a change is made. Should a change be made, this document will be updated.<br><br>Should any part of this Agreement be held invalid or unenforceable, that portion shall be construed consistent with applicable law and the remaining portions shall remain in full force and effect.</li>
                <li><span class="toc-title">Contact Information:</span><br>For any inquiries or concerns regarding these Terms and Conditions or the use of Fandom PokePartners, please contact us through our <a class="toc-link" href="contact.php">contact page</a></li>
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
        <p id="footer-disclaimer" class="col-start-2 col-span-1">All images used are used for a transformative work and nonprofit. The images are copyrighted or are a registered trademark, sourced from the various Wiki/Fandom pages and galleries. The contributor claims fair use. No copyright infringement is intended.<br><br>Certain materials are included under fair use exemption of the U.S. Copyright Law and are restricted from further use.<br><br>Fandom PokePartners is a fansite and are not official in any shape or form, nor affiliated, sponsored, or endorsed by any of the series, creators, parent companies, or affiliated persons found throughout the website. The content displayed in this website is meant for informational purposes only and is not official in any shape or form.<br><br><a href="privacy.php">Privacy Policy</a> | <a href="toc.php">Terms and Conditions</a> | <a href="contact.php">Contact</a></p>
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

</body>
</html>