<?php

session_start();

if (isset($_SESSION['username'])) {
  echo $_SESSION['id'];


  // $stmt = $conn->prepare("SELECT ");
} else {
  header('location: index.php');
}
