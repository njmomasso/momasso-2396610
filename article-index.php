<?php
require_once('db/connex.php');

$sql = "SELECT article.id, article.title, article.content, article.creation_date, user.name AS author
        FROM article
        INNER JOIN user ON user.id = article.user_id
        ORDER BY creation_date DESC";

$result = mysqli_query($connex, $sql);

if(!$result){
    die("Database query failed: " . mysqli_error($connex));
}
?>

<?php 
$title = "Forum Articles";
require_once('header.php');
?>
<h1>Forum Articles</h1>

<?php if(mysqli_num_rows($result) > 0){ ?>
<table>
    <thead>
        <tr>
            <th>Title</th>
            <th>Author</th>
            <th>Date</th>
            <th>Show</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($result as $row){ ?>
        <tr>
            <td><?= htmlspecialchars($row['title']); ?></td>
            <td><?= htmlspecialchars($row['author']); ?></td>
            <td><?= htmlspecialchars($row['creation_date']); ?></td>
            <td><a href="article-show.php?id=<?= $row['id']; ?>" class="btn">Show</a></td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<?php } else { ?>
    <p>No articles found.</p>
<?php } ?>

<?php 
require_once('footer.php');
?>
