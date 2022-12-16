<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php include("database.php"); ?>

<?php
    $sql = "SELECT id, title, body, author, created_at FROM posts ORDER BY created_at DESC LIMIT 5";
    $stmt = $connection->prepare($sql);
    $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $posts = $stmt->fetchAll();
?>

<aside class="col-sm-3 ml-sm-auto blog-sidebar">
            <div class="sidebar-module sidebar-module-inset">
                <h4>Latest posts</h4>
                <?php foreach($posts as $post) { ?>
                <p><a href="single-post.php?id=<?php echo ($post['id']); ?>"><?php echo ($post['title']); ?></a></p>
                <?php } ?>
            </div>
</aside><!-- /.blog-sidebar -->
    
</body>
</html>