<?php

define("MAX_POSTS", 5);

define("PREFIXE", "blog_");

define("SERVER", "DEV");

define("DB_HOST", "ns366377.ovh.net");
define("DB_LOGIN", "la_mantia");
define("DB_PASSWORD", "669763");
define("DB_NAME", "la_mantia");
define("DB_CHARSET", "utf8");

define("DEFAULT_MODULE", "posts");
define("DEFAULT_ACTION", "home");

if (SERVER == "DEV") {

    define("DEBUG", true);

} else if (SERVER == "TEST") {

    define("DEBUG", true);

} else if (SERVER == "PROD") {

    define("DEBUG", false);

}