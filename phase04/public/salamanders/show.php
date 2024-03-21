<?php 
  require_once('../../private/initialize.php'); 

  $id = $_GET['id'] ?? '1'; 

  $subject = find_salamander_by_id($id);

  $page_title = 'Salamander Details';
  include(SHARED_PATH . '/salamander-header.php');
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
    <td><?= $subject['id'] ?></td>
    <td><?= $subject['name'] ?></td>
    <td><?= $subject['habitat'] ?></td>
    <td><?= $subject['description'] ?></td>
  </tr>
</table>
<p> Page ID:<?= h($id); ?></p>
<p><a href="<?= url_for('/salamanders/index.php'); ?>">&laquo; Back to Salamander List</a></p>

<?php include(SHARED_PATH . '/salamander-footer.php'); ?>
