<?php
  ob_start();
  include("db.php");
  if(isset($_GET['id'])!="")
  {
  $delete=$_GET['id'];
  $delete=$conn->query("DELETE FROM customers WHERE id='$delete'");
  $conn->close();
  if($delete)
  {
      header("Location:index.php");
  }
  else
  {
      echo mysql_error();
  }
  }
  ob_end_flush();
?>
