<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'dbuser');
define('DB_PASSWORD', 'U8df76|d');
define('DB_NAME', 'dotinstall_paging_php');
define('COMMENT_PER_PAGE', 5);

error_reporting(E_ALL & ~E_NOTICE);

// DB接続
try {
  $dbh = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME,DB_USER,DB_PASSWORD);
  // echo 'mysql:host='.DB_HOST.';dbname='.DB_NAME,DB_USER,DB_PASSWORD;
} catch (PDOException $e) {
  echo $e->getMessage();
  exit;
}

// ページ数の計算
$total = $dbh->query('select count(*) from comments')->fetchColumn();
$totalPages = ceil($total / COMMENT_PER_PAGE);
$page = (isset($_GET['page']) && $_GET['page'] !== '' && preg_match('/^[1-9][0-9]*$/', $_GET['page'])) ? (int)$_GET['page'] : 1;

$offset = COMMENT_PER_PAGE * ($page - 1);
$sql = 'select * from comments limit ' .$offset .',' .COMMENT_PER_PAGE;
$comments = array();
foreach ($dbh->query($sql) as $row) {
  array_push($comments, $row);
}

$from =  $offset + 1;
$to = ($offset + COMMENT_PER_PAGE) < $total ? ($offset + COMMENT_PER_PAGE) : $total;

// var_dump($comments);




?>





<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>ページング機能</title>
  </head>
  <body>
    <h1>コメント一覧</h1>
    全<?php echo $total ?>件中、<?php echo $from ?>件〜<?php echo $to ?>件を表示しています。
    <ul>
      <?php foreach($comments as $comment) : ?>
        <li>
            <?php echo htmlspecialchars($comment['comment'], ENT_QUOTES, 'UTF-8'); ?>
          </li>
      <?php endforeach ?>
    </ul>
    <?php if($page > 1) : ?>
    <a href="?page=<?php echo $page-1; ?>">前へ</a>
  <?php endif; ?>
    <?php for ($i=1; $i <= $totalPages; $i++) : ?>
      <?php if($page === $i) : ?>
        <strong><a href="?page=<?php echo $i; ?>"><?php echo $i ?></a></strong>
      <?php else : ?>
        <a href="?page=<?php echo $i; ?>"><?php echo $i ?></a>
      <?php endif; ?>
    <?php endfor; ?>
    <?php if($page < $totalPages) : ?>
    <a href="?page=<?php echo $page+1; ?>">次へ</a>
  <?php endif; ?>
  </body>
</html>













