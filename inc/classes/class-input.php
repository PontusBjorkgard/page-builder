<?php


class Pont_input {

  private $field;

  function __construct( $attributes ) {

    $this->field = '<input type="' . $attributes['type'] . '" name="' . $attributes['name'] . '_' . $attributes['index'] . '"></input>';

  }

  function get_field() {
    return $this->field;
  }

}
