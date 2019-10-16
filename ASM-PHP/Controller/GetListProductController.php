<?php
require("../HelperConnection/Connection.php");
if ($conn->connect_error) {
  echo $conn->connect_error;
}
$sql = "select * from dongnvnde18077_products";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    echo '<tr>
      <td> <a href = "http://dongnvnde18077.atwebpages.com/ASM-PHP/View/EditProduct.php?id=' . $row["id"] . '">Edit</a> </td>
      <td> <a href = "http://dongnvnde18077.atwebpages.com/ASM-PHP/Controller/DeleteProductController.php?id=' . $row["id"] . '" onclick="return checkdelete()">Delete</a> </td>
       <td> ' . $row["id"] . '</td>
       <td> ' . $row["pname"] . ' </td>
       <td>' . $row["pimage"] . '</td>
       <td> ' . $row["price"] . ' </td>
       <td> ' . $row["sale"] . '</td>
      </tr> ';
  }
} else { }
