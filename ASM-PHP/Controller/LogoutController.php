<?php
session_start();
if (isset($_SESSION["email"])) {
    session_destroy();
    header('location: http://dongnvnde18077.atwebpages.com');
}
header('location: http://dongnvnde18077.atwebpages.com');

