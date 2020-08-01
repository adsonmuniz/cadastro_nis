<?php

include 'views/header.php';

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'home';
}

if ($page == 'home') {
    include 'views/home.php';
} else if ($page == 'data') {
    include 'views/data.php';
} else if ($page == 'form') {
    include 'views/form.php'; 
} else if ($page == 'status') {
    include 'views/status.php';
 } else {
    include 'views/home.php';
}

include 'views/footer.php';
