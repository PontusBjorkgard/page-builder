<?php
// TODO: Lös dettaskit, messy så helveti
define( 'DB_SERVER', 'localhost' );
define( 'DB_NAME', 'pont' );
define( 'DB_USER', 'root' );
define( 'DB_PASSWORD', '' );

require $_SERVER['DOCUMENT_ROOT'] . '/pont/inc/classes/class-db.php';
var_dump($_GET['fields']);

$db = new Pont_Db();

foreach ($_GET['fields'] as $key => $value) {
    $name_id = explode( '_', $key );

    // Check if module key value pair exists in db
    // TODO: kanke få detta att returnera något ifall update inte går pga att inte existerar
    // och sedan insert ifall detta
    $attr = $db->sql("SELECT * FROM `pont_attributes` WHERE module = '$name_id[1]' AND attr_key = '$name_id[0]'");
    if ( $attr == NULL ) {
      $response = $db->sql("INSERT INTO `pont_attributes` ( `module`, `attr_key`, `attr_value` ) VALUES ( '$name_id[1]', '$name_id[0]', '$value' )");
    }
    else {
      $response = $db->sql("UPDATE `pont_attributes` SET `attr_value` = '$value' WHERE module = '$name_id[1]' AND attr_key = '$name_id[0]'");
    }


    var_dump( $response );
}

// header("Location: http://localhost/pont/?view=edit&page=124");
// die();


 ?>
