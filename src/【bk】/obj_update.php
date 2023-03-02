<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>obj_update.php</title>
  </head>
  <body>
    <?php
      // DbPhpクラスのオブジェクト生成し、updatePerson( )メソッドをよびだす
      require_once __DIR__ . '/classes/dbphp.php';
      $dbPhp = new DbPhp( );
      $dbPhp->updatePerson(5, '野口五郎');

      // 登録後の全データを画面表示する
      $persons = $dbPhp->selectAll( );
      foreach ($persons as $person) {
        echo 'uid=' . $person['uid'] . ', name=' . $person['name'] . '<br>';
      }
    ?>
    <hr>
    <h4>01組 001番 赤松響</h4>
  </body>
</html>