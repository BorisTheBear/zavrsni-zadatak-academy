<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vivify Blog</title>
</head>
<body>

<?php
    function dump($data) {
        echo "<pre>";
        var_dump($data);
        echo "</pre>";
    }
?>
<?php include("header.php"); ?>
<?php include("database.php"); ?>

<?php
    $sql = "SELECT id, title, body, author, created_at FROM posts ORDER BY created_at DESC";
    $statement = $connection->prepare($sql);
    $statement->execute();

    $statement->setFetchMode(PDO::FETCH_ASSOC);
    $posts = $statement->fetchAll();
    // dump($posts);
?>

<div class="row">

    <div class="col-sm-8 blog-main">

    <?php foreach($posts as $post) { ?>

        <div class="blog-post">
            <h2 class="blog-post-title"><a href="single-post.php?id=<?php echo ($post['id']); ?>"><?php echo ($post['title']); ?></a></h2>
            <p class="blog-post-meta"><?php echo ($post['created_at']); ?> by <a href="#"><?php echo ($post['author']); ?></a></p>

            <p><?php echo ($post['body']); ?></p>
            
        </div><!-- /.blog-post -->

        <?php } ?>

        <nav class="blog-pagination">
            <a class="btn btn-outline-primary" href="#">Older</a>
            <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
        </nav>

    </div><!-- /.blog-main -->

        <?php include("sidebar.php"); ?>

    </div><!-- /.row -->

<?php include("footer.php"); ?>
    
</body>
</html>