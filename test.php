<?php
// 変数
// ブログタイトル
// 定数
const ID = 1;

$title = "PHP test";
$content = 'this is php test';
$post_at = '2022-04-10';
$tag = ['PHP','プログラミング'];
$status = true; //公開  //非公開 false


const ID = 2;

$title2 = "PHP test 2";
$content2 = 'this is php test 2';
$post_at2 = '2022-04-10';
$tag2 = ['PHP2','プログラミング2'];
$status2 = true; //公開  //非公開 false


$blog1 = array(
  'id' => ID,
  'title' => $title,
  'content' => $content,
  'post_at' => $post_at,
  'tag' => $tag,
  'status' => $status
);

//echo $blog1['title'];

$blog2 = array(
  'id2' => ID2,
  'title2' => $title2,
  'content2' => $content2,
  'post_at2' => $post_at2,
  'tag2' => $tag2,
  'status2' => $status2
);

$blogs = [$blog1 , $blog2];

//echo '<pre>';
//var_dump($blogs);
//echo '</pre>';

//foreach($blog1 as $blog) {
//  echo '<pre>';
//  echo $blog;
//  echo '</pre>';
//}

//foreach($blog2 as $key => $value) {
//  echo '<pre>';
//  echo $key . '=' . $value;
//  echo '</pre>';
//};

foreach($blogs as $blog) {
  foreach($blog as $value) {
    echo '<pre>';
    echo $value;
    echo '</pre>';
  }
}

?>

