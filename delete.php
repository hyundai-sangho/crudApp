<?php

require_once 'Database.php';

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $db = new Database();
  $db->deleteData($id);
}

?>
