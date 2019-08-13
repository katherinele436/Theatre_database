<?php
session_start();

if (isset($_POST['submit'])) {
  require 'db.php';

  // Set session variables to be used on profile.php page
  $_SESSION['user_number'] = $_POST['userName'];
  $_SESSION['first_name'] = $_POST['first'];
  $_SESSION['last_name'] = $_POST['last'];

  $userNum = mysqli_real_escape_string($conn, $_POST['userName']);
  $pwd = mysqli_real_escape_string($conn, $_POST['userPassword']);
  $first = mysqli_real_escape_string($conn, $_POST['first']);
  $last = mysqli_real_escape_string($conn, $_POST['last']);

  if (empty($userNum) || empty($pwd) || empty($first) || empty($last) ){
    header("Location: newAccount.php?newAccount=empty");
    exit();
  }else {
    if(!preg_match('/^[1-9][0-9]{0,15}$/', $userNum) || !preg_match('/^[a-zA-Z]*$/', $first)|| !preg_match('/^[a-zA-Z]*$/', $last) ){
      header("Location: newAccount.php?newAccount=invalid");
      exit();
    }else{
      $sql = "SELECT * FROM Customer WHERE accountNum = '$userNum'";
      $result = mysqli_query($conn, $sql);
      $resultCheck = mysqli_num_rows($result);

      if($resultCheck > 0){
        $_SESSION['message'] = 'User with this email already exists!';
        header("Location: newAccount.php?newAccount=accountTaken");
        exit();
      }else{
        $sql = "INSERT INTO Customer (accountNum, password, FName, LName) VALUES ('$userNum','$pwd','$first','$last');";
        if (mysqli_query($conn, $sql)){
          $_SESSION['logged_in'] = true;
          $_SESSION['message'] = 'Succesfully signup.';
          header("Location: newAccount.php?newAccount=success");

        }

      }
    }
  }

}else {
  $_SESSION['message'] = 'Registration failed!';
  header("Location: newAccount.php");
}
 ?>
