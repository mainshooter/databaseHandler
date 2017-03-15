<?php
// foreach ($res as $row) {
//   echo "<tr>";
//   foreach ($row as $key => $value) {
//     echo "
//         <td>" . $value ."</td>
//     ";
//   }
//   echo "<tr>";
// }
  class view {
    // We create view in here
    function createFormTable($row, $header) {
      // This function create the table where are froms in it
      $res = $row;
      echo "
      <table class='table-hover'>

      ";
      foreach ($header as $rowheader) {
        echo "<tr>";
        foreach ($rowheader as $key => $value) {
          // To display the TH
          echo "
            <th>" . $key . "</th>
          ";
        }
        echo "</tr>";
      }
      foreach ($res as $row) {
        // To display the content
        echo "<tr>";
        foreach ($row as $key => $value) {
          if (is_numeric($value)) {
            // If the value is numeric it is a ID
            // So we only display it
            echo "<td>" . $value . "</td>";
          }
          else {
            // If the value isn't nummeric
            echo "
                <td><input type='text' id='" . $key . $row['user_id'] ."' value='" . $value . "'></td>
            ";
          }
        }
        echo "
              <td><button class='btn btn-secondary' type='button' onclick=updateData(" . $row['user_id'] . ");>Update</button></td>
              <td><button class='btn btn-secondary' type='button' onclick=deleteData(" . $row['user_id'] . ");>Remove!</button></td>";
        echo "<tr>";
      }

      $res = $row;

      echo "</table>";
    }
  }

?>
