<?php 
 define("ROOT", dirname(__DIR__)); //constanta root vernet put' k root folder - DIR returns path to a public folder(current folder of index.php), a dirname sends us to higher level of folders - root folder
 define("WWW", ROOT . "/public"); //public folder path
 define("CONFIG", ROOT . "/config");
 define("CORE", ROOT . "/vendor/myfrm/core");
 define("APP", ROOT . "/app");
 define("CONTROLLERS", APP . "/controllers");
 define("VIEWS", APP . "/views");
 define("PATH", "https://cz82944.tw1.ru/");
//  define("LOGIN_PAGE", PATH . "/login");
 define("ERRORS_LOG_FILE", ROOT . '/errors.log');
 define("UPLOADS", WWW . "/uploads");