<?php
include("includes/config.php");
include("includes/classes/Artist.php");
include("includes/classes/Album.php");

//session_destroy(); logout

if(isset($_SESSION['userLoggedIn'])) {
  $userLoggedIn = $_SESSION['userLoggedIn'];
}else {
  header("Location: register.php");
}
?>

<html>
  <head>
    <meta charset="utf-8">
    <title>Jamify</title>
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>
    <div id="mainContainer">
      <div id="topContainer">
        <?php include("includes/navBarContainer.php") ?>
        <div id="mainViewContainer">
          <div id="mainContent">
