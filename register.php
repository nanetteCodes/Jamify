<?php
  include("includes/config.php");
  include("includes/classes/Account.php");
  include("includes/classes/Constants.php");
      $account = new Account($con);
  include("includes/handlers/register-handler.php");
  include("includes/handlers/login-handler.php");

  function getInputValue($name) {
    if(isset($_POST[$name])) {
      echo $_POST[$name];
    }
  }
?>

<html>
  <head>
    <meta charset="utf-8">
    <title> Welcome to Jamify!</title>
    <link rel="stylesheet" href="assets/css/register.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="assets/js/register.js"></script>

  </head>
  <body>
    <?php
    if(isset($_POST['registerButton'])) {
      echo '<script>
              $(document).ready(function() {
                  $("#loginForm").hide();
                  $("#registerForm").show();
              });
            </script>';
    }else {
      echo '<script type="text/javascript">
              $(document).ready(function() {
                  $("#loginForm").show();
                  $("#registerForm").hide();
              });
            </script>';
    }
     ?>

    <div id="background">
      <div id="loginContainer">

        <div id ="inputContainer">
          <form id="loginForm" action="register.php" method="post">
            <h2>Login to your account</h2>
            <p>
              <?php echo $account->getError(Constants::$loginFailed); ?>
              <label for="loginUsername">Username</label>
              <input id="loginUsername" type="text" name="loginUsername" placeholder="e.g. johnSnow" value="<?php getInputValue('loginUsername') ?>" required>
            </p>

            <p>
              <label for="loginPassword">Password</label>
              <input id="loginPassword" type="password" name="loginPassword" placeholder="password" required>
            </p>
            <button type="submit" name="loginButton">LOG IN</button>

            <div class="hasAccountText">
              <span id="hideLogin">Don't have an account yet? Signup here.</span>
            </div>
          </form>


          <form id="registerForm" action="register.php" method="post">
            <h2>Create Free Account</h2>
            <p>
              <?php echo $account->getError(Constants::$usernameCharacters); ?>
              <?php echo $account->getError(Constants::$usernameTaken); ?>
              <label for="username">Username</label>
              <input id="username" type="text" name="username" placeholder="e.g. johnSnow" value="<?php getInputValue('username')?>" required>
            </p>
            <p>
              <?php echo $account->getError(Constants::$firstNameCharacters); ?>
              <label for="firstName">First Name</label>
              <input id="firstName" type="text" name="firstName" placeholder="e.g. John" value="<?php getInputValue('firstName')?>" required>
            </p>
            <p>
              <?php echo $account->getError(Constants::$lastNameCharacters); ?>
              <label for="lastName">Last Name</label>
              <input id="lastName" type="text" name="lastName" placeholder="e.g. Snow" value="<?php getInputValue('lastName')?>" required>
            </p>
            <p>
              <?php echo $account->getError(Constants::$emailsDoNotMatch); ?>
              <?php echo $account->getError(Constants::$emailInvalid); ?>
              <?php echo $account->getError(Constants::$emailTaken); ?>
              <label for="email">Email</label>
              <input id="email" type="email" name="email" placeholder="e.g. snow@gmail.com" value="<?php getInputValue('email')?>" required>
            </p>
            <p>
              <label for="email2">Confirm Email</label>
              <input id="email2" type="text" name="email2" placeholder="e.g. snow@gmail.com" value="<?php getInputValue('email2')?>" required>
            </p>
            <p>
              <?php echo $account->getError(Constants::$passwordCharacters); ?>
              <?php echo $account->getError(Constants::$passwordNotAlphanumeric); ?>
              <?php echo $account->getError(Constants::$passwordsDoNoMatch); ?>
              <label for="password">Password</label>
              <input id="password" type="password" name="password" placeholder="password" required>
            </p>
            <p>
              <label for="password2">Confirm Password</label>
              <input id="password2" type="password" name="password2" placeholder="confirm password" required>
            </p>
            <button type="submit" name="registerButton">SIGNUP</button>
            <div class="hasAccountText">
              <span id="hideRegister">Already have an account? Login Here.</span>
            </div>
          </form>

        </div>
        <div id="loginText">
          <h1>Get great music, right now</h1>
          <h2>Listen to songs for free.</h2>
          <ul>
            <li>Discover music you'll fall in love with </li>
            <li>Create your own playlists</li>
            <li>Follow artists to keep up to date</li>
          </ul>
        </div>
      </div>
    </div>
  </body>
</html>
