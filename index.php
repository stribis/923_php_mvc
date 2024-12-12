<?php require_once ('./Controller/Login.php'); ?>
<?php
    $Login = new Login();
    $Response = [];
    $active = $Login->active;
    if (isset($_POST) && count($_POST) > 0) $Response = $Login->login($_POST);
?>

<?php require('./nav.php')?>
<main>
  <h2>Login</h2>
    <?php if(isset($Response['status']) && !$Response['status']):?>
        <p>Something went wrong with the login</p>
    <?php endif; ?>
  <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    <label for="email">Email</label>
    <input type="email" name="email" id="email">
    <label for="password">Password</label>
    <input type="password" name="password" id="password">
    <button type="submit">Log In</button>
  </form>
</main>
</body>
</html>