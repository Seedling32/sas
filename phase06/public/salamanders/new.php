<?php
require_once('../../private/initialize.php');
include(SHARED_PATH . '/salamander-header.php');
$pageTitle = 'Create Salamander';

if (is_post_request()) {
  $salamander = [];
  $salamander['name'] = $_POST['name'] ?? '';
  $salamander['habitat'] = $_POST['habitat'] ?? '';
  $salamander['description'] = $_POST['description'] ?? '';

  $result = insert_salamander($salamander);
  if ($result === true) {
    $new_id = mysqli_insert_id($db);
    redirect_to(url_for('salamanders/show.php?id=' . $new_id));
  } else {
    $errors = $result;
  }
} 

else {
  //display the blank form
}
?>

<h2>Create A Salamander</h2>

<?php echo display_errors($errors); ?>

<form action="<?= url_for('salamanders/new.php'); ?>" method="post">
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
