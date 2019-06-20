<?php
define( 'ROOT', $_SERVER['DOCUMENT_ROOT'] . '/pont/'  );
define( 'MODULES_PATH', $_SERVER['DOCUMENT_ROOT'] . '/pont/modules' );

define( 'DB_SERVER', 'localhost' );
define( 'DB_NAME', 'pont' );
define( 'DB_USER', 'root' );
define( 'DB_PASSWORD', '' );

define( 'CAPTURE', '"({{)(.*?)(}})"' );
//"(?<=\{{)(.*?)(?=\}})"

require_once 'inc/functions.php';
require_once 'inc/main.php';
require_once 'inc/classes/class-db.php';
require_once 'inc/classes/class-module.php';

new Pont();


 ?>
