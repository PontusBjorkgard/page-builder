<?php


class Pont_input {

  private $field;

  private $module_id;
  private $input_value;
  private $input_name;
  private $input_attributes;

  function __construct( $module_id, $attr_val, $attributes ) {

    $this->module_id = $module_id;
    $this->input_value = $attr_val;
    $this->input_name = $attributes[0];

    for ( $i = 1; $i < sizeof( $attributes ); $i++ ) {
      $a = explode(':', $attributes[$i] );
      if ( !isset($a[1]) ) {
         continue;
      }
      $this->input_attributes[$a[0]] = $a[1];
    }
    // TODO: tar allti textarea
    switch( $this->input_attributes['type'] ) {
      case 'text':
          $this->textfield();
      case 'textarea':
          $this->textarea();
    }

  }

  private function textfield() {
      $this->field = '<input name="fields['.$this->input_name.'_'.$this->module_id.']"
                             type="text"
                             value="' . $this->input_value . '">
                      </input>';
  }

  private function textarea() {
      $this->field = '<textarea name="fields['.$this->input_name.'_'.$this->module_id.']">' . $this->input_value . '</textarea>';
  }

  function html() {
    return $this->field;
  }

}
