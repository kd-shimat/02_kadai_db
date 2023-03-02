<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>obj_select1.php</title>
  </head>
  <body>
    <?php
      if ( !isset( $_GET['uid'] ) ) {
        echo 'uidが指定されていません。';
      } else {
        // 送信されてきた uid の値を受け取る
        $uid = $_GET['uid'];

        // DbPhpクラスのオブジェクト生成し、selectPerson( )メソッドをよびだす
        require_once __DIR__ . '/classes/dbphp.php';
        $dbPhp = new DbPhp( );
        $person = $dbPhp->selectPerson( $uid );

        // 抽出した結果に応じた画面を表示する
        if( empty ( $person [ 'uid' ] ) ) {
          echo '指定されたuid='. $uid . 'のデータはありません。';
        } else {
          echo '指定されたuid=' . $person['uid'] . ', name=' . $person['name'] . '<br>';
        }
      }
    ?>
    <hr>
    <h4>01組 001番 赤松響</h4>
  </body>
</html>