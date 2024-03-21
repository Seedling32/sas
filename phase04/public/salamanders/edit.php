<?php
require_once('../../private/initialize.php');

// $id = $_GET['id'] ?? '1';

if (!isset($_GET['id'])) {
  redirect_to(url_for('/salamanders/index.php'));
}

$id = $_GET['id'];

if (is_post_request()) {
  $salamander = [];
  $salamander['id'] = $id;
  $salamander['name'] = $_POST['name'] ?? '';
  $salamander['habitat'] = $_POST['habitat'] ?? '';
  $salamander['description'] = $_POST['description'] ?? '';

  $result = update_salamander($salamander);
  redirect_to(url_For('/salamanders/show.php?id=' . $id));
} else {
  $salamander = find_salamander_by_id($id);
}

$page_title = 'Edit Salamander';
include(SHARED_PATH . '/salamander-header.php');

?>

<h2>Edit Salamander</h2>

<form action="<?= url_for('/salamanders/edit.php?id=' . h(u($id))); ?>" method="post">
  <label for="name">Salamander Name:</label></br>
  <input type="text" id="name" name="name" value="<?php echo $salamander['name']; ?>"></br>

  <label for="habitat">Salamander Habitat:</label></br>
  <textarea name="habitat" id="habitat" cols="30" rows="10"><?php echo $salamander['description']; ?></textarea></br>

  <label for="description">Salamander Description:</label></br>
  <textarea name="description" id="description" cols="30" rows="10"><?php echo $salamander['description']; ?></textarea></br>

  <input type="submit" value="Edit Salamander">
</form>

<p><a href="<?= url_for('/salamanders/index.php'); ?>">&laquo; Back to Salamander List</a></p>

<?php include(SHARED_PATH . '/salamander-footer.php'); ?>
