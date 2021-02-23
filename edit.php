<?php
       include('header.php');
       include('db.php');
       if(isset($_GET['id'])){
              $id = $_GET['id'];
              $query = "SELECT * FROM task WHERE id = $id";
              $result_title = mysqli_query($conn, $query);
              if (mysqli_num_rows($result_title) == 1){
                     $row = mysqli_fetch_array($result_title);
                     $title = $row['title'];
              }
       }

       if (isset($_POST['update'])){
              $id = $_GET['id'];
              $title = $_POST['title'];
              
              $query = "UPDATE task SET title = '$title' WHERE id = $id";
              mysqli_query($conn, $query);
              $_SESSION['message'] = "Task Updated succesfully";
              header("Location: index.php");
       }
?>

<header>
       <a href="index.php">
              <h1>Task App</h1>
       </a>
</header>
<div class="crud">
       <h2>Edit Task</h2>
       <form action="edit.php?id=<?php echo $_GET['id'] ?>" method="POST">
              <input type="text" name="title" placeholder="Update Task" value="<?php echo $title ?>">
              <input type="submit" value="Update" name="update">
       </form>
</div>

<?php include('footer.php') ?>