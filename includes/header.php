<header>
  <div class="container">
    <div class="header">
      <h1>iApp</h1>
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a href="index.php">Home</a>
        <a href="profile.php">Profile</a>
        <?php if (empty($_SESSION['INFO'])) : ?>
          <a href="signup.php">Signup</a>
          <a href="login.php">Login</a>
        <?php else : ?>
          <a href="logout.php">Logout</a>
        <?php endif; ?>
      </nav>
    </div>
  </div>
</header>