<?php

require "includes/functions.php";
checkLogin();


if ($_SERVER['REQUEST_METHOD'] === "POST" && !empty($_POST['username'])) {
  // profile edit
  $image_added = false;
  if (!empty($_FILES['image']['name']) && $_FILES['image']['error'] == 0) {
    $folder = 'uploads/';
    if (!file_exists($folder)) {
      mkdir($folder, 0777, true);
    }
    $destenation = $folder . $_FILES['image']['name'];
    move_uploaded_file(($_FILES['image']['name']['tmp_name']), $destenation);
    $image_added = true;
  }
  $img = $_FILES;
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  $query = "INSERT INTO users(username, email, password) 
  VALUES('$username', '$email', '$password');";

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
  <title>Profile Page</title>
  <link rel="stylesheet" href="styles/bootstrap.css">
  <link rel="stylesheet" href="styles/style.css">
</head>

<body>
  <?php require "./includes/header.php" ?>
  <div class="profile">
    <?php if (!empty($_GET['action']) && $_GET['action'] == 'edit') : ?>
      <h2 class="mt-3">Edit Profile</h2>
      <form method="post" enctype="multipart/form-data" class="mt-4 border border-primary border-1 p-4 rounded-4 shadow-lg">
        <div class="form-group d-flex align-items-center justify-content-center">
          <img class="text-center" style="border-radius: 50%;" src="<?php echo $_SESSION['INFO']['image']; ?>" alt="">
        </div>
        <div class="form-group">
          <label for="image" class="form-label mt-0">User image</label>
          <input value="<?php echo $_SESSION['INFO']['img']; ?>" type="file" class="form-control" id="image" name="image" placeholder="Insert image" required>
        </div>
        <div class="form-group">
          <label for="username" class="form-label mt-4">User name</label>
          <input value="<?php echo $_SESSION['INFO']['username']; ?>" type="text" class="form-control" id="username" name="username" placeholder="Enter email" required>
        </div>
        <div class="form-group">
          <label for="email" class="form-label mt-4">Email</label>
          <input value="<?php echo $_SESSION['INFO']['email']; ?>" type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <label for="password" class="form-label mt-4">Password</label>
          <input value="<?php echo $_SESSION['INFO']['password']; ?>" type="password" class="form-control" id="password" name="password" placeholder="Enter email" required>
        </div>
        <div class="form-group mt-4 d-grid gap-2">
          <button type="submit" class="btn btn-primary ">Save!</button>
          <a href="profile.php"><button type="button" class="btn btn-warning w-100">Cancel</button></a>
        </div>
      </form>
    <?php else : ?>
      <main>
        <h1 class="mt-4 text-center">Profile Page</h1>
        <div class="user">
          <img src="img/4.jpg" alt="">
          <h4>Username: <?php print_r($_SESSION['INFO']['username']); ?></h4>
          <h5>Email: <?php print_r($_SESSION['INFO']['email']); ?></h5>
          <a href="profile.php?action=edit"><button class="btn btn-warning">Edit profile</button></a>
        </div>

        <hr>
        <h3>Create a Post</h3>
        <form method="post" class="mt-1 border border-primary border-1 p-4 rounded-4 shadow-lg">
          <div class="form-group">
            <label for="post" class="form-label">Post something</label>
            <textarea rows="5" name="post" class="form-control" id="post"></textarea>
          </div>
          <div class="form-group mt-4">
            <button type="submit" class="btn btn-primary">Post!</button>
          </div>
        </form>
      </main>
    <?php endif; ?>
  </div>
  <?php require "./includes/footer.php" ?>
</body>

</html>