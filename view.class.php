<?php

  class view {
    // We create view in here
    function createFormTable($row) {
      // This function create the table where are froms in it
      echo "
      <table class='table-hover'>
        <tr>
          <th>userID</th>
          <th>First Name</th>
          <th>Last name</th>
          <th>User City</th>
        </tr>
      ";
      foreach ($row as $key) {
        echo "
          <tr>
            <form method='post' class='form-group' action='crtl.database.php'>
              <input type='hidden' name='user_id' id='userID' value='" . $key['user_id'] . "'>
              <td>" . $key['user_id'] . "</td>
              <td><input type='text' class='form-control' name='first_name' id='first_name" . $key['user_id'] . "' value='" . $key['first_name'] . "'></td>
              <td><input type='text' class='form-control' name='last_name' id='last_name" . $key['user_id'] . "' value='" . $key['last_name'] . "'></td>
              <td><input type='text' class='form-control' name='user_city' id='user_city" . $key['user_id'] . "' value='" . $key['user_city'] . "'></td>
              <td><button type='button' onclick=updateData(" . $key['user_id'] . ");>Update</button></td>
              <td><button type='button' onclick=deleteData(" . $key['user_id'] . ");>Remove!</button></td>
            </form>
          </tr>
      </form>
        ";
      }
      echo "</table>";
    }
  }

?>
