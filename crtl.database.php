<?php

if (ISSET($_REQUEST['submit'])) {
  require 'database.class.php';
  require 'view.class.php';
  $crud = new DbHandler("localhost","dbcrud","root","1234");
  // Database constructor
  switch ($_REQUEST['submit']) {
    case 'update':
      $updateRow = "UPDATE users SET first_name='" . $_REQUEST['first_name'] . "',last_name='" . $_REQUEST['last_name'] . "', user_city='" . $_REQUEST['user_city'] . "' WHERE user_id='" . $_REQUEST['user_id'] . "'";
      echo $crud->UpdateData($updateRow);
      break;
    case 'remove':
    $sql = "DELETE FROM `dbcrud`.`users` WHERE `users`.`user_id` = '" . $_REQUEST['user_id'] . "'";
      echo $crud->DeleteData($sql);
      break;
    case 'create':
      $sql = "INSERT INTO `dbcrud`.`users` (`user_id`, `first_name`, `last_name`, `user_city`) VALUES (NULL, '" . $_REQUEST['first_name'] . "', '" . $_REQUEST['last_name'] . "', '" . $_REQUEST['user_city'] . "');";
      echo $crud->createData($sql);
      break;
    case 'read':
    $data = $crud->readData("SELECT * FROM users");
    $header = $crud->readData("SELECT * FROM users LIMIT 0,1");
    $view = new view();
    $view->createFormTable($data, $header);
    break;
  }
}

?>
