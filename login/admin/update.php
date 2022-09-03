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

  if ($_SERVER['REQUEST_METHOD']=='POST'){

    $id = mysqli_real_escape_string($con, $_POST['id']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $mobile = mysqli_real_escape_string($con, $_POST['mobile']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $address = mysqli_real_escape_string($con, $_POST['address']);

    if(!isset($name) || $name == '' || !isset($mobile) || $mobile == '' || !isset($email) || $email == '' || !isset($address) || $address == ''){
      echo "<script>alert('Please Fillup All Blocks');</script>";
    }
    else{
      $sql = "UPDATE `students_info` SET `name` = '$name', `mobile` = '$mobile', `email` = '$email', `address` = '$address' WHERE `students_info`.`id` = $id; ";
      $query = mysqli_query($con, $sql);

      if(isset($query)){
        echo "<script>alert('Record Updated Successfully');</script>";
      }
      else{
        echo "<script>alert('Connection Failed');</script>";
      }
    }

  }

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
          <a href="add.php" class="mt-2 btn btn-outline-primary w-100">Add Record</a>
          <a href="update.php" class="mt-2 btn btn-outline-primary w-100">Update Record</a>
          <a href="delete.php" class="mt-2 btn btn-outline-primary w-100">Delete Record</a>
          <a href="../index.php" class="mt-2 btn btn-outline-primary w-100">Logout</a>

        </div>
        <div class="col-md-10">
          <main class="form-signin m-auto mt-1">
            <div class="container">
              <div class="row">
                <div class="col-md-9">

                  <form action="update.php" method="POST">
                    <!-- <img class="mb-4" src="/docs/5.2/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> -->
                    <h4 class="sinfo">Update Infomation</h4>

                    <div class="form-floating mt-2">
                      <input type="id" class="form-control" id="floatingInput" placeholder="ID" name="id">
                      <label for="floatingInput">Enter ID</label>
                    </div>

                    <div class="form-floating mt-2">
                      <input type="name" class="form-control" id="floatingInput" placeholder="Name" name="name">
                      <label for="floatingInput">Name</label>
                    </div>

                    <div class="form-floating mt-2">
                      <input type="mobile" class="form-control" id="floatingInput" placeholder="Mobile Number" name="mobile">
                      <label for="floatingInput">Mobile Number</label>
                    </div>

                    <div class="form-floating mt-2">
                      <input type="email" class="form-control" id="floatingInput" placeholder="Email" name="email">
                      <label for="floatingInput">email</label>
                    </div>

                    <div class="form-floating mt-2">
                      <input type="address" class="form-control" id="floatingInput" placeholder="Address" name="address">
                      <label for="floatingInput">Address</label>
                    </div>

                    <div class="checkbox mb-3">
                      
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Update</button>
                  </form>

                </div>
              </div>
            </div>

          </main>
        </div>
      </div>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>