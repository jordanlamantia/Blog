<?php

//Controleur principale

session_start();

//Paramettrages
require "config/config.inc.php";

//Afficher les erreurs
ini_set('display_errors', 1);

//Inclusion des libs
require "libs/url.inc.php";

//Inclusion du core
require "core/Core.php";
require "core/CoreController.php";
require "core/CoreModel.php";
require "core/CoreView.php";

//Lancement du module
require "application/app.php";
