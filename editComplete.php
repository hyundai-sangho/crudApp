<?php

require_once 'Database.php';

if (isset($_POST['submit'])) {
  $db = new Database();

  $id = $_POST['id'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $gender = $_POST['gender'];

  $db->editData($name, $email, $gender, $id);
}
