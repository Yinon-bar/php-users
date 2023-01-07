<?php

require "./includes/functions.php";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $date = date('Y:m:d H:i:s');

  $query = "INSERT INTO users(username, email, password, date) 
  VALUES('$username', '$email', '$password', '$date');";

  $result = mysqli_query($conn, $query);

  header("Location: login.php");
  die;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="styles/bootstrap.css">
  <link rel="stylesheet" href="styles/style.css">
</head>

<body>
  <?php require "./includes/header.php" ?>
  <div class="signup">
    <main>
      <h1 class="mt-4 text-center">Signup Page</h1>
      <form method="post" class="mt-4 border border-primary border-1 p-5 rounded-4 shadow-lg">
        <div class="form-group">
          <label for="username" class="form-label mt-4">User name</label>
          <input type="text" class="form-control" id="username" name="username" placeholder="Enter email" required>
        </div>
        <div class="form-group">
          <label for="email" class="form-label mt-4">Email</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <label for="password" class="form-label mt-4">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Enter email" required>
        </div>
        <div class="form-group mt-4">
          <button type="submit" class="btn btn-primary">Signup!</button>
        </div>
      </form>
    </main>
  </div>
  <?php require "./includes/footer.php" ?>
</body>

</html>