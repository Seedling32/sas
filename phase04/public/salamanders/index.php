<?php
  require_once('../../private/initialize.php');

  $salamander_set = find_all_salamanders();

  // $salamanders = [
  //   ['id' => '1',  'salamanderName' => 'Red-Legged Salamander'],
  //   ['id' => '2',  'salamanderName' => 'Pigeon Mountain Salamander'],
  //   ['id' => '3',  'salamanderName' => 'ZigZag Salamander'],
  //   ['id' => '4',  'salamanderName' => 'Slimy Salamander'],
  // ];

  $page_title = 'Salamanders';
  include(SHARED_PATH . '/salamander-header.php');

?>

<h2>Salamanders Main Page</h2>

<a href="<?= url_for('/salamanders/new.php'); ?>">Create a Salamander</a>

<table>
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Habitat</th>
    <th>Description</th>
    <th colspan="3">Action</th>
  </tr>

  <?php
  while ($salamander = mysqli_fetch_assoc($salamander_set)) { ?>
    <tr>
      <td><?= h($salamander['id']); ?></td>
      <td><?= h($salamander['name']); ?></td>
      <td><?= h($salamander['habitat']); ?></td>
      <td><?= h($salamander['description']); ?></td>
      <td><a href="<?= url_for('salamanders/show.php?id=' . h(u($salamander['id']))); ?>">View</a></td>
      <td><a href="<?= url_for('salamanders/edit.php?id=' . h(u($salamander['id']))); ?>">Edit</a></td>
      <td><a href="<?= url_for('salamanders/delete.php?id=' . h(u($salamander['id']))); ?>">Delete</a></td>
    </tr>
  <?php } ?>
</table>

<?php
  mysqli_free_result($subject_set);

  include(SHARED_PATH . '/salamander-footer.php'); 
?>
