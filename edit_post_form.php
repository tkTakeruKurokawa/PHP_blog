<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>記事編集 | Special Blog</title>
    <link rel="stylesheet" href="blog.css">
</head>

<body>
    <form method="post" action="edit_post.php">
        <div class="post">
            <h2>記事編集</h2>
            <p>題名</p>
            <p><input type="text" name="title" size="40" value="<?php echo $title ?>"></p>
            <p>本文</p>
            <p><textarea name="content" rows="8" cols="40"><?php echo $content ?></textarea></p>
            <input type="hidden" name="no" value="<?php echo $no ?>">
            <p><input name="submit" type="submit" value="投稿"></p>
            <p><?php echo $error ?></p>
        </div>
    </form>
</body>

</html>