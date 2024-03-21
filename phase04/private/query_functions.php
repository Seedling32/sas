<?php

function find_all_salamanders()
{
  global $db;

  $sql = "SELECT * FROM salamander ";
  $sql .= "ORDER BY name ASC";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}

function find_salamander_by_id($id) {
  global $db;

  $sql = "SELECT * FROM salamander ";
  $sql .= "Where id='" . $id . "'";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);

  $salamander = mysqli_fetch_assoc($result);
  mysqli_free_result($result);
  return $salamander;
}

function insert_salamander($salamanderName, $salamanderHabitat, $salamanderDescription) {
  global $db;  

  $sql = "INSERT INTO salamander ";
  $sql .= "(name, habitat, description)";
  $sql .= "VALUES (";
  $sql .= "'" . $salamanderName . "',";
  $sql .= "'" . $salamanderHabitat . "',";
  $sql .= "'" . $salamanderDescription . "'";
  $sql .= ")";

  $result = mysqli_query($db, $sql);

  if ($result) {
    return true;
  }

  else {
    echo mysqli_errno($db);
    db_disconnect($db);
    exit;
  }
}

function update_salamander($salamander) {
  global $db;

  $sql = "UPDATE salamander SET ";
  $sql .= "name='" . $salamander['name'] . "',";
  $sql .= "habitat='" . $salamander['habitat'] . "',";
  $sql .= "description='" . $salamander['description'] . "' ";
  $sql .= "WHERE id='" . $salamander['id'] . "' ";
  $sql .= "LIMIT 1";

  $result = mysqli_query($db, $sql);

  if ($result) {
    return true;
  } 
  
  else {
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}

?>
