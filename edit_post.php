<?php
echo $_POST['no'];
$error = $no = $title = $content = '';
if (isset($_POST['submit'])) {
    $no = strip_tags($_POST['no']);
    $title = strip_tags($_POST['title']);
    $content = strip_tags($_POST['content']);
    if (!$title) {
        $error .= "タイトルを入力してください" . "<br>";
    }
    if (!$content) {
        $error .= "本文を入力してください" . "<br>";
    }
    if (!$error) {
        $pdo = new PDO("mysql:dbname=blog", "root");
        $st = $pdo->prepare("UPDATE post SET title=?,content=? WHERE no=?");
        $st->execute(array($title, $content, $no));
        header('Location: index.php');
        exit();
    }
} else {
    $no = $_GET['no'];
    $pdo = new PDO("mysql:dbname=blog", "root");
    $st = $pdo->query("SELECT * FROM post WHERE no={$no}");
    $row = $st->fetch();
    $title = htmlspecialchars($row['title']);
    $content = htmlspecialchars($row['content']);
}
require "edit_post_form.php";
