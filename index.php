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
    
<h2>Version 1.3.1</h2><br>
    
<?php
    
$ini = parse_ini_file(".user.ini");
    
echo "<h3>Node: ";
print $ini["node.fqdn"];    
echo "</h3><br>";    
    
$servername = $ini["mysql.default.host"];//"mysql.cloudply.org";
$username = $ini["mysql.default.user"];//"db_admin";
$password = $ini["mysql.default.password"];//"mysql_admin_password";
$dbname = "lamp_demo";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

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
      echo "\t</tr>\n";
    }
    echo "</table>";
} else {
    echo "0 results";
}

// Close connection
$conn->close();
?>
</body>
</html>
