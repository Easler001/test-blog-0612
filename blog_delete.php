<?php
require_once('blog_2.php');

$blog = new Blog();
$result = $blog->delete($_GET['id']);

?>

<p><a href="/index.php">前のページへ戻る</a></p>
