<?php

  $dbc = mysqli_connect('localhost', 'root', '', 'dynamiconepagesite');

  if (mysqli_connect_errno()){
    echo 'Connection false : '. mysqli_connect_error();
    exit;
  }

?>