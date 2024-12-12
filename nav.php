<?php require_once('./config.php'); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP Lerntag - <?php echo $active ?> </title>
</head>
<body>
  <nav>
    <ul>

    <?php if (!isset($_SESSION['auth_status'])) :?>
    <li><a href="<?= BASE_URL;?>index.php">Home</a></li>
    <li><a href="<?= BASE_URL;?>registration.php">Register</a></li>
    <?php endif;?>

    <?php if (isset($_SESSION['auth_status'])) :?>
    <li><a href="<?= BASE_URL;?>dashboard.php">Dashboard</a></li>
    <li><a href="<?= BASE_URL;?>logout.php">Logout</a></li>
    <?php endif;?>

    </ul>
  </nav>
