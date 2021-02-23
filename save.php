<?php 
include ('db.php');
if (isset($_POST)){
       $title = $_POST['title'];
       $query = "INSERT INTO task(title) VALUES ('$title')";
       $result = mysqli_query($conn, $query);
       if (!$result){
              echo "Error de query";
       } else{
              $_SESSION['message'] = "Task Save Succesfully!";
              header("Location: index.php");
       }
} else{
       echo "Error";
}
?>