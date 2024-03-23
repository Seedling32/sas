<?php
  require_once('../../private/initialize.php');
  include(SHARED_PATH . '/salamander-header.php');
  $pageTitle = 'Create Salamander';
?>

<h2>Create A Salamander</h2>

<form action="<?= url_for('salamanders/create.php'); ?>" method="post">
  <label for="name">Salamander Name:</label></br>
  <input type="text" id="name" name="name"></br>

  <label for="habitat">Salamander Habitat:</label></br>
  <textarea name="habitat" id="habitat" cols="30" rows="10"></textarea></br>

  <label for="description">Salamander Description:</label></br>
  <textarea name="description" id="description" cols="30" rows="10"></textarea></br>

  <input type="submit" value="Create Salamander">
</form>

<p><a href="<?= url_for('/salamanders/index.php'); ?>">&laquo; Back to Salamander List</a></p>

<?php include(SHARED_PATH . '/salamander-footer.php'); ?>
