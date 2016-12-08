
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

?>
