<?php

session_start();
session_unset();
session_destroy();

// Redirect to Homepage
header("location: index.php");
