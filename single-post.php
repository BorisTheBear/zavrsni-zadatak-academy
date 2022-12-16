<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Vivify Blog</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="styles/blog.css" rel="stylesheet">
    <link href="styles/styles.css" rel="stylesheet">
</head>
<body>

<?php
    include("header.php");
    include("database.php");
?>

<?php
if(isset($_GET['id'])) {
    $sql = "SELECT id, title, body, author, created_at FROM posts WHERE id = {$_GET['id']} ORDER BY created_at DESC";
    $statement = $connection->prepare($sql);
    $statement->execute();

    $statement->setFetchMode(PDO::FETCH_ASSOC);
    $singlePost = $statement->fetch();
    // dump($posts);

    $sql2 = "SELECT id, author, text, post_id FROM comments WHERE post_id = {$_GET['id']} ORDER BY id ASC";
    $statement2 = $connection->prepare($sql2);
    $statement2->execute();

    $statement2->setFetchMode(PDO::FETCH_ASSOC);
    $comments = $statement2->fetchAll();
}
?>
<div class="row">
    <div class="col-sm-8 blog-main">
        <div class="blog-post">
            <h2 class="blog-post-title"><?php echo ($singlePost['title']); ?></h2>
            <p class="blog-post-meta"><?php echo ($singlePost['created_at']); ?> by <a href="#"><?php echo ($singlePost['author']); ?></a></p>

            <p><?php echo ($singlePost['body']); ?></p>
            
        </div><!-- /.blog-post -->
        <div>
            <ul>
                <hr>
                    <?php foreach($comments as $comment) { ?>
                        <li>
                            <h6><?php echo ($comment['author']); ?></h6>
                            <p><?php echo ($comment['text']); ?></p>
                        </li>
                    <?php } ?>
                </hr>
            </ul>
        </div><!-- /.comments -->
    </div><!-- /.blog-main -->
    <?php
    include("sidebar.php");
    ?>
</div><!-- /.row -->
<?php
include("footer.php");
?>
  
</body>
</html>