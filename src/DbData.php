<?php
namespace app;
use PDO;

class DbData { // DbDataクラスの宣言
  protected $pdo; // PDOオブジェクト用のプロパティ(メンバ変数)の宣言

  // コンストラクタ
  public function __construct( ) { // 「__construct」の「̲̲__」は「_(アンダースコア)」を2つ記述する
    // PDOオブジェクトを生成する
    $dsn = "mysql:host=db;dbname=shop;charset=utf8";
    $user = "shopping";
    $password = "site";
    try {
      $this->pdo = new PDO($dsn, $user, $password);
    } catch(Exception $e){
      echo 'Error:' . $e->getMessage( );
      die( );
    }
  }

  // SELECT文実行用のquery( )メソッド ・・・このメソッドはユーザー定義関数
  public function query ( $sql, $array_params ) {
    $stmt = $this->pdo->prepare( $sql );
    $stmt->execute( $array_params );
    return $stmt; // PDOステートメントオブジェクトを返すので呼び出し側でfetch( )またはfetchAll( )で結果セットを取得
  }

  // INSERT、UPDATE、DELETE文実行用のメソッド ・・・このメソッドもユーザー定義関数
  public function exec ( $sql, $array_params ) {
    $stmt = $this->pdo->prepare( $sql );
    return $stmt->execute( $array_params ); // 成功:true、失敗:false
  }
}
