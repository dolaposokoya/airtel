<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/x-icon" href="./favicon.ico" size="48x48"/>
    <link rel="icon" type="image/x-icon" href="./assets/favicon-16x16.png" size="16x16"/>
    <link rel="icon" type="image/x-icon" href="./assets/favicon-32x32.png" size="32x32"/>
    <link rel="icon" type="image/x-icon" href="./assets/favicon-32x32.png" size="32x32"/>
    <link rel="icon" type="image/x-icon" href="./assets/android-chrome-192x192.png" size="192x192"/>
    <link rel="icon" type="image/x-icon" href="./assets/android-chrome-512x512.png" size="512x512"/>
    <link rel="apple-touch-icon" type="image/x-icon" href="./assets/apple-touch-icon.png" size="192x192"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" />
    <meta name="description" content="Support FCCPC">
    <?php
    include('./shared/meta.php');
    ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" defer>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>
    <link rel="stylesheet" href="./styles/footer.css"/>
    <link rel="stylesheet" href="./styles/header.css"/>
    <link rel="stylesheet" href="./styles/index.css"/>
    <link rel="stylesheet" href="./styles/modal.css"/>
    <title>Register For Patients' Bill of Rights | Support Federal Competition & Consumer Protection Commission | FCCPC Bill of Rights</title>
</head>
<?php
include("./root.php");
?>

<body>
    <?php
    include("./shared/loader.php");
    ?>
    <div class="modal">
        <div class="modal-body">
            <h3 class="ready">Message!</h3>
            <p class="modal-text">dvdvd</p>
            <button id="close" onclick="closeModal(event)">Close</button>
        </div>
    </div>
    <div class="center">
        <div class="header">
            <a class="logoContainer" href="https://www.fccpc.gov.ng/" target="_blank">
                <img src="./assets/fccpc.png" class="logo" />
            </a>
        </div>
    </div>
    <div class="membersip">
        <div class="container">
            <div class="container-wrapper">
                <div class="messages">
                    <div class="message">
                        <div class="warning">
                            <p class="alert alert-warning" id="warning_alert" role="alert">

                            </p>
                            <img src="./assets/cross.png" alt="close-icon" class="cross" onclick="closeMessage(event)" />
                        </div>
                    </div>
                </div>
                <form autocomplete="on">
                    <div class="form-wrapper">
                        <div class="icons">
                            <label>Hospital Name</label>
                        </div>
                        <input placeholder="Name of hospital" name="hospital_name" type="text" class="form-input" id="hospital_name" autocomplete="off" required />
                        <span class="error-text hospital_name"></span>
                    </div>
                    <div class="form-wrapper">
                        <div class="icons">
                            <label>Registration Number</label>
                        </div>
                        <input placeholder="Registration Number" name="reg_number" type="text" class="form-input" id="reg_number" autocomplete="off" required />
                        <span class="error-text reg_number"></span>
                    </div>
                    <div class="form-wrapper">
                        <div class="icons">
                            <label>Company Email</label>
                        </div>
                        <input placeholder="Company Email" name="email" type="email" class="form-input" id="hospital_email" autocomplete="off" required />
                        <span class="error-text hospital_email"></span>
                    </div>
                    <div class="form-wrapper">
                        <div class="icons">
                            <label>Street Address</label>
                        </div>
                        <textarea placeholder="Address" name="address" type="address" class="form-input" id="address" autocomplete="off" required style="padding-left: .5em; padding-top: .5em"></textarea>
                        <span class="error-text address"></span>
                    </div>
                    <div class="address-wrapper">
                        <div class="form-wrapper">
                            <div class="icons">
                                <label>State</label>
                            </div>
                            <select name="state" id="state" required>
                                <option>Select state</option>
                            </select>
                            <span class="error-text state"></span>
                        </div>
                        <div class="form-wrapper">
                            <div class="icons">
                                <label>Local Government</label>
                            </div>
                            <select name="lga" id="lga" required>
                                <option>Select local government</option>
                            </select>
                            <span class="error-text lga"></span>
                        </div>
                    </div>
                    <div class="form-wrapper">
                        <div class="icons">
                            <label>Contact Person Name</label>
                        </div>
                        <input placeholder="Contact Person Name" name="contact_name" type="text" class="form-input" id="contact_name" autocomplete="off" required />
                        <span class="error-text contact_name"></span>
                    </div>
                    <div class="form-wrapper">
                        <div class="icons">
                            <label>Contact Person Email</label>
                        </div>
                        <input placeholder="Contact Person Email" name="contact_email" type="email" class="form-input" id="contact_email" autocomplete="off" required />
                        <span class="error-text contact_email"></span>
                    </div>
                    <div class="form-wrapper">
                        <div class="icons">
                            <label>Contact Person Mobile</label>
                        </div>
                        <input placeholder="Contact Person Mobile" name="contact_mobile" type="tel" class="form-input" id="contact_mobile" autocomplete="off" required />
                        <span class="error-text contact_mobile"></span>
                        <span class="error-text phone_length"></span>
                    </div>
                    <div class="member-btn">
                <button class="member-add" onclick="becomeAMember(event)">Become A Volunteer</button>
            </div>
            </div>
            </form>
        </div>
    </div>
    </div>
    <script src="./js/index.js"></script>
</body>

</html>