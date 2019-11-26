<?php
$post_no = $error = $name = $content = '';
if (@$_POST['submit']) {
    $post_no = strip_tags($_POST['post_no']);
    $name = strip_tags($_POST['name']);
    $content = strip_tags($_POST['content']);
    if (!$name) $error .= '名前がありません。<br>';
    if (!$content) $error .= 'コメントがありません。<br>';
    if (!$error) {
        $pdo = new PDO("mysql:dbname=blog", "root");
        $st = $pdo->prepare("INSERT INTO comment(post_no,name,content) VALUES(?,?,?)");
        $st->execute(array($post_no, $name, $content));
        header('Location: index.php');
        exit();
    }
} else {
    $post_no = strip_tags($_GET['no']);
}
require 'comment_form.php';
