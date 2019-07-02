<?php

class Pont_Db {

  private $servername = DB_SERVER;
  private $dbname = DB_NAME;
  private $username = DB_USER;
  private $password = DB_PASSWORD;

  private $conn;

function __construct() {
  $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
  if ($this->conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
}

function sql( $sql ) {
   $res = $this->conn->query($sql);
   $res_arr = [];

  if ( is_bool($res) ) {
    return $res;
  }

  if ($res->num_rows > 0) {
    while($row = mysqli_fetch_assoc($res)) {
         $res_arr[] = $row;
     }
     return $res_arr;
  }
  else {
    return;
  }
}


}
