<?php
$header = $_SERVER['HTTP_REFERER'];
session_start();
unset($_SESSION['session_username']);
session_destroy();
header("Location: $header");
