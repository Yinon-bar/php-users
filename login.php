<?php
require "./includes/functions.php";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $query = "SELECT * FROM users 
  WHERE email = '$email' && password = '$password' LIMIT 1;";

  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result)) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['INFO'] = ($row);
    header("Location: profile.php");
    die;
  } else {
    $error = "Wrong email or password";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link rel="stylesheet" href="styles/bootstrap.css">
  <link rel="stylesheet" href="styles/style.css">
</head>

<body>
  <?php require "./includes/header.php" ?>
  <div class="signup">
    <main>
      <?php if (!empty($error)) :

        echo "<div class='alert alert-dismissible alert-danger mt-4'>" . $error . "</div>";

      endif; ?>
      <h1 class="mt-4 text-center">Login Page</h1>
      <form method="post" class="mt-4 border border-primary border-1 p-5 rounded-4 shadow-lg">
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
          <button type="submit" class="btn btn-primary">Login!</button>
        </div>
      </form>
    </main>
  </div>
  <?php require "./includes/footer.php" ?>
</body>

</html>