<?php

require "application/AppController.php";
require "application/AppModel.php";

if (!isset($_GET['module'])) {

    $module = ucfirst(DEFAULT_MODULE);

    $url = 'application/controller/' . $module . 'Controller.php';

    if (file_exists($url)) {
        require 'application/controller/' . $module . 'Controller.php';
    } else {
        die('Problème');
    }

    $controller = $module . "Controller";
    new $controller();

} else {

    $module = ucfirst($_GET['module']);
    $url = 'application/controller/' . $module . 'Controller.php';

    if (file_exists($url)) {
        require 'application/controller/' . $module . 'Controller.php';
    } else {
        die('Problème');
    }


    $controller = $module . "Controller";

    new $controller();
}