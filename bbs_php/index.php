<?php


// CSRF対策
function h($s){
  return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
}

session_start();

function setToken(){
  $token = sha1(uniqid(mt_rand(), true));
  $_SESSION['token'] = $token;
}

function checkToken(){
  if (empty($_SESSION['token'] || ($_SESSION['token'] !== $_POST['token']))) {
    echo "不正なPOSTの処理がされました";
    exit;
  }
}


// データをファイルに保存する
if ($_SERVER['REQUEST_METHOD'] == 'POST' &&
  isset($_POST['message']) &&
  isset($_POST['user'])) {

    checkToken();

    $message = trim($_POST['message']);
    $user = trim($_POST['user']);
    $date = date("Y/m/d H:i:s");

    if ($message !== '') {
      $user = ($user === '') ? '名無しさん' : $user;
      $user = str_replace("\t", '', $user);
      $message = str_replace("\t", '', $message);

      $newData = $message . "\t" . $user . "\t" . $date . "\n";

      $fp = fopen("bbs.bat", "a");
      fwrite($fp, $newData);
      fclose($fp);
    }
} else {
  setToken();
  var_dump(h($_SESSION['token']));
}



// ファイルから1行ずつ読み込む
$filename = "bbs.bat";
$handle = fopen("$filename", "r");
if ($handle) {
  $contents = [];
  $i = 0;
  while ($line = fgets($handle)) {
    $content = explode("\t", $line);
    $contents[$i] = $content;
    $i++;
  }
}
fclose($handle);

// // 他の読み込み方
// $posts = file($filename, 'FILE_IGNORE_NEW_LINE');
// $posts = array_reverse($posts);
?>

<!DOCTYPE html>
<html lang="jp">
  <head>
    <meta charset="utf-8">
    <title>簡易掲示板</title>
  </head>
  <body>
    <!-- 投稿 -->
    <h1>簡易掲示版</h1>
    <form action="" method="POST">
      message:<input type="text" name=message placeholder="メッセージを入力してください"/>
      user:<input type="text" name=user placeholder="名前を入力してください"/>
      <input type="submit" value="投稿"/>
    </input type="text" name=token value="<?php echo h($_SESSION['token']); ?>" />
    </form>
    <!-- 表示 -->
    <h2>投稿一覧（<?php echo count($contents); ?>件）</h2>
    <ul>
      <?php foreach ($contents as $value) : ?>
          <li>
            <?php echo $value[0]; ?>
            (<?php echo $value[1]; ?>) -
            <?php echo $value[2]; ?>
          </li>
      <?php endforeach; ?>
      <li><?php if(!$contents) {echo "まだ投稿はありません";} ?></li>
    </ul>
  </body>
</html>








