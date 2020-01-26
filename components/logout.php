<?php

define('URL', 'http://' . $_SERVER['HTTP_HOST']);
$header = URL;

session_start();
unset($_SESSION['session_username']);
session_destroy();
header("Location: $header");
