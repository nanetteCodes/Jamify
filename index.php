<?php
include("includes/config.php");

//session_destroy();

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
        <div id="navBarContainer">
          <nav class="navBar">
            <a href="index.php" class="logo">
              <img src="assets/images/icons/logo-white.png" alt="jamify logo">
            </a>
            <div class="group">
              <div class="navItem">
                <a href="search.php" class="navItemLink">Search
                  <img src="assets/images/icons/search.png" class="icon" alt="search">
                </a>
              </div>
            </div>
            <div class="group">
              <div class="navItem">
                <a href="browse.php" class="navItemLink">Browse</a>
              </div>
              <div class="navItem">
                <a href="yourMusic.php" class="navItemLink">Your Music</a>
              </div>
              <div class="navItem">
                <a href="profile.php" class="navItemLink">Nanette Julius</a>
              </div>
            </div>
          </nav>
        </div>
      </div>
      <div id="nowPlayingBarContainer">
        <div id="nowPlayingBar">
          <div id="nowPlayingLeft">
            <div class="content">
              <span class="albumLink">
                <img class ="albumArtwork" src="https://lh3.googleusercontent.com/gRYwmm-BbgwOVxs94NLdhFK7RHJPG1-WpDe4rzRGmyWjAp6HNnYIkkH56cz3Zu6FtQ=w300" alt="">
              </span>
              <div class="trackInfo">
                <span class="trackName">
                  <span>happy birthday</span>
                </span>
                <span class="artistName">
                  <span>Me</span>
                </span>
              </div>
            </div>
          </div>
          <div id="nowPlayingCenter">
            <div class="content playerControls">
              <div class="buttons">
                <button class="controlButton shuffle"  title="shuffle">
                  <img src="assets/images/icons/shuffle.png" alt="shuffle">
                </button>
                <button class="controlButton previous"  title="previous">
                  <img src="assets/images/icons/previous.png" alt="previous">
                </button>
                <button class="controlButton play"  title="play">
                  <img src="assets/images/icons/play.png" alt="play">
                </button>
                <button class="controlButton pause"  title="pause" style="display: none;">
                  <img src="assets/images/icons/pause.png" alt="pause">
                </button>
                <button class="controlButton next"  title="next">
                  <img src="assets/images/icons/next.png" alt="next">
                </button>
                <button class="controlButton repeat"  title="repeat">
                  <img src="assets/images/icons/repeat.png" alt="repeat">
                </button>
              </div>
                <div class="playbackBar">
                  <span class="progressTime current">0.00</span>
                <div class="progressBar">
                  <div class="progressBarBg">
                    <div class="progress"></div>
                  </div>
                </div>
                <span class="progressTime remaining">0.00</span>
              </div>
            </div>
          </div>
          <div id="nowPlayingRight">
            <div class="volumeBar">
              <button class="controlButton volume" title="volume">
                <img src="assets/images/icons/volume.png" alt="volume">
              </button>
              <div class="progressBar">
                <div class="progressBarBg">
                  <div class="progress"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </body>
</html>
