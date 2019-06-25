<?php


class Pont_input {

  private $field;

  function __construct( $attr_val, $attributes ) {
    //var_dump($attributes);
    $this->field = '<input type="text" value="' . $attr_val . '"></input>';

  }

  function html() {
    return $this->field;
  }

}
