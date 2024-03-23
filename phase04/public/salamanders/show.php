<?php 
  require_once('../../private/initialize.php');
  include(SHARED_PATH . '/salamander-header.php');
  $page_title = 'Salamander Details';

  $id = $_GET['id'] ?? '1'; 

  $salamander = find_salamander_by_id($id);
?>

<h2>Salamander Details</h2>
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
<p><a href="<?= url_for('/salamanders/index.php'); ?>">&laquo; Back to Salamander List</a></p>

<?php include(SHARED_PATH . '/salamander-footer.php'); ?>
