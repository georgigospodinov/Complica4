<?php
header('Content-type:application/json;charset=utf-8');

require 'database.php';

if(isset($_POST['save_neural_network'])) {
  $json = json_decode($_POST['save_neural_network'], true);
  foreach ($json as $key => $value) {
    if($key == 'rating') {
      $rating = mysql_real_escape_string( $value );
    }

    /*
     * There is no way to escape symbols in Java serialized object safely.
     */
    if($key == 'object') {
      $object = $value;
    }
  }

  open_my_db();
  query_my_db( "INSERT INTO neural_networks (object, rating) VALUES ('".$object."', '".$rating."');" );
  close_my_db();
}
?>
