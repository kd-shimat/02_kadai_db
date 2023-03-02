<?php
namespace app;

class DbData { // DbDataクラスの宣言
  protected $pdo; // PDOオブジェクト用のプロパティ(メンバ変数)の宣言

  // コンストラクタ
  public function __construct( ) { // 「__construct」の「̲̲__」は「_(アンダースコア)」を2つ記述する
    // PDOオブジェクトを生成する
    $dsn = 'mysql:host=localhost;dbname=php;charset=utf8';
    $user = 'kobe';
    $password = 'denshi';
    try {
      $this->pdo = new PDO($dsn, $user, $password);
    } catch(Exception $e){
      echo 'Error:' . $e->getMessage( );
      die( );
    }
  }

  // SELECT文実行用のquery( )メソッド ・・・このメソッドはユーザー定義関数
  protected function query ( $sql, $array_params ) {
    $stmt = $this->pdo->prepare( $sql );
    $stmt->execute( $array_params );
    return $stmt; // PDOステートメントオブジェクトを返すので呼び出し側でfetch( )またはfetchAll( )で結果セットを取得
  }

  // INSERT、UPDATE、DELETE文実行用のメソッド ・・・このメソッドもユーザー定義関数
  protected function exec ( $sql, $array_params ) {
    $stmt = $this->pdo->prepare( $sql );
    return $stmt->execute( $array_params ); // 成功:true、失敗:false
  }
}
