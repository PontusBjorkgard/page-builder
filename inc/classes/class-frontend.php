<?php

class Pont_Frontend {

    public $page_id;
    public $page_title;
    public $page_description;
    public $page_modules = [];

    function __construct() {
      $this->page_id = isset( $_GET['page'] ) ? $_GET['page'] : false;

      $this->setup_page_data();
      $this->setup_modules();
      $this->sort_modules();

      require $_SERVER['DOCUMENT_ROOT'] . '/pont/inc/templates/frontend.php';
    }

    private function setup_page_data() {
      $db = new Pont_Db();
      $page_data = $db->sql("SELECT Title FROM pont_pages WHERE ID = $this->page_id");
      $this->page_title = $page_data[0]['Title'];
      $this->page_description = 'Desc';
    }

    private function setup_modules() {
      $db = new Pont_Db();
      $modules_in_page = $db->sql("SELECT `id`, `file`, `order`  FROM `pont_modules` WHERE page = $this->page_id");
      foreach ( $modules_in_page as $module ) {
        $this->page_modules[] = new Pont_Module( $module['id'], $module['file'], $module['order'] );
      }
    }

    private function sort_modules() {
      usort(  $this->page_modules, function($a, $b) {
        return strcmp($a->order, $b->order);
      });
    }

    function print_modules() {
      foreach ($this->page_modules as $module) {
         $module->display_on_frontend();
      }
    }



}

?>
