<?php
 ob_start();
  include("db.php");
  if(isset($_POST['send'])!="")
  {
  $first_name=mysql_real_escape_string($_POST['first_name']);
  $last_name=mysql_real_escape_string($_POST['last_name']);
  $usermail=mysql_real_escape_string($_POST['usermail']);
  $update=mysql_query("INSERT INTO customers ( id, first_name, last_name, email ) VALUES ( uuid(), '$username','$last_name','$usermail')");
  
  if($update)
  {
      $msg="Successfully Updated!!";
      echo "<script type='text/javascript'>alert('$msg');</script>";
      header('Location:index.php');
  }
  else
  {
     $errormsg="Something went wrong, Try again";
      echo "<script type='text/javascript'>alert('$errormsg');</script>";
  }
  }
 ob_end_flush();
?>
