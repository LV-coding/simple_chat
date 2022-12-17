<?php
require("func/connect.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <form action="func/add.php" method="post">
        <input type="text" name="username" required placeholder="Username">
        <textarea name="text" cols="30" rows="3" required placeholder="Comment"></textarea>
        <input type="submit" value="Send">
    </form>
</body>
<hr>
<h4>Forum</h4>

<?php
$comments = $connect->query("SELECT * FROM forum_db.comments ORDER BY datetime DESC");
$comments = $comments->fetchAll(PDO::FETCH_ASSOC);

if ($comments) {

    foreach ($comments as $comment) {
?>
        <p><?= "{$comment["datetime"]}: {$comment["username"]} says: {$comment["text"]}" ?></p>

<?php }
} else {
    echo "<p>There are no comments!</p>";
} ?>

</html>
