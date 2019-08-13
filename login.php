<?php
session_start();

require 'db.php';
if (isset($_POST['Login'])) {

  $userNum = mysqli_real_escape_string($conn, $_POST['userName']);
  $pwd = mysqli_real_escape_string($conn, $_POST['userPassword']);

  if(empty($userNum) && empty($pwd) ){
		header("Location: index.php");
  }else {
    $sqlAdmin = "SELECT * FROM Admin WHERE adminNum='$userNum'";
    $resultAdmin = mysqli_query($conn,$sqlAdmin);
    $resultCheckAdmin = mysqli_num_rows($resultAdmin);
    if ($resultCheckAdmin >= 1){
      if( $rowAdmin = mysqli_fetch_assoc($resultAdmin)){
        $passAdmin = "SELECT * FROM Admin WHERE password='$pwd'";
        $resultPassAdmin = mysqli_query($conn,$passAdmin);
        $passCheckAdmin = mysqli_num_rows($resultPassAdmin);
        if ($passCheckAdmin < 1){
          header("Location: index.php");
          exit();
        }else{
          $_SESSION['user_number'] = $rowAdmin['adminNum'];
          $_SESSION['first_name'] = $rowAdmin['first'];
          $_SESSION['last_name'] = $rowAdmin['last'];
          $_SESSION['logged_in'] = true;
          header("Location: admin.php");
          exit();
        }
      }
    }else{
        $sql = "SELECT * FROM Customer WHERE accountNum='$userNum'";
        $result = mysqli_query($conn,$sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck < 1){
          header("Location: index.php");
          exit();
        } else {
          if( $row = mysqli_fetch_assoc($result)){
    				$pass = "SELECT * FROM Customer WHERE password='$pwd'";
    		    $resultPass = mysqli_query($conn,$pass);
    		    $passCheck = mysqli_num_rows($resultPass);
            if ($passCheck < 1){
              header("Location: index.php");
              exit();
            }else{
              $_SESSION['user_number'] = $row['accountNum'];
              $_SESSION['first_name'] = $row['FName'];
              $_SESSION['last_name'] = $row['LName'];
              $_SESSION['street'] = $row['street'];
              $_SESSION['city'] = $row['city'];
              $_SESSION['postalCode'] = $row['postalCode'];
              $_SESSION['card_number'] = $row['cardNumber'];
              $_SESSION['name_on_card'] = $row['nameOnCard'];
              $_SESSION['expiry_date'] = $row['expiryDate'];

              $_SESSION['logged_in'] = true;
              header("Location: movies.php");
              exit();
            }
          }
      }
    }
  }
}
?>
