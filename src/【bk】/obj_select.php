<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>obj_select.php</title>
  </head>
  <body>
    <?php
      // DbPhpクラスのオブジェクト生成し、selectAll( )メソッドをよびだす
      require_once __DIR__ . '/classes/dbphp.php';
      $dbPhp = new DbPhp( );
      $persons = $dbPhp->selectAll( );

      // 抽出したデータを画面に表示する
      foreach ( $persons as $person ) {
        echo 'uid=' . $person['uid'] . ', name=' . $person['name'] . '<br>';
      }
    ?>
    <hr>
    <h4>01組 001番 赤松響</h4>
  </body>
</html>