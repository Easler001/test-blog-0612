<?php
ini_set('display_errors', "On");
require_once('blog_2.php');
$blogs = $_POST;

$blog = new Blog();
$blog->blogValidate($blogs);
$blog->blogCreate($blogs);

?>
  <p><a href="/index.php">前のページへ戻る</a></p>
