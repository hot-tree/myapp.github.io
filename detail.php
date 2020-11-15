<?php
require_once 'db_config.php';
require_once 'function.php';
require_once 'recipe.php';

if (empty($_GET['id'])) throw new Exception('Error');
$id = (int) $_GET['id'];

$recipeApp = new Recipe();
$recipe = $recipeApp->detail($id);

?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>詳細ページ</title>
  </head>
  <body>
    <ul>
      <li>料理名:<?= h($recipe->recipe_name); ?></li>
      <li>カテゴリ:<?= h($recipe->category); ?></li>
      <li>予算:<?= h($recipe->budget); ?></li>
      <li>難易度:<?= h($recipe->difficulty); ?></li>
      <li>作り方:<?= nl2br(h($recipe->howto)); ?></li>
    </ul>
    <a href="index.php">トップページへ戻る</a>
  </body>
</html>
