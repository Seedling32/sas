<?php
  require_once('../../private/initialize.php');

  if (is_post_request()) {

  $salamanderName = $_POST['name'] ?? '';
  $salamanderHabitat = $_POST['habitat'] ?? '';
  $salamanderDescription = $_POST['description'] ?? '';

  $result = insert_salamander($salamanderName, $salamanderHabitat, $salamanderDescription);
  $new_id = mysqli_insert_id($db);
  redirect_to(url_for('salamanders/show.php?id=' . $new_id));

  print("<p><a href=" . url_for('/salamanders/index.php') . ">&laquo; Back to Salamander List</a></p>");
  } 

  elseif(is_get_request()) {
    redirect_to(url_for('/salamanders/new.php'));
  }

  else {
  redirect_to(url_for('/salamanders/new.php'));
  }

?>
