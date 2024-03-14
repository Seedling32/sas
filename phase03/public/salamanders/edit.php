<?php 
  require_once('../../private/initialize.php');

  $id = $_GET['id'] ?? '1';
  $page_title = 'Edit Salamander';

  if (!isset($_GET['id'])) {
    redirect_to(url_for('/salamanders/index.php'));
  }

  $id = $_GET['id'];
  $salamanderName = '';

  if (is_post_request()) {
    $salamanderName = $_POST['name'] ?? '';
    print("<p>Salamander Name: $salamanderName</p>");
  }

  include(SHARED_PATH . '/salamander-header.php');

?>

<h2>Edit Salamander</h2>

<form action="<?= url_for('/salamanders/edit.php?id=' . h(u($id))); ?>" method="post">
  <label for="name">Salamander Name:</label></br>
  <input type="text" id="name" name="name" value="<?php echo $salamanderName; ?>"></br></br>

  <input type="submit" value="Edit Salamander">
</form>

<p><a href="<?= url_for('/salamanders/index.php'); ?>">&laquo; Back to Salamander List</a></p>

<?php include(SHARED_PATH . '/salamander-footer.php'); ?>
