<?php

class Pont_Backend {

  public $page_id;
  public $page_title;
  public $page_description;
  public $page_modules;

  function __construct() {

    $this->page_id          = isset( $_GET['page'] ) ? $_GET['page'] : 0;
    $this->page_title       = 'Title';
    $this->page_description = 'Desc';

    $this->page_modules = json_decode( '[
      {"module":"module.html", "atts": {"text": "lorem", "textDos": "ipsum"} },
      {"module":"module-2.html", "atts": {"textTre": "dolor"} }

    ]', true );


    require $_SERVER['DOCUMENT_ROOT'] . '/pont/inc/templates/admin.php';
  }

  private function get_modules() {

    $modules = scandir( MODULES_PATH );

    var_dump( $modules );

  }

  private function print_modules() {

    $index = 0;
    foreach ($this->page_modules as $module) {
      $file = file_get_contents(MODULES_PATH . '/' . $module['module']);
      preg_match_all( CAPTURE, $file, $matches);

      foreach ( $matches[0] as $m ) {
        $m_stripped = strtr( $m, array(
          '{{'  =>  '',
          '}}'  =>  ''
        ));
        $m_arr = explode( ' ', $m_stripped );
        $attributes = $this->extract_attributes( $m_arr );
        $attributes['index'] = $index;
        $input = new Pont_Input( $attributes );
        $field = $input->get_field();
        $file = str_replace( $m, $field, $file );
      }
      $index++;
      echo $file;
    }
  }

  private function extract_attributes( $m_arr ) {

    $attributes = [];
    foreach ($m_arr as $m_arr_attr ) {
      $m_arr_attr_arr = explode(':', $m_arr_attr );
      if ( !isset( $m_arr_attr_arr[1] ) ) {
        $attributes['name'] = $m_arr_attr_arr[0];
        continue;
      }
      $attributes[$m_arr_attr_arr[0]] = $m_arr_attr_arr[1];
    }
    return $attributes;

  }


}


?>
