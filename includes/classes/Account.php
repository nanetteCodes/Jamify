<?php
  class Account {
    //private means only can be called from within this class
    private $con;
    private $errorArray;
    public function __construct($con) {
      $this->con = $con;
      $this->errorArray = array();
    }

    public function login($un, $pw) {
      $pw = md5($pw);
      $query = mysqli_query($this->con, "SELECT * FROM users WHERE username='$un' AND password='$pw'");
      // if one result with the username and password exisists, return
      if(mysqli_num_rows($query) == 1) {
        return true;
      }else {
        array_push($this->errorArray, Constants::$loginFailed );
        return false;
      }
    }

    public function register($un, $fn, $ln, $em, $em2, $pw, $pw2){
      $this->validateUsername($un);
      $this->validateFirstName($fn);
      $this->validateLastName($ln);
      $this->validateEmails($em, $em2);
      $this->validatePasswords($pw, $pw2);
      //if errorArray is empty (no errors), insert in DB
      if(empty($this->errorArray) == true) {
        //Insert into db
        return $this->insertUserDetails($un, $fn, $ln, $em, $pw);
      }else {
        return false;
      }
    }
    //checks to see if any errors
    public function getError($error) {
      if(!in_array($error, $this->errorArray)) {
        $error = "";
      }
      return "<span class='errorMessage'>$error</span>";
    }

    private function insertUserDetails($un, $fn, $ln, $em, $pw) {
      $encryptedPw = md5($pw);
      $profilePic = "assets/images/profile-pics/headshot-placeholder.jpg";
      $date = date("Y-m-d");

      $result = mysqli_query($this->con, "INSERT INTO users VALUES ('', '$un', '$fn', '$ln', '$em', '$encryptedPw', '$date', '$profilePic')");
      return $result;
    }

    private function validateUsername($un) {
      if(strlen($un) > 25 || strlen($un) < 5) {
        array_push($this->errorArray, Constants::$usernameCharacters);
        return;
      }
      $checkUserNameQuery = mysqli_query($this->con, "SELECT username FROM users WHERE username='$un'");
      if(mysqli_num_rows($checkUserNameQuery) !=0) {
        array_push($this->errorArray, Constants::$usernameTaken);
        return;
      }
    }

    private function validateFirstName($fn) {
      if(strlen($fn) > 25 || strlen($fn) < 2) {
        array_push($this->errorArray, Constants::$firstNameCharacters);
        return;
      }
    }

    private function validateLastName($ln) {
      if(strlen($ln) > 25 || strlen($ln) < 2) {
        array_push($this->errorArray, Constants::$lastNameCharacters);
        return;
      }
    }

    private function validateEmails($em, $em2) {
      if($em != $em2) {
        //make sure emails match
        array_push($this->errorArray, Constants::$emailsDoNotMatch);
        return;
      }
      if(!filter_var($em, FILTER_VALIDATE_EMAIL)) {
        // this is to make sure the type is email with @ & .com
        array_push($this->errorArray, Constants::$emailInvalid);
        return;
      }
      $checkEmailQuery = mysqli_query($this->con, "SELECT email FROM users WHERE email='$em'");
      if(mysqli_num_rows($checkEmailQuery) !=0) {
        array_push($this->errorArray, Constants::$emailTaken);
        return;
      }
    }

    private function validatePasswords ($pw, $pw2) {
      if($pw != $pw2) {
        array_push($this->errorArray, Constants::$passwordCharacters);
        return;
      }
      //check if it contains anything other then letters and numbers
      //if password matches this expression (not A-Z or 0-9) dont except
      if(preg_match('/[^A-Za-z0-9]/', $pw)) {
        array_push($this->errorArray, Constants::$passwordNotAlphanumeric);
        return;
      }
      if(strlen($pw) > 20 || strlen($pw) < 8) {
        array_push($this->errorArray, Constants::$passwordsDoNoMatch);
        return;
      }

    }
  }

?>
