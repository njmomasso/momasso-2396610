<?php
require_once('library/check-session.php');

if(isset($_GET['id']) && $_GET['id'] != null){
    require_once('db/connex.php');

    $id = mysqli_real_escape_string($connex, $_GET['id']);
    $sql = "SELECT * FROM article WHERE id = '$id'";
    $result = mysqli_query($connex, $sql);
    $count = mysqli_num_rows($result);

    if($count == 1){
        $article = mysqli_fetch_array($result, MYSQLI_ASSOC);

        if($_SESSION['id'] != $article['user_id']){
            header('location:article-index.php');
            exit;
        }
        foreach($article as $key=>$value){
            $$key = $value;
        }
    } else {
        header('location:article-index.php');
        exit;
    }
} else {
    header('location:article-index.php');
    exit;
}
?>

<?php 
$title="Edit Article";
require_once('header.php');
?>
<h1>Edit Article</h1>
<form action="article-update.php" method="post">
    <input type="hidden" name="id" value="<?= $id; ?>">
    <label for="title">Title</label>
    <input type="text" name="title" id="title" value="<?= $title ?>" required>
    
    <label for="content">Content</label>
    <textarea name="content" id="content" required><?= $content ?></textarea>
    
    <input type="submit" value="Update Article">
</form>
<?php require_once('footer.php'); ?>
