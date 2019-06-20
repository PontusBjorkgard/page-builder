<?php

function is_admin() {

  if ( !isset( $_GET['view'] ) ){
    return false;
  }
  if ( $_GET['view'] == 'edit' ) {
    return true;
  }
  return false;

}
