<?php

ob_start();
session_start();

if (isset($_SESSION['username']) && $_SERVER['REQUEST_METHOD'] == 'POST') {

  include 'init.php';

  $comment = filter_var($_POST['comment'], FILTER_SANITIZE_SPECIAL_CHARS);
  $adid = filter_var($_POST['adid'], FILTER_SANITIZE_NUMBER_INT);
  $currentUserId = $_SESSION['id'];

  $stmt = $conn->prepare("INSERT INTO comments SET comment = ?, user_id = ?, ad_id = ?, comment_date = NOW()");
  $stmt->execute([$comment, $currentUserId, $adid]);

  $url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : "index.php";

  header("location: $url");
} else {
  header('location: index.php');
}

ob_flush();
