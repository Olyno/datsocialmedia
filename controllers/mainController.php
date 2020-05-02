<?php

/**************
 * MAIN CONTROLLER
 *************/

$error = '';

include('views/components/header.php');

if (isset($_SESSION['user'])) {
    include('views/home.php');
} else {
    header('Location /signin');
}

