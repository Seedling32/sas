<?php
  require_once('../../private/initialize.php');
  include(SHARED_PATH . '/salamander-header.php'); 

  if (is_post_request()) {
  $salamander = [];
  $salamander['name'] = $_POST['name'] ?? '';
  $salamander['habitat'] = $_POST['habitat'] ?? '';
  $salamander['description'] = $_POST['description'] ?? '';

  $result = insert_salamander($salamander);
  $new_id = mysqli_insert_id($db);
  redirect_to(url_for('salamanders/show.php?id=' . $new_id));

  print("<p><a href=" . url_for('/salamanders/index.php') . ">&laquo; Back to Salamander List</a></p>");
  } 

  else {
  redirect_to(url_for('/salamanders/new.php'));
  }

?>
