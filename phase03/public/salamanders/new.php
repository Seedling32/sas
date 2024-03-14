<?php
  require_once('../../private/initialize.php');

  $test = $GET['test'] ?? '';

  if ($test == '404') {
    error_404();
  }
  
  elseif ($test == '500') {
    error_500();
  }
  
  elseif ($test == 'redirect') {
    redirect_to(url_For('/salamanders/index.php'));
  }

  $pageTitle = 'Create Salamander';

  include(SHARED_PATH . '/salamander-header.php');

?>

<h2> Stub for Create A Salamander</h2>

<!-- <form action="<?//= url_for('/salamanders/create.php'); ?>" method="post">
  <label for="name">Salamander Name:</label></br>
  <input type="text" id="name" name="name"></br></br>

  <input type="submit" value="Create Salamander">
</form> -->

<p><a href="<?= url_for('/salamanders/index.php'); ?>">&laquo; Back to Salamander List</a></p>

<?php include(SHARED_PATH . '/salamander-footer.php'); ?>
