<?php
spl_autoload_register(function ($class_name) {
    if (file_exists("assets/src/$class_name.php")) {
        include 'assets/src/' . $class_name . '.php';
    }
});