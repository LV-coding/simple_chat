<?php 
require("connect.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = htmlspecialchars(strip_tags($_POST["username"]));
    $text = htmlspecialchars(strip_tags($_POST["text"]));

    if ($username && $text) {

        $sql = "INSERT INTO forum_db.comments (username, text) VALUES (:username, :text)";
        $query = $connect->prepare($sql);
        $query->execute(['username'=>$username, 'text'=>$text]);

        header('Location: ../index.php');

    } 
}
?>