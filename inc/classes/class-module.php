<?php

// behanla modul som post med egen meta, och page som ett arkiv
class Pont_Module {

  private $id;
  public $file;

  function __construct( $id, $file ) {
    $this->id = $id;
    $this->file = $file;
  }



  function get_attribute( $key ) {
    $db = new Pont_Db();
    return $db->sql( "SELECT `attr_value` FROM `pont_attributes` WHERE module='$this->id' AND attr_key='$key' " );
  }



  function display_on_frontend() {

    $file = file_get_contents( MODULES_PATH . '/' . $this->file);

   preg_match_all( CAPTURE, $file, $matches);
   foreach ( $matches[0] as $m ) {
     $m_stripped = strtr( $m, array(
       '{{'  =>  '',
       '}}'  =>  ''
     ));
     $m_arr = explode( ' ', $m_stripped );

     $attr_val = $this->get_attribute( $m_arr[0] )[0]['attr_value'];
     if ( $attr_val !== NULL ) {
       $file = str_replace( $m, $this->get_attribute( $m_arr[0] )[0]['attr_value'], $file );
     }
   }
   echo $file;
  }



  function get_id(){
    return $this->id;
  }


} ?>