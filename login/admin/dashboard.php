<?php 

  header('X-Frame-Options: DENY');
  header('X-XSS-Protection: 1; mode=block');
  header('X-Content-Type-Options: nosniff');

  session_start();
  $_SESSION['LAST_ACTIVE_TIME'] = time();

  if(!isset($_SESSION['IS_LOGIN'])){
    header('location: index.php', true);
    die();
  }

  // INSERT INTO `students_info` (`id`, `name`, `mobile`, `email`, `address`) VALUES (NULL, 'Sana Shaikh', '7897678342', 'sanashaikh@gmail.com', 'Shashtri Chowk Pirjade Plot Miraj');
  include "../config.php";

  $sql = "SELECT * FROM `students_info`;";
  $query = mysqli_query($con, $sql);

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <style type="text/css">
      .sinfo{
        text-align:center; 
        padding: 10px; 
        font-size: 20px; 
        font-weight: bold; 
        border: 2px solid blueviolet; 
        border-radius: 7px; 
        color: blueviolet;
      }
    </style>

  </head>
  <body>
    <!-- <div class="container p-5 mt-1"> -->

    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="image/Binner.jpg" class="d-block w-100" height="50">
        </div>
      </div>
    </div>
    

    <div class="container mt-3">
      <div class="row">
        <div class="col-md-2">
          
          <a href="dashboard.php" class="mt-2 btn btn-outline-primary w-100">Dashboard</a>
            <a href="../register/dashboard.php" class="mt-2 btn btn-outline-primary w-100">Register</a>
          <a href="chat.php" class="mt-2 btn btn-outline-primary w-100">Chat</a>
          <a href="add.php" class="mt-2 btn btn-outline-primary w-100">Add Record</a>
          <a href="update.php" class="mt-2 btn btn-outline-primary w-100">Update Record</a>
          <a href="delete.php" class="mt-2 btn btn-outline-primary w-100">Delete Record</a>
          <a href="../index.php" class="mt-2 btn btn-outline-primary w-100">Logout</a>
          
        </div>
        <div class="col-md-10">
          <div class="container mt-1">
            <h4 class="sinfo">Student Infomation</h4>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Name</th>
                  <th scope="col">Mobile No.</th>
                  <th scope="col">Email</th>
                  <th scope="col">Address</th>
                </tr>
              </thead>
              <tbody>

                <?php while($row = mysqli_fetch_assoc($query)) : ?>
                  <tr>
                    <th scope="row"><?php echo $row['id']; ?></th>
                    <td><?php echo $row['name'] ?></td>
                    <td><?php echo $row['mobile'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td><?php echo $row['address'] ?></td>
                  </tr>
                <?php endwhile; ?>
                
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>