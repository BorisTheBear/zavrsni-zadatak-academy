<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
    $sql2 = "SELECT id, author, text, post_id FROM comments WHERE post_id = {$_GET['id']} ORDER BY id ASC";
    $statement2 = $connection->prepare($sql2);
    $statement2->execute();

    $statement2->setFetchMode(PDO::FETCH_ASSOC);
    $comments = $statement2->fetchAll();
?>
    
</body>
</html>