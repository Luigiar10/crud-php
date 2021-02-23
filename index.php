<?php include('db.php') ?>
<?php include('header.php') ?>
       <header>
              <a href="index.php">
                     <h1>Task App</h1>
              </a>
       </header>
       <?php if (isset($_SESSION['message'])) { ?>
              <div class="message">
                     <p><?= $_SESSION['message'] ?></p>
              </div>
       <?php session_unset(); } ?>
       <div class="crud">
              <h2>New Task</h2>
              <form action="save.php" method="POST">
                     <input type="text" name="title" placeholder="New Task">
                     <input type="submit" value="Create">
              </form>
       </div>
       <div class="list__task">
              <h2>Tasks</h2>
              <!-- <div class="search">
                     <form action="">
                            <input type="text" placeholder="Search task">
                            <i class="fas fa-search"></i>
                     </form>
              </div> -->
              <?php
                     $query = "SELECT * FROM task";
                     $result_title = mysqli_query($conn, $query);

                     while($row = mysqli_fetch_array($result_title)) { ?>
                            <div class="task">
                                   <p><?php echo $row['title'] ?></p>
                                   <p><?php echo $row['created_at'] ?></p>
                                   <div class="buttons">
                                          <a href="edit.php?id=<?php echo $row['id'] ?>">
                                                 <i class="fas fa-edit" style="color: green"></i>
                                          </a>
                                          <a href="delete.php?id=<?php echo $row['id'] ?>">
                                                 <i class="fas fa-trash-alt" style="color: red"></i>
                                          </a>
                                   </div>
                            </div>
              <?php } ?>
       </div>
<?php include('footer.php') ?>