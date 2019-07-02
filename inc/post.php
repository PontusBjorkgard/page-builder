<?php
// TODO: Lös dettaskit
define( 'DB_SERVER', 'localhost' );
define( 'DB_NAME', 'pont' );
define( 'DB_USER', 'root' );
define( 'DB_PASSWORD', '' );

require $_SERVER['DOCUMENT_ROOT'] . '/pont/inc/classes/class-db.php';
var_dump($_GET['fields']);

$db = new Pont_Db();

foreach ($_GET['fields'] as $key => $value) {
    $name_id = explode( '_', $key );

    $response = $db->sql("UPDATE `pont_attributes` SET `attr_value` = '$value' WHERE module = '$name_id[1]' AND attr_key = '$name_id[0]'");

    var_dump( $response );
}


 ?>
