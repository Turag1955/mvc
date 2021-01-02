<?php

spl_autoload_register(function($class) {
    include './system/lib/' . $class . '.php';
});
 include './app/config/constant.php';


$main = new main();