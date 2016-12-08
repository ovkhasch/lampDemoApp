<?php
 ob_start();
  include("db.php");
  if(isset($_POST['send'])!="")
  {
  $first_name=$_POST['first_name'];
  $last_name=$_POST['last_name'];
  $usermail=$_POST['usermail'];
  $update=$conn->query("INSERT INTO customers ( id, first_name, last_name, email ) VALUES ( uuid(), '$first_name','$last_name','$usermail')");
  $conn->close();
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
