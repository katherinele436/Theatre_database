<?php include_once "./includes/functions.php"; ?>
<?php
session_start();
require 'db.php';
$_SESSION['logged_in'] = true;
if (isset($_POST['add'])){

  $title = mysqli_real_escape_string($conn, $_POST['title']);
  $running_time = mysqli_real_escape_string($conn, $_POST['runningtime']);
  $rating = mysqli_real_escape_string($conn, $_POST['rating']);
  $plot = mysqli_real_escape_string($conn, $_POST['plot']);
  $director =mysqli_real_escape_string($conn, $_POST['director']);
  $company = mysqli_real_escape_string($conn, $_POST['company']);
  $start = mysqli_real_escape_string($conn, $_POST['start']);
  $end = mysqli_real_escape_string($conn, $_POST['end']);
  $poster = mysqli_real_escape_string($conn, $_POST['post']);
  if (empty($title) || empty($start) ){
    header("Location: addmoviesinfo.php?addmoviesinfo=empty");
    exit();
  }else {

      $sql = "SELECT * FROM Movie WHERE title = '$title' and startDate='$start'";
      $result = mysqli_query($conn, $sql);
      $resultCheck = mysqli_num_rows($result);

      if($resultCheck > 0){

        $_SESSION['message'] = 'Movie already exists!';
        header("Location: addmoviesinfo.php?addmoviesinfo=movieExist");
        exit();
      }else{
        $sql = "INSERT INTO Movie (title, runningTime, rating, plotSynopsis, director, productionCompany, startDate, endDate ,poster) VALUES ('$title','$running_time','$rating','$plot','$director','$company','$start','$end','$poster');";
        if (mysqli_query($conn, $sql)){
          header("Location: addmovies.php");
          exit();
        }
        else{
          printf("error: %s\n", mysqli_error($conn));
          echo 'Succesfully added no.';
        }

      }

  }

}else {
  $_SESSION['message'] = 'Registration failed!';
  header("Location: addmovies.php");
}
?>
