<?php
  // DbDataクラスを利用するため
  require_once __DIR__ . '/dbdata.php'; // 「DIR」の前後には2本のアンダースコア!!

  // DBDataクラスを継承したDbPhpクラスの宣言
  class DbPhp extends DbData {
  // 1:テーブルpersonからすべてのデータを抽出する
  public function selectAll( ) {
    $sql = "select * from person";
    // 継承したDBDataクラスのquery( )メソッドを呼び出している
    $stmt = $this->query( $sql, [ ] ); // SQL文にプレースホルダはないので空の配列を渡している
    $persons = $stmt->fetchAll( );
    return $persons; // 抽出した複数のデータを連想配列の形式で戻り値とする
  }

  // 2:テーブルpersonから指定されたuidのデータを抽出する
  public function selectPerson ( $uid ) {
    $sql = "select * from person where uid = ?";
    // 継承したDBDataクラスのquery( )メソッドを呼び出している
    $stmt = $this->query( $sql, [ $uid ] ); // SQL文のプレースホルダは1つだけだが配列の形式で渡す
    $person = $stmt->fetch( );
    return $person; // 抽出した1件のデータを連想配列の形式で戻り値とする
  }

  // 3:テーブルpersonに新規ユーザーを登録する
  public function insertPerson ( $name, $cid, $age ) {
    $sql = "insert into person ( name, company_id, age ) values ( ?, ?, ? )";
    // 継承したDBDataクラスのexec( )メソッドを呼び出している
    $result = $this->exec ( $sql, [ $name, $cid, $age ] ); // SQL文のプレースホルダの数だけ配列で渡す
  }

  // 4:テーブルpersonのuidを指定し、氏名の値を更新する
  public function updatePerson ( $uid, $name ) {
    $sql = "update person set name = ? where uid = ?";
    // 継承したDBDataクラスのexec( )メソッドを呼び出している
    $result = $this->exec ( $sql, [ $name, $uid ] ); // SQL文のプレースホルダの数だけ配列で渡す
  }

  // 5:テーブルpersonの氏名を指定し、データを削除する
  public function deletePerson ( $name ) {
    $sql = "delete from person where name = ?";
    // 継承したDBDataクラスのexec( )メソッドを呼び出している
    $result = $this->exec ( $sql, [ $name ] ); // SQL文のプレースホルダは1つだけだが配列の形式で渡す
  }
}