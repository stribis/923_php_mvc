<?php
require_once ('./Controller/Dashboard.php');
$Dashboard = new Dashboard();
$Response = [];
$active = $Dashboard->active;
$News = $Dashboard->getNews();


?>

<?php require('./nav.php')?>
<main>

  <h2>Dashboard</h2>

    <div>
        <?php if ($News['status']) : ?>
        <?php foreach ($News['data'] as $new) : ?>
        <div>
            <h3><?= $new['title'] ?></h3>
            <p><?= $new['content'] ?></p>
            <a href="/article?id=<?= $new['id'] ?>">Learn More</a>
        </div>
        <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <hr>
    <a href="/create_news.php">Create News</a>
    <hr>
</main>