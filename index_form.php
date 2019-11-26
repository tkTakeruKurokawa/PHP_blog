<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Special Blog</title>
    <link rel="stylesheet" href="blog.css">
</head>

<body>
    <h1>Special Blog</h1>
    <div class="new_post">
        <h4><a href="post.php">新規投稿</a></h4>
    </div>
    <?php foreach ($posts as $post) { ?>
    <div class="post">
        <h2><?php echo $post['title'] ?></h2>
        <p><?php echo nl2br($post['content']) ?></p>
        <?php foreach ($post['comments'] as $comment) { ?>
        <div class="comment">
            <h3><?php echo $comment['name'] ?></h3>
            <p><?php echo nl2br($comment['content']) ?></p>
        </div>
        <?php } ?>
        <span class="delete">
            <a href="delete_post.php?no=<?php echo $post['no'] ?>" onclick="return confirm('削除してよろしいですか？')">記事の削除</a>
            <span class="edit">
                <a href="edit_post.php?no=<?php echo $post['no'] ?>">記事の編集</a>
                <!-- <form method='post' name='edit' action='edit_post.php'>
                        <input type='hidden' name='no' value={$post['no']}>
                        <a href='javascript:edit.submit()'>記事の編集</a>
                        </form> -->
            </span>
        </span>
        <p class="commment_link">
            投稿日：<?php echo $post['time'] ?>　
            <a href="comment.php?no=<?php echo $post['no'] ?>">コメント</a>
        </p>
    </div>
    <?php } ?>
</body>

</html>