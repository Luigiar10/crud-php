<?php
       include ('db.php');

       if (isset($_GET['id'])){
              $id = $_GET['id'];
              $query = "DELETE FROM task WHERE id = $id";
              $result = mysqli_query($conn, $query);
              if (!$result){
                     echo "Error";
              } else {
                     $_SESSION['message'] = "Task remove succesfully!";
                     header ("Location: index.php");
              }
       }
?>