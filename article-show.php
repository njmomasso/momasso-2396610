<?php
if(isset($_GET['id']) && $_GET['id'] != null){
    require_once('db/connex.php');

    $id = mysqli_real_escape_string($connex, $_GET['id']);

    $sql = "SELECT article.id, title, content, creation_date, user.name AS author, user_id
            FROM article
            INNER JOIN user ON user.id = article.user_id
            WHERE article.id = '$id'";

    $result = mysqli_query($connex, $sql);
    $count = mysqli_num_rows($result);

    if($count == 1){
        $article = mysqli_fetch_array($result, MYSQLI_ASSOC);
    } else {
        header('location:article-index.php');
        exit();
    }
} else {
    header('location:article-index.php');
    exit();
}
?>

<?php 
$title="Article Show";
require_once('header.php');
?>
<h1><?= $article['title']; ?></h1>
<p><strong>Author:</strong> <?= $article['author']; ?></p>
<p><strong>Date:</strong> <?= $article['creation_date']; ?></p>
<p><?= nl2br($article['content']); ?></p>

<?php if(isset($_SESSION['id']) && $_SESSION['id'] == $article['user_id']) { ?>
    <a href="article-edit.php?id=<?= $article['id']; ?>" class="btn">Edit</a>
    <form action="article-delete.php" method="post" style="display:inline-block;">
        <input type="hidden" name="id" value="<?= $article['id']; ?>">
        <input type="submit" value="Delete" class="btn-danger"/>
    </form>
<?php } ?>

<?php require_once('footer.php'); ?>
