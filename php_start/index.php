


<!-- // $msg = "hello from the TOP!";
// echo $msg;
// var_dump($msg); // debug
//
// // ---------------------------------------
//
// // 定数
// define("MY_EMAIL", "kaneko@gmail.com");
//
// echo MY_EMAIL;
//
// echo nl2br("\n");  // 改行
// var_dump(__LINE__);
// echo nl2br("\n");
// var_dump(__FILE__);
// echo nl2br("\n");
// var_dump(__DIR__);
//
// // ---------------------------------------
// echo nl2br("\n");
// $x = 10 % 3;
// $y = 30.2 / 4;
// var_dump($x);
// var_dump($y);
//
// $z = 5;
// $z++;
// var_dump($z);
// $z--;
// var_dump($z);
//
// $j = 5;
// $j *= 2;
// var_dump($j);
//
// // ---------------------------------------
// echo nl2br("\n");
// $name = "tsubasa";
// $s1 = "hello $name!\nhello again!";
// $s1 = "hello {$name}!\nhello again!";
// $s2 = 'hello $name!\nhello again!';
//
// var_dump($s1);
// var_dump($s2);
//

// $s = "hello" . "world";
// var_dump($s);

// ---------------------------------------

// $score = 85;
//
// if ($score > 80) {
//   echo "great!";
// } elseif ($score > 60) {
//   echo "good!";
// } else {
//   echo "so so ...";
// }

// ==
// === データの型も比較



// ---------------------------------------
// $sales = [
//   "aaa" => 100,
//   "bbb" => 200,
//   "ccc" => 300,
// ];
// $colors = [
//   "aaa",
//   "bbb",
//   "ccc",
// ];
//
//
//
// // foreach ($sales as $key => $value) {
// //   echo "($key) $value ";
// // }
//
//



// ---------------------------------------

// function sayHi($name = "kaneko"){
//   // echo "hi! " . $name;
//   return "hi! " . $name;
// }
//
//
// // sayHi("Tom");
// // sayHi("Bom");
// // sayHi();
//
//
// $s = sayHi();
// var_dump($s);



// class User {
//   public $name;
//   public static $count = 0;
//
//   public function __construct($name) {
//     $this->name = $name;
//     self::$count++;
//   }
//
//   public function sayHo(){
//     echo "hi, i am $this->name!";
//   }
// }
//
// $tom = new User("Tom");
// $bob = new User("Bob");
//
// // echo $tom->name;
// // $bob->sayHo();
//
// echo User::$count;





// ---------------------------------------

// abstract class BaseUser {
//   public $name;
//   abstract public function sayHi();
// }
//
// class User extends BaseUser {
//   public function sayHi(){
//     echo "hello from User";
//   }
// }


// require "User.class.php";
//
// // use Dotinstall\Lib\ as Lib;
// use Dotinstall\Lib;
//
//
// // spl_autoload_register(function($class) {
// //   require $class . ".class.php";
// // });
//
// // $tom = new User();
// $tom = new Lib\User("Bob");
// $tom->sayHi();
// $tom->sayHello();
//




// function div($a, $b){
//   try {
//     if ($b === 0) {
//       throw new Exception("cannot divide by 0!");
//     }
//     echo $a / $b;
//   } catch(Exeption $e) {
//     echo $e->getMessage();
//   }
// }
//
//
//
// div(7, 2);
// div(5, 5); -->


<!-- formの動き -->


<!-- <?php

$username = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username'];
  $err = false;
  if (strlen($username) > 8) {
    $err = true;
  }
}

?> -->


<!-- <!DOCTYPE html>
<head>
  <meta charset="utf-8"/>
  <title>Check username</title>
</head>
<body>
  <form action="" method="POST">
    <input type="text" name="username" placeholder="user name"/ value="<?php echo htmlspecialchars($username, ENT_QUOTES, 'UTF-8'); ?>">
    <input type="submit" value="Check!"/>
    <?php if ($err) { echo "Too long!"; } ?>
  </form>
</body>
</html> -->




<?php

// setcookie("username", "taguchi");

// echo $_COOKIE['username'];

session_start();

// $_SESSION['username'] = "kaneko";

// echo $_SESSION['username'];

unset($_SESSION['username']);









