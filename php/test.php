<?php

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userkeys = '02dce4f66da6e730082798a1e0eac76a';
    
    if (empty($name)) {
      echo "Name is empty";
    } else {
      echo $name;
    }
  }
?>