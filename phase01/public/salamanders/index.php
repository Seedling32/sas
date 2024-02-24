<?php require('initialize.php');

  // Write a salamanders array with the following
  // id=1, salamanderName = Red-Legged Salamander
  // id=2, salamanderName = Pigeon Mountain Salamander
  // id=3', salamanderName = ZigZag Salamander
  // id=4,  salamanderName= Slimy Salamander 

  $salamanders = [
    ['id' => '1', 'salamanderName' => 'Red-Legged Salamander'],
    ['id' => '2', 'salamanderName' => 'Pigeon Mountain Salamander'],
    ['id' => '3', 'salamanderName' => 'ZigZag Salamander'],
    ['id' => '4', 'salamanderName' => 'Slimy Salamander']
  ];

  // Add the pageTitle for salamanders
  // Include a shared path to the salamander header
  $pageTitle = 'Salamander: Types';
  include(SHARED_PATH.'/salamander-header.php');

?>

<h1>Salamanders</h1>

  <a href="#">Create Salamander</a>

<table>
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>&nbsp;</th>
    <th>&nbsp;</th>
    <th>&nbsp;</th>
  </tr>

      <?php foreach($salamanders as $salamander) { ?>
        <tr>
          <td><?php echo $salamander['id']; ?></td>
    	    <td><?php echo $salamander['salamanderName']; ?></td>
          <td><a href="<?= url_For('/salamanders/show.php?id=' . $salamander['id']); ?>">View</a></td>
          <td><a href="#">Edit</a></td>
          <td><a href="#">Delete</a></td>
    	  </tr>
      <?php } ?>
  	</table>

<?php
  // php add the shared path to the salamander footer 
  include(SHARED_PATH . '/salamander-footer.php');


?>
