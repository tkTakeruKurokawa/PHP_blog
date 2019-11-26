<?php
$no = $_GET['no'];
$pdo = new PDO("mysql:dbname=blog", "root");
$st = $pdo->query("SELECT * FROM post WHERE no={$no}");
$row = $st->fetch();
$st = $pdo->query("SELECT post_no FROM comment WHERE post_no={$no}");
$comments = $st->fetchAll();
foreach ($comments as $comment) {
    $st = $pdo->prepare("DELETE FROM comment WHERE post_no=?");
    $st->execute(array($comment));
}
$st = $pdo->prepare("DELETE FROM post WHERE no=?");
$st->execute(array($no));
header("Location: index.php");
exit();
