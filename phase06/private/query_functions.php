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

function insert_salamander($salamander) {
  global $db;

  $errors = validate_salamander($salamander);
  if (!empty($errors)) {
    return $errors;
  }

  $sql = "INSERT INTO salamander ";
  $sql .= "(name, habitat, description)";
  $sql .= "VALUES (?, ?, ?)";
  $sql .= "LIMIT 1";

  $stmt = mysqli_prepare($db, $sql);

  mysqli_stmt_bind_param($stmt, "sss", $name, $habitat, $description);

  $name = $salamander['name'];
  $habitat = $salamander['habitat'];
  $description = $salamander['description'];

  $result = mysqli_stmt_execute($stmt);

  if ($result) {
    return true;
  }

  else {
    echo mysqli_errno($db);
    db_disconnect($db);
    exit();
  }
}

function update_salamander($salamander) {
  global $db;

  $errors = validate_salamander($salamander);
  if(!empty($errors)) {
    return $errors;
  }

  $sql = "UPDATE salamander SET ";
  $sql .= "name='?',";
  $sql .= "habitat='?',";
  $sql .= "description='?' ";
  $sql .= "WHERE id='" . $salamander['id'] . "' ";
  $sql .= "LIMIT 1";

  $stmt = mysqli_prepare($db, $sql);

  mysqli_stmt_bind_param($stmt, "sss", $name, $habitat, $description);

  $name = $salamander['name'];
  $habitat = $salamander['habitat'];
  $description = $salamander['description'];

  $result = mysqli_stmt_execute($stmt);

  if ($result) {
    return true;
  } 
  
  else {
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}

function delete_salamander($id)
{
  global $db;
  $sql = "DELETE FROM salamander ";
  $sql .= "WHERE id = '" . $id . "' ";
  $sql .= "LIMIT 1";

  $result = mysqli_query($db, $sql);
  if ($result) {
    return true;
  } else {
    echo mysqli_error($db);
    db_disconnect($db);
    exit();
  }
}

function validate_salamander ($salamander) {
  $errors = [];

  if(is_blank($salamander['name'])) {
    $errors[] = "Salamander name cannot be blank.";
  }

  if(!has_length($salamander['name'], ['min' => 2, 'max' => 255])) {
    $errors[] = "Salamander name must be between 2 and 255 characters.";
  }

  if(is_blank($salamander['description'])) {
    $errors[] = "Salamander description cannot be blank.";
  }

  if(is_blank($salamander['habitat'])) {
    $errors[] = "Salamander habitat cannot be blank.";
  }

  return $errors;
}

?>