<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/x-icon" href="./favicon.png" size="100x100" />
    <link rel="icon" type="image/x-icon" href="./favicon.ico" size="48x48" />
    <link rel="apple-touch-icon" type="image/x-icon" href="./assets/apple-touch-icon.png" size="192x192" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" />
    <?php
    include('./shared/meta.php');
    ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" defer>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>
    <link rel="stylesheet" href="./styles/header.css" />
    <link rel="stylesheet" href="./styles/index.css" />
    <link rel="stylesheet" href="./styles/modal.css" />
    <title>Register Your Airtel Sim For Close User Group (CUG) </title>
</head>
<?php
include("./root.php");
?>

<body>
    <?php
    // include("./shared/loader.php");
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
            <a class="logoContainer" href="https://airtel.africa" target="_blank">
                <img src="./assets/airtel.png" class="logo" />
            </a>
            <a class="logoContainer" href="https://smedan.gov.ng" target="_blank">
                <img src="./assets/smedanlogo.png" class="logo smedan" />
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
                <form>
                    <div class="form-wrapper">
                        <div class="icons">
                            <label>Which service do you want to register for</label>
                        </div>
                        <select name="Services" id="service">
                            <option>Select option</option>
                            <option value="cug">Close User Group (CUG)</option>
                            <option value="odu">Outdoor Unit (ODU)</option>
                        </select>
                        <span class="error-text service"></span>
                    </div>
                </form>
                <?php
                include("./shared/cug.php");
                include("./shared/odu.php");
                ?>
            </div>
        </div>
    </div>
    </div>
    <script src="./js/index.js"></script>
</body>

</html>