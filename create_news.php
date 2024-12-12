<?php
require_once ('./Controller/News.php');
$News = new News();
$Response = [];
$active = $News->active;
if (isset($_POST) && count($_POST) > 0){
  $Response = $News->create($_POST);
}

?>

<?php require('./nav.php')?>
<main>

  <h2>Create Article</h2>

  <div>

  <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
      <label for="title">Title</label>
      <input type="text" name="title" id="title">
      <label for="content">Content</label>
      <textarea name="content" id="content"></textarea>
      <button type="submit">Create</button>
  </form>

  </div>

</main>