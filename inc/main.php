<?php

class Pont {

  function __construct() {

    // $db = new Pont_Db();
    // $db->sql('SELECT Title FROM pont_pages WHERE ID = "123"');
    if ( is_admin() ) {
      require 'classes/class-input.php';
      require 'classes/class-backend.php';
      new Pont_Backend();
    }

    else {
      require 'classes/class-frontend.php';
      new Pont_Frontend();
    }

  }


} ?>
