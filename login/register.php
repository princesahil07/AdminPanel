<?php 

  // INSERT INTO `students_info` (`id`, `name`, `mobile`, `email`, `address`) VALUES (NULL, 'Sana Shaikh', '7897678342', 'sanashaikh@gmail.com', 'Shashtri Chowk Pirjade Plot Miraj');

  include "config.php";

  if ($_SERVER['REQUEST_METHOD']=='POST'){

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $mobile = mysqli_real_escape_string($con, $_POST['mobile']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    if(!isset($name) || $name == '' || !isset($mobile) || $mobile == '' || !isset($email) || $email == '' || !isset($username) || $username == ''||!isset($password) || $password == ''){
      echo "<script>alert('Please Fillup All Blocks');</script>";
    }
    else{

      $sql = "INSERT INTO `loginsystem` ( `name`, `mobile`, `email`, `username`, `password`) VALUES ('$name', '$mobile', '$email', '$username', '$password'); ";
      $query = mysqli_query($con, $sql);

      if(isset($query)){
        echo "<script>alert('Registered Successfully');</script>";
        header("location: index.php");
        die();
      }
      else{
        echo "<script>alert('Connection Failed');</script>";
        header("location: register.php");
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

     <style>
      body{
        background-color: rgba(23, 217, 255, 1.0);
      }
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>

  </head>
  <body>
    
  <div class="container col-md-4" style="background-color: white; ">
    <main class="form-signin m-auto mt-5 p-3">
      <form action="register.php" method="POST">
        <!-- <img class="mb-4" src="/docs/5.2/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> -->
        <h1 class="h3 mb-3 fw-normal" style="text-align: center;">New Register</h1>

        <div class="form-floating">
          <input type="name" class="form-control" id="floatingInput" placeholder="Name" name="name">
          <label for="floatingInput">Name</label>
        </div>

        <div class="form-floating mt-1">
          <input type="mobile" class="form-control" id="floatingPassword" placeholder="Mobile No." name="mobile">
          <label for="floatingPassword">Mobile No.</label>
        </div>

        <div class="form-floating mt-1">
          <input type="email" class="form-control" id="floatingPassword" placeholder="Email" name="email">
          <label for="floatingPassword">Email</label>
        </div>

        <div class="form-floating mt-1">
          <input type="username" class="form-control" id="floatingPassword" placeholder="Username" name="username">
          <label for="floatingPassword">Username</label>
        </div>

        <div class="form-floating mt-1">
          <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
          <label for="floatingPassword">Password</label>
        </div>

        <div class="checkbox mb-3">
          
        </div>
        <button class="w-100 btn btn-lg btn-primary mb-3" type="submit">Register</button>
      </form>
    </main>
  </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>