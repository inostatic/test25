<?php

// Константы базы данных
define("DB_SERVER", "localhost");
define("DB_USER", "mysql");
define("DB_PASS", "mysql");
define("DB_NAME", "userlistdb");

//        require("constants.php");
$con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS) or die(mysqli_error());
mysqli_select_db($con, DB_NAME) or die("Cannot select DB");
