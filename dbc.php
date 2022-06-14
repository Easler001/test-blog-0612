<?php 

require_once('env.php');

Class Dbc
{

  protected $table_name;

// 関数1つに1つの機能のみを持たせる
//1.DBに接続
//2.データの取得
//3.カテゴリ名を表示

//1.DBに接続
// 引数:なし
//　返り値:接続結果を返す
protected function dbConnect() {
  $host   = DB_HOST;
  $dbname = DB_NAME;
  $user   = DB_USER;
  $pass   = DB_PASS;
  $dsn    = "mysql:host=$host;dbname=$dbname;charset=utf8";

  $options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::MYSQL_ATTR_USE_BUFFERED_QUERY =>true,
  );

  
  try {
      $dbh = new PDO($dsn,$user,$pass,[
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      ]);
  } catch(PDOException $e){
      echo '接続失敗' . $e->getMessage();
      exit();
  };
  return $dbh;
}
//2.データの取得
// 引数:なし
// 返り値:取得したデータを返す
public function getAll() {
  $dbh = $this->dbConnect();
              //echo '接続しました';
      //①SQL文の準備
      $sql = "SELECT * FROM $this->table_name";
      //②SQLの実行
      $stmt = $dbh->query($sql);
      //③SQLの結果を受け取る
      $result = $stmt->fetchall(PDO::FETCH_ASSOC);
      return $result;
      $dbh = null;
}



public function getById($id) {
  if(empty($id)) {
    exit('IDが不正です');
}

$dbh = $this->dbConnect();

// SQL準備
$stmt = $dbh->prepare("SELECT * FROM $this->table_name Where id = :id");
$stmt->bindValue(':id', (int)$id, PDO::PARAM_INT);
// SQL実行
$stmt->execute();
// 結果を取得
$result = $stmt->fetch(PDO::FETCH_ASSOC);

if(!$result) {
    exit('記事が存在しません');
}
return $result;

}

public function delete($id) {
  if(empty($id)) {
    exit('IDが不正です');
}

$dbh = $this->dbConnect();

// SQL準備
$stmt = $dbh->prepare("DELETE FROM $this->table_name Where id = :id");
$stmt->bindValue(':id', (int)$id, PDO::PARAM_INT);
// SQL実行
$stmt->execute();
echo 'この記事は完全に削除されました';

return $result;

}

}
?>
