<?php

  require_once('../../private/initialize.php');
  include(SHARED_PATH . '/salamander-header.php');

  if (!isset($_GET['id'])) {
    redirect_to(url_for('salamanders/index.php'));
  }

  $id = $_GET['id'];

  if (is_post_request()) {
    delete_salamander($id);
    redirect_to(url_for('salamanders/index.php'));
  }

  else {
    $salamander = find_salamander_by_id($id);
  }

  $pageTitle = 'Delete Salamander'; 

?>

<h1>Delete Salamander</h1>

<table>
  <tr>
    <th>Id</th>
    <th>Name</th>
    <th>Habitat</th>
    <th>Description</th>
  </tr>
  <tr>
    <td><?= $salamander['id'] ?></td>
    <td><?= $salamander['name'] ?></td>
    <td><?= $salamander['habitat'] ?></td>
    <td><?= $salamander['description'] ?></td>
  </tr>
</table>
<p>Are you sure you want to delete this salamander?</p>
<p><?= h($salamander['name']); ?></p>

<form action="<?= url_for('salamanders/delete.php?id=' . h(u($salamander['id']))); ?>" method="post">
  <input type="submit" name="commit" value="Delete Salamander" />
</form>

<p><a href="<?= url_for('salamanders/index.php'); ?>">&laquo; Back to Salamanders</a></p>

<? include(SHARED_PATH . '/salamander-footer.php'); ?>
