<?php
  require_once('../../private/initialize.php');

  if (is_post_request()) {

  $salamanderName = $_POST['name'] ?? '';

  print("<p>Salamander Name: $salamanderName</p>
         <p><a href=" . url_for('/salamanders/index.php') . ">&laquo; Back to Salamander List</a></p>");
  } 

  elseif(is_get_request()) {
    redirect_to(url_for('/salamanders/new.php'));
  }

  else {
  redirect_to(url_for('/salamanders/new.php'));
  }

?>
