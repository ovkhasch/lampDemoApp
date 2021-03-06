<!DOCTYPE html>
<html lang="en">
<head>
    <title>Cloudply Customers</title>
    <style>
      table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        font-family: sans-serif;
        padding: 5px;
      }
      table tr:nth-child(even) td {
        background-color: #95c7ea;
      }
    </style>
</head>
<body>
    
<h2>Version 1.20.8</h2><br>
    
<?php
    
include("db.php");
    
// Perform SQL query
$sql = "SELECT * FROM customers";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>\n";
    // Output data of each row
    while($row = $result->fetch_assoc()) {
      echo "\t<tr>\n";
      foreach ($row as $col_value) {
          print "\t\t<td>$col_value</td>\n";
      }
      $id=$row['id'];  
      echo "\t\t<td><a href=\"delete.php?id=$id\" onclick=\"return confirm(\'Are you sure you wish to delete this Record?\');\"> X </a></td>\n";
      echo "\t</tr>\n";
    }
    echo "</table>";
} else {
    echo "0 results";
}

// Close connection
$conn->close();
?>
    
<form action="insert.php" method="post" name="insertform">
<p>
  <label for="name" id="preinput"> First Name : </label>
  <input type="text" name="first_name" required placeholder="First name" id="inputid"/>
</p>
<p>
  <label for="name" id="preinput"> Last Name : </label>
  <input type="text" name="last_name" required placeholder="Last name" id="inputid"/>
</p>
<p>
  <label  for="email" id="preinput"> Email : </label>
  <input type="email" name="usermail" required placeholder="Email" id="inputid" />
</p>
<p>
  <input type="submit" name="send" value="Submit" id="inputid1"  />
</p>
</form>    
    
</body>
</html>
