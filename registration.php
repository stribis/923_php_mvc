<?php
require_once ('./Controller/Register.php');
  $Register = new Register();
  $active = $Register->active;
  // Handle Post:
    if (isset($_POST) && count($_POST) > 0){
      $Response = $Register->register($_POST);
    }
?>

<?php require('./nav.php')?>
<main>
  <h2>Registration</h2>
  <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    <?php if (isset($Response['status'])): ?>
      <p>Some Errors Occurred</p>
    <?php endif; ?>
    <label for="name">Full Name</label>
    <input type="text" name="name" id="name">
    <label for="email">Email</label>
    <input type="email" name="email" id="email">
    <label for="password">Password</label>
    <input type="password" name="password" id="password">
    <button type="submit">Register</button>
  </form>
</main>
</body>
</html>