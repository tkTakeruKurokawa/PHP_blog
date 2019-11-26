<?php
$error = $title = $content = '';
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    if (!$title) $error .= 'タイトルがありません。<br>';
    if (mb_strlen($title) > 80) $error .= 'タイトルが長すぎます。<br>';
    if (!$content) $error .= '本文がありません。<br>';
    if (!$error) {
        $pdo = new PDO("mysql:dbname=blog", "root");
        $st = $pdo->prepare("INSERT INTO post(title,content) VALUES(?,?)");
        $st->execute(array($title, $content));
        header('Location: index.php');
        exit();
    }
}
require 'post_form.php';
