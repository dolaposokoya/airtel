<?php
session_start();

$session_id = random_bytes(16);
$session_id = bin2hex($session_id);
$_SESSION["session_id"] = $session_id;
$_SESSION["session_date"] = date("Y-m-d H:i:s");
$_SESSION["session_name"] = 'volunteer_registration';

if (isset($_SESSION["session_id"])  && isset($_SESSION["session_date"]) && isset($_SESSION["session_name"])) {
    return true;
} else {
    return false;
}