<?php

function find_all_salamanders()
{
  global $db;

  $sql = "SELECT * FROM salamanders ";
  $sql .= "ORDER BY name ASC";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}

?>
